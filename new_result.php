<?php if (!isset($conn)) {
	include 'db_connect.php';
} ?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-result">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row justify-content-center">
					<div class="col-md-6">
						<div id="msg" class=""></div>
						<div class="form-group">
							<label for="" class="control-label">Student</label>
							<select name="student_id" id="student_id" class="form-control select2 select2-sm" required>
								<option></option>
								<?php
								$classes = $conn->query("SELECT s.*,concat(c.level,'-',c.section) as class,concat(firstname,' ',middlename,' ',lastname) as name FROM students s inner join classes c on c.id = s.class_id order by concat(firstname,' ',middlename,' ',lastname) asc ");
								while ($row = $classes->fetch_array()) :
								?>
									<option value="<?php echo $row['id'] ?>" data-class_id='<?php echo $row['class_id'] ?>' data-class='<?php echo $row['class'] ?>' <?php echo isset($student_id) && $student_id == $row['id'] ? "selected" : '' ?>><?php echo $row['student_code'] . ' | ' . ucwords($row['name']) ?></option>
								<?php endwhile; ?>
							</select>
							<small id="class"><?php echo isset($class) ? "Current Class: " . $class : "" ?></small>
							<input type="hidden" name="class_id" value="<?php echo isset($class_id) ? $class_id : '' ?>">
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<div class="d-flex justify-content-center align-items-center">
							<div class="form-group col-sm-3">
								<label for="" class="control-label">Subject</label>
								<select name="" id="subject_id" class="form-control select2 select2-sm input-sm">
									<option></option>
									<?php
									$classes = $conn->query("SELECT * FROM subjects order by subject asc ");
									while ($row = $classes->fetch_array()) :
									?>
										<option value="<?php echo $row['id'] ?>" data-json='<?php echo json_encode($row) ?>'><?php echo $row['subject_code'] . ' | ' . ucwords($row['subject']) ?></option>
									<?php endwhile; ?>
								</select>
								<label for="" class="control-label">CA1</label>
								<input type="text" class="form-control form-control-sm text-right number" id="ca1" maxlength="6">
								<label for="" class="control-label">CA2</label>
								<input type="text" class="form-control form-control-sm text-right number" id="ca2" maxlength="6">
							</div>
							<div class="form-group col-sm-3">
								<label for="" class="control-label">MSE</label>
								<input type="text" class="form-control form-control-sm text-right number" id="mse" maxlength="6">
								<label for="" class="control-label">ESE</label>
								<input type="text" class="form-control form-control-sm text-right number" id="ese" maxlength="6">
							</div>
							<button class="btn btn-sm btn-primary bg-gradient-primary" type="button" id="add_mark">Add</button>
						</div>
					</div>
					<hr>
					<div class="col-md-8 offset-md-2">
						<table class="table table-bordered" id="mark-list">
							<thead>
								<tr>
									<th>Subject Code</th>
									<th>Subject</th>
									<th>CA1</th>
									<th>CA2</th>
									<th>MSE</th>
									<th>ESE</th>
									<th>Marks</th>
									<th>Grades</th>
									<th>Credit</th>
								</tr>
							</thead>
							<tbody>
								<?php if (isset($id)) : ?>
									<?php
									$items = $conn->query("SELECT r.*,s.subject_code,s.subject,s.credit,s.id as sid FROM result_items r inner join subjects s on s.id = r.subject_id where result_id = $id order by s.subject_code asc");
									while ($row = $items->fetch_assoc()) :
									?>
										<tr data-id="<?php echo $row['sid'] ?>">
											<td><input type="hidden" name="subject_id[]" value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_code'] ?></td>
											<td><?php echo ucwords($row['subject']) ?></td>
											<td><input type="hidden" name="ca1[]" value="<?php echo $row['ca1'] ?>"><?php echo $row['ca1'] ?></td>
											<td><input type="hidden" name="ca2[]" value="<?php echo $row['ca2'] ?>"><?php echo $row['ca2'] ?></td>
											<td><input type="hidden" name="mse[]" value="<?php echo $row['mse'] ?>"><?php echo $row['mse'] ?></td>
											<td><input type="hidden" name="ese[]" value="<?php echo $row['ese'] ?>"><?php echo $row['ese'] ?></td>
											<td><input type="hidden" name="marks[]" value="<?php echo $row['marks'] ?>"><?php echo $row['marks'] ?></td>
											<td><input type="hidden" name="grade[]" value="<?php echo $row['grade'] ?>"><?php echo $row['grade'] ?></td>
											<td><input type="hidden" name="credit[]" value="<?php echo $row['credit'] ?>"><?php echo $row['credit'] ?></td>
											
											<td class="text-center"><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc_ave()"><i class="fa fa-times"></i></button></td>
										</tr>
									<?php endwhile; ?>
									<script>
										$(document).ready(function() {
											calc_ave()
										})
									</script>
								<?php endif; ?>

							</tbody>
							<tfoot>
								<tr>
									<th>Total Grades</th>
									<th>Total Credits</th>
									<th>Pointer</th>
								</tr>
								<tr>
									<td id="totalgrade" class="text-center"></td>
									<td id="totalcredit" class="text-center"></td>
									<td id="pointer" class="text-center"></td>
								</tr>
							</tfoot>
						</table>
						<input type="hidden" name="totalgrade" value="<?php echo isset($totalgrade) ? $totalgrade : '' ?>">
						<input type="hidden" name="totalcredit" value="<?php echo isset($totalcredit) ? $totalcredit : '' ?>">
						<input type="hidden" name="pointer" value="<?php echo isset($pointer) ? $pointer : '' ?>">
					</div>
				</div>
			</form>
		</div>
		<div class="card-footer border-top border-info">
			<div class="d-flex w-100 justify-content-center align-items-center">
				<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-result">Save</button>
				<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=results">Cancel</a>
			</div>
		</div>
	</div>
</div>
<script>
	var ca1, ca2, mse, ese, marks, grade, chargrade, credit;
	$('#student_id').change(function() {
		var class_id = $('#student_id option[value="' + $(this).val() + '"]').attr('data-class_id');
		var _class = $('#student_id option[value="' + $(this).val() + '"]').attr('data-class');
		$('[name="class_id"]').val(class_id)
		$('#class').text("Current Class: " + _class);
	})
	$('#add_mark').click(function() {
		var subject_id = $('#subject_id').val()
		ca1 = $('#ca1').val()
		ca2 = $('#ca2').val()
		mse = $('#mse').val()
		ese = $('#ese').val()
		marks = parseFloat($('#ca1').val()) + parseFloat($('#ca2').val()) + parseFloat($('#mse').val()) + parseFloat($('#ese').val());
		if (marks >= 40) {
			if (marks >= 90) {
				grade = 10;
			} else if (marks >= 80 && marks < 90) {
				grade = 9;
			} else if (marks >= 70 && marks < 80) {
				grade = 8;
			} else if (marks >= 60 && marks < 70) {
				grade = 7;
			} else if (marks >= 50 && marks < 60) {
				grade = 6;
			} else if (marks >= 45 && marks < 50) {
				grade = 5;
			} else if (marks >= 40 && mark < 45) {
				grade = 4;
			}
		} else if (marks < 40) {
			grade = 0;
		}

		if (grade >= 4) {
			if (grade == 10) {
				chargrade = "AA";
			} else if (grade == 9) {
				chargrade = "AB";
			} else if (grade == 8) {
				chargrade = "BB";
			} else if (grade == 7) {
				chargrade = "BC";
			} else if (grade == 6) {
				chargrade = "CC";
			} else if (grade == 5) {
				chargrade = "CD";
			} else if (grade == 4) {
				chargrade = "DD";
			}
		} else if (grade < 4) {
			chargrade = "FF";
		}

		if (subject_id == '' && mark == '') {
			alert_toast("Please select subject & enter a mark before adding to list.", "error");
			return false;
		}
		var sData = $('#subject_id option[value="' + subject_id + '"]').attr('data-json')
		sData = JSON.parse(sData)
		if ($('#mark-list tr[data-id="' + subject_id + '"]').length > 0) {
			alert_toast("Subject already on the list.", "error");
			return false;
		}
		var tr = $('<tr data-id="' + subject_id + '"></tr>')
		tr.append('<td><input type="hidden" name="subject_id[]" value="' + subject_id + '">' + sData.subject_code + '</td>')
		tr.append('<td>' + sData.subject + '</td>')
		tr.append('<td class="text-center"><input type="hidden" name="ca1[]" value="' + ca1 + '">' + ca1 + '</td>')
		tr.append('<td class="text-center"><input type="hidden" name="ca2[]" value="' + ca2 + '">' + ca2 + '</td>')
		tr.append('<td class="text-center"><input type="hidden" name="mse[]" value="' + mse + '">' + mse + '</td>')
		tr.append('<td class="text-center"><input type="hidden" name="ese[]" value="' + ese + '">' + ese + '</td>')
		tr.append('<td class="text-center"><input type="hidden" name="marks[]" value="' + marks + '">' + marks + '</td>')
		tr.append('<td class="text-center"><input type="hidden" name="grade[]" value="' + grade + '">' + grade + '</td>')
		tr.append('<td class="text-center"><input type="hidden" name="credit[]" value="' + sData.credit + '">' + sData.credit + '</td>')
		tr.append('<td class="text-center"><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest(\'tr\').remove() && calc_ave()"><i class="fa fa-times"></i></button></td>')
		$('#mark-list tbody').append(tr)
		$('#subject_id').val('').trigger('change')
		$('#ca1').val('')
		$('#ca2').val('')
		$('#mse').val('')
		$('#ese').val('')
		$('#marks').val('')
		$('#grade').val('')
		$('#credit').val('')
		calc_ave()
	})

	function calc_ave() {
		var total = 0;
		var i = 0;
		var totalGrade = 0;
		var totalcredit = 0;
		var grade = 0;
		var mul = 0;
		var credit = 0;
		var pointer = 0;
		$('#mark-list [name="ca1[]"]').each(function() {
			i++;
			total = total + parseFloat($(this).val())
		})
		$('#mark-list [name="ca2[]"]').each(function() {
			i++;
			total = total + parseFloat($(this).val())
		})
		$('#mark-list [name="mse[]"]').each(function() {
			i++;
			total = total + parseFloat($(this).val())
		})
		$('#mark-list [name="ese[]"]').each(function() {
			i++;
			total = total + parseFloat($(this).val())
		})
		$('#mark-list [name="grade[]"]').each(function() {
			totalGrade = totalGrade + parseFloat($(this).val())
			grade = parseFloat($(this).val())
		})
		$('#totalgrade').text(parseFloat(totalGrade).toLocaleString('en-US', {
			style: 'decimal',
			maximumFractionDigits: 4
		}))
		$('#mark-list [name="credit[]"]').each(function() {
			totalcredit = totalcredit + parseFloat($(this).val())
			credit = parseFloat($(this).val())
			mul += (grade * credit)
			pointer = mul / totalcredit
		})
		$('#totalcredit').text(parseFloat(totalcredit).toLocaleString('en-US', {
			style: 'decimal',
			maximumFractionDigits: 4
		}))
		$('#pointer').text(parseFloat(pointer).toLocaleString('en-US', {
			style: 'decimal',
			maximumFractionDigits: 4
		}))
		$('[name="pointer"]').val(parseFloat(pointer).toLocaleString('en-US', {
			style: 'decimal',
			maximumFractionDigits: 4
		}))
		$('[name="marks"]').val(parseFloat(total).toLocaleString('en-US', {
			style: 'decimal',
			maximumFractionDigits: 2
		}))
		$('#marks').text(parseFloat(total).toLocaleString('en-US', {
			style: 'decimal',
			maximumFractionDigits: 2
		}))
		$('[name="totalgrade"]').val(parseFloat(totalGrade).toLocaleString('en-US', {
			style: 'decimal',
			maximumFractionDigits: 2
		}))
		$('[name="totalcredit"]').val(parseFloat(totalcredit).toLocaleString('en-US', {
			style: 'decimal',
			maximumFractionDigits: 2
		}))
		$('[')
	}
	$('#manage-result').submit(function(e) {
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'ajax.php?action=save_result',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast('Data successfully saved', "success");
					setTimeout(function() {
						location.href = 'index.php?page=results'
					}, 2000)
				} else if (resp == 2) {
					$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Student Code already exist.</div>')
					end_load()
				}
			}
		})
	})

	function displayImgCover(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#cover').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>