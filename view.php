<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #d1f3d1;
      height: 100%;
      width: 20%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h3>Menu</h3>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="view.php">Home</a></li>
        <li><a href="add.php">Add Data</a></li>
		<li><a href="index.php">Logout</a></li>
      </ul><br>
    </div>

    <div class="col-sm-3">
      <h3><small>View Data</small></h3>
      <div class="container">
 
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<table class="table table-hover table-fixed table-bordered table-sm" style="width: 75%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
		<th>City</th>
		<th>Action</th>
		
    
      </tr>
    </thead>
	<tbody id="table">
	 
	</tbody> 
  </table>
</div>
<!-- Modal Update-->
<div class="modal fade" id="update_country" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: lightgreen;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Update</h5>
			</div>


			<div class="modal-body">
			
				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Name</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="name_modal" id="name_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--2-->
				<div class="row">
					<div class="col-md-3">
					    <label>Email</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="email_modal" id="email_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--3-->
				<div class="row">
					<div class="col-md-3">
					    <label>Phone</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="phone_modal" id="phone_modal" class="form-control-sm" required>
					</div>	
				</div>
				<!--4-->
				<div class="row">
					<div class="col-md-3">
					    <label>City</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="city_modal" id="city_modal" class="form-control-sm" required>
					</div>	
				</div>
				<input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;"><button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: lightgreen;color:#fff;">Save</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: lightgreen;color:#fff;">Close</button></p>
			
		</div>
		 
	</div>
</div>

<script>
$(document).ready(function() {
	$.ajax({
		url: "View_ajax.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#table').html(dataResult); 
		}
	});
	$(document).on("click", ".delete", function() { 
		var $ele = $(this).parent().parent();
		$.ajax({
			url: "delete_ajax.php",
			type: "POST",
			cache: false,
			data:{
				id: $(this).attr("data-id")
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$ele.fadeOut().remove();
				}
			}
		});
	});


	$(function () {
		$('#update_country').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var id = button.data('id');
			var name = button.data('name');
			var email = button.data('email');
			var phone = button.data('phone');
			var city = button.data('city');
			var modal = $(this);
			modal.find('#name_modal').val(name);
			modal.find('#email_modal').val(email);
			modal.find('#phone_modal').val(phone);
			modal.find('#city_modal').val(city);
			modal.find('#id_modal').val(id);
		});
    });
	$(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "update_ajax.php",
			type: "POST",
			cache: false,
			data:{
				id: $('#id_modal').val(),
				name: $('#name_modal').val(),
				email: $('#email_modal').val(),
				phone: $('#phone_modal').val(),
				city: $('#city_modal').val(),
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_country').modal().hide();
					alert('Data updated successfully !');
					location.reload();					
				}
			}
			
		});
	}); 
	
});
</script>

</body>
</html>
