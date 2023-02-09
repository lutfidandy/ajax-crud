
<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/9585/9585004.png" type="image/icon type">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

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

	<br><br><br><br>
		<div style="margin: auto;width: 40%;">
			<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	 		 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			</div>
	
	
	<form id="fupForm" name="form1" method="post">
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Phone:</label>
			<input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
		</div>
		<div class="form-group" >
			<label for="city">City:</label>
			<select name="city" id="city" class="form-control">
				<option value="">Select</option>
				<option value="Jakarta">Jakarta</option>
				<option value="Bali">Bali</option>
				<option value="Lombok">Lombok</option>
			</select>
		</div>
		
		<input type="button" name="save" class="btn btn-primary" value="Save" id="butsave">
		
	</form> 
<div>

</div>
</div>

<script>
	
	var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
	
$(document).ready(function() {
$('#butsave').on('click', function() {
$("#butsave").attr("disabled", "disabled");
var name = $('#name').val();
var email = $('#email').val();
var phone = $('#phone').val();
var city = $('#city').val();


if(name!="" && email!="" && phone!="" && city!=""){
if(!email_regex.test(document.form1.email.value)){
		alert("format email salah!");
		$("#butsave").removeAttr("disabled");

	}else{
		$.ajax({
		url: "save.php",
		type: "POST",
		data: {
			name: name,
			email: email,
			phone: phone,
			city: city				
		},
		cache: false,
		success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				$("#butsave").removeAttr("disabled");
				$('#fupForm').find('input:text').val('');
				$("#success").show();
				$('#success').html('Data added successfully !'); 						
			}
			else if(dataResult.statusCode==201){
				alert("Error occured !");
			}
			
		}
	});
	}
	}else{
		alert('Please fill all the field !');
		$("#butsave").removeAttr("disabled");
	}
});
});
</script>
</body>
</html>