<?php
include 'db_connect.php';
$qry = $conn->query("SELECT r.*,concat(s.firstname,' ',s.middlename,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class,s.gender FROM results r inner join classes c on c.id = r.class_id inner join students s on s.id = r.student_id where r.id = " . $_GET['id'])->fetch_array();
foreach ($qry as $k => $v) {
	$$k = $v;
}
?>
<div class="container-fluid" id="printable">
	<table width="100%">
		<tr>
			<td width="50%">Student ID #: <b><?php echo $student_code ?></b></td>
			<td width="50%">Class: <b><?php echo $class ?></b></td>
		</tr>
		<tr>
			<td width="50%">Student Name: <b><?php echo ucwords($name) ?></b></td>
			<td width="50%">Gender: <b><?php echo ucwords($gender) ?></b></td>
		</tr>
	</table>
	<hr>
	<table class="table table-bordered">
		<thead>
				<tr>
					<th class="text-cnter">Subject Code</th>
					<th class="text-cnter">Subject</th>
					<th class="text-cnter">CA1</th>
					<th class="text-cnter">CA2</th>
					<th class="text-cnter">MSE</th>
					<th class="text-cnter">ESE</th>
					<th class="text-cnter">Total Marks</th>
					<th class="text-cnter">Grade</th>
					<th class="text-cnter">Credit</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$items = $conn->query("SELECT r.*,s.subject_code,s.subject FROM result_items r inner join subjects s on s.id = r.subject_id where result_id = $id  order by s.subject_code asc");
				while ($row = $items->fetch_assoc()) :
				?>
					<tr>
						<td class="text-cnter"><?php echo $row['subject_code'] ?></td>
						<td class="text-cnter"><?php echo ucwords($row['subject']) ?></td>
						<td class="text-cnter"><?php echo number_format($row['ca1']) ?></td>
						<td class="text-cnter"><?php echo number_format($row['ca2']) ?></td>
						<td class="text-cnter"><?php echo number_format($row['mse']) ?></td>
						<td class="text-cnter"><?php echo number_format($row['ese']) ?></td>
						<td class="text-cnter"><?php echo number_format($row['marks']) ?></td>
						<?php 
								if($row['grade'] != 0 )
								{
									$totalgrade = $row['grade'];
								}
								else
								{
									if($row['grade'] >=90 )
								{
									$totalgrade = "AA";
								}
								else if($row['grade'] >= 80 && $row['grade'] < 90)
								{
									$totalgrade = "AB";
								}
								else if($row['grade'] >= 70 && $row['grade'] < 80)
								{
									$totalgrade = "BB";
								}
								else if($row['grade'] >= 60 && $row['grade'] < 70)
								{
									$totalgrade = "BC";
								}
								else if($row['grade'] >= 50 && $row['grade'] < 60)
								{
									$totalgrade = "CC";
								}
								else if($row['grade'] >= 45 && $row['grade'] < 50)
								{
									$totalgrade = "CD";
								}
								else if($row['grade'] >= 40 && $row['grade'] < 45)
								{
									$totalgrade = "DD";
								}
								else if($row['grade'] < 40)
								{
									$totalgrade = "FF";
								}
								}
							?>
						<td class="text-cnter"><?php echo $totalgrade ?></td>
						<td class="text-cnter"><?php echo number_format($row['credit']) ?></td>
						
					</tr>
				<?php endwhile; ?>
			</tbody>
	</table>
</div>
<div class="modal-footer display p-0 m-0">
	<button type="button" class="btn btn-success" id="print"><i class="fa fa-print"></i>Print</button>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer {
		display: none
	}

	#uni_modal .modal-footer.display {
		display: flex
	}
</style>
<noscript>
	<style>
		table.table {
			width: 100%;
			border-collapse: collapse;
		}

		table.table tr,
		table.table th,
		table.table td {
			border: 1px solid;
		}

		.text-cnter {
			text-align: center;
		}
	</style>
	<style>
		body {
			font-family: Roboto, sans-serif;
			margin: 0;
			padding: 0;
		}

		.MiddleNavbar .navbar-header .logoText h5 span {
			color: #212223;
			font-size: 15px;
			font-weight: 500;
			font-style: normal;
		}

		.MiddleNavbar .navbar-header .logoText h5 strong {
			color: #212223;
			font-weight: 600;
			font-size: 23px;
			font-family: "Roboto Slab", serif;
			font-style: normal;
		}

		.header-btn {
			float: right;
			visibility: hidden;
		}

		.MiddleNavbar .navbar-header .logoText h5 {
			color: #f58634;
			font-weight: 500;
			font-style: italic;
			font-size: 15px;
			font-family: Roboto, sans-serif;
			line-height: 26px;
		}

		.MiddleNavbar .navbar-brand {
			height: inherit;
			margin-left: 0;
			padding: 17px 13px;
		}

		.MiddleNavbar .navbar-header a.navbar-brand img {
			display: inline-block;
			vertical-align: top;
			padding-right: 0;
		}

		.MiddleNavbar .navbar-header .logoText {
			display: inline-block;
		}

		.MiddleNavbar .navbar-default {
			background: #fff;
			border: none;
			margin-bottom: 0;
		}

		header .MiddleNavbar .navbar-default {
			border: none;
		}
	</style>
	<center>
		<div class="MiddleNavbar">
			<nav class="navbar navbar-default logoArea">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-sm-12 col-xs-12">
							<div class="navbar-header">
								<a class="navbar-brand" href="/" title="Sharad Institute of Technology, College of Engineering"><img src="https://sitcoe.ac.in/images/logo.png" alt="Sharad Institute of Technology, College of Engineering" />
									<div class="logoText">
										<h5>
											<span>Shri Shamrao Patil (Yadravkar) Educational &amp;
												Charitable Trust's</span><br />
											<strong>Sharad Institute of Technology College of
												Engineering</strong><br />
											<span style="font-size: 19px; color: #f58634">An Autonomous Institute</span><br />
											NBA Accredited Programmes. An A Grade Institute
											Accredited By NAAC, An ISO 9001:2015 Accredited
											Institute
											<br />Recognized u/s 2(f) and 12(B) of the UGC Act 1956
										</h5>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</center>
</noscript>
<script>
	$('#print').click(function() {
		start_load()
		var ns = $('noscript').clone()
		var content = $('#printable').clone()
		ns.append(content)
		var nw = window.open('', '', 'height=700,width=900')
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(function() {
			nw.close()
			end_load()
		}, 7750)

	})
</script>