<?php if (!isset($conn)) {
	include 'db_connect.php';
} ?>

<?php 
        if(isset($_SESSION['message']))
        {
            echo "<h4>".$_SESSION['message']."</h4>";
            unset($_SESSION['message']);
        }
?>

    

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
            <form action="store_students.php" method="post" enctype="multipart/form-data">
                <h3>Add Students: </h3>  
                <input type="file" name="import_file" class="form-control" /><br><br>
                <div class="d-flex w-100 justify-content-center align-items-center">
                    <button type="submit" name="save-excel_data" class="btn btn-flat  bg-gradient-primary mx-2" >IMPORT</button>
                </div>
            </form>
		</div>
	</div>
</div>
<script>

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