<?php session_start();
$admin="admin";
if(!$_SESSION['id'] and $_SESSION['position'] != $admin){header('Location:index.php');}
    $logged=($_SESSION['id']);

?>
<!doctype html>
<html>
<head>
		<meta charset="UTF-8">
 

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Employee Management System</a>
    </div>
    	 
      <a  href="index.php">Home</a>
      <a  href="trans.php">View Transactions</a>
  </div>
</nav>
<head>
	<title>Add Data</title>
	<script type="text/javascript">
		function validate() {
			if (document.form1.name.value == '') {
				alert('Please provide your name');
				document.form1.name.focus();				
				return false;
			}
			if (document.form1.email.value == '') {
				alert('Please provide your email');
				document.form1.email.focus();
				return false;
			}
			return true;
		}
	</script>
	
	
</head>
<style type="text/css">
	#msg{
		width: 70%;


		}
</style>
<body>


	<div id="msg" class=''>
	<h3 >Adding New Employee</h3>
	<!--<form action="add.php" method="post" name="form1" onsubmit = "return(validate());">-->
	
	<form action="add.php" method="post" name="form1" id='contact' >
	
		<div class="container">
			<div class="form-group">
				<label for="name">Name:</label>
    			<input type="name" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
    			<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="pos">Position</label>
    			<input type="pos" class="form-control" id="pos" name="pos" >
			</div>
			<div class="form-group">
				<label for="password">Password</label>
    			<input type="password" class="form-control" id="password" name="password" >
			</div>
			
			
			
			<tr> 
				<td></td>
				<td><button class=" btn btn-success"id="contact-submit" type="submit" name="Submit">Submit</button></td>
			</tr>
		</div>
		
	</form>
	</div>
	</div>
</body>
</html>

<?php include 'footer.php'?>