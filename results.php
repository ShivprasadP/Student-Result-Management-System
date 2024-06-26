<?php include 'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<?php if (!isset($_SESSION['rs_id'])) : ?>
			<div class="card-header">
				<div class="card-tools">
					<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_result"><i class="fa fa-plus"></i> Add New</a>
					<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=import_result"><i class="fa fa-plus"></i> Import</a>
				</div>
			</div>
		<?php endif; ?>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="10%">
					<col width="30%">
					<col width="5%">
					<col width="5%">
					<col width="5%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Student Code</th>
						<th>Student Name</th>
						<th>Class</th>
						<th>Subject</th>
						<th>Credits</th>
						<th>Grades</th>
						<th>Pointer</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$id = 1;
					$where = "";
					if (isset($_SESSION['rs_id'])) {
						$where = " where r.student_id = {$_SESSION['rs_id']} ";
					}
					$qry = $conn->query("SELECT r.*, concat(s.firstname,' ',s.middlename,' ',s.lastname) as name, s.student_code, concat(c.level,'-',c.section) as class, sub.subject as subject_name
                         FROM results r
                         INNER JOIN classes c ON c.id = r.class_id
                         INNER JOIN students s ON s.id = r.student_id
                         INNER JOIN result_items ri ON ri.result_id = r.id
                         INNER JOIN subjects sub ON sub.id = ri.subject_id
                         $where
                         ORDER BY UNIX_TIMESTAMP(r.date_created) DESC ");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<td class="text-center"><?php echo $i++ ?></td>
							<td><?php echo $row['student_code'] ?></td>
							<td><?php echo ucwords($row['name']) ?></td>
							<td><?php echo ucwords($row['class']) ?></td>
							<td><?php echo ucwords($row['subject_name']) ?></td> <!-- Display the subject name -->
							<td class="text-center"><?php echo $row['totalcredit'] ?></td>
							<?php 
								if($row['totalgrade'] != 0 )
								{
									$totalgrade = $row['totalgrade'];
								}
								else
								{
									if($row['totalgrade'] >=90 )
								{
									$totalgrade = "AA";
								}
								else if($row['totalgrade'] >= 80 && $row['totalgrade'] < 90)
								{
									$totalgrade = "AB";
								}
								else if($row['totalgrade'] >= 70 && $row['totalgrade'] < 80)
								{
									$totalgrade = "BB";
								}
								else if($row['totalgrade'] >= 60 && $row['totalgrade'] < 70)
								{
									$totalgrade = "BC";
								}
								else if($row['totalgrade'] >= 50 && $row['totalgrade'] < 60)
								{
									$totalgrade = "CC";
								}
								else if($row['totalgrade'] >= 45 && $row['totalgrade'] < 50)
								{
									$totalgrade = "CD";
								}
								else if($row['totalgrade'] >= 40 && $row['totalgrade'] < 45)
								{
									$totalgrade = "DD";
								}
								else if($row['totalgrade'] < 40)
								{
									$totalgrade = "FF";
								}
								}
							?>
							<td class="text-center"><?php echo $totalgrade ?></td>
							<td class="text-center"><?php echo $row['pointer'] ?></td>
							<td class="text-center">
								<?php if (isset($_SESSION['login_id'])) : ?>
									<div class="btn-group">
										<a href="./index.php?page=edit_result&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat">
											<i class="fas fa-edit"></i>
										</a>
										<button data-id="<?php echo $row['id'] ?>" type="button" class="btn btn-info btn-flat view_result">
											<i class="fas fa-eye"></i>
										</button>
										<button type="button" class="btn btn-danger btn-flat delete_result" data-id="<?php echo $row['id'] ?>">
											<i class="fas fa-trash"></i>
										</button>
									</div>
								<?php elseif (isset($_SESSION['rs_id'])) : ?>
									<button data-id="<?php echo $row['id'] ?>" type="button" class="btn btn-info btn-flat view_result">
										<i class="fas fa-eye"></i>
										View Result
									</button>
								<?php endif; ?>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#list').dataTable()
		$('.delete_result').click(function() {
			_conf("Are you sure to delete this result?", "delete_result", [$(this).attr('data-id')])
		})

		$('.view_result').click(function() {
			uni_modal("Result", "view_result.php?id=" + $(this).attr('data-id'), 'mid-large')
		})
		$('.status_chk').change(function() {
			var status = $(this).prop('checked') == true ? 1 : 2;
			if ($(this).attr('data-state-stats') !== undefined && $(this).attr('data-state-stats') == 'error') {
				$(this).removeAttr('data-state-stats')
				return false;
			}
			// return false;
			var id = $(this).attr('data-id');
			start_load()
			$.ajax({
				url: 'ajax.php?action=update_result_stats',
				method: 'POST',
				data: {
					id: id,
					status: status
				},
				error: function(err) {
					console.log(err)
					alert_toast("Something went wrong while updating the result's status.", 'error')
					$('#status_chk').attr('data-state-stats', 'error').bootstrapToggle('toggle')
					end_load()
				},
				success: function(resp) {
					if (resp == 1) {
						alert_toast("result status successfully updated.", 'success')
						end_load()
					} else {
						alert_toast("Something went wrong while updating the result's status.", 'error')
						$('#status_chk').attr('data-state-stats', 'error').bootstrapToggle('toggle')
						end_load()
					}
				}
			})
		})
	})

	function delete_result($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_result',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>