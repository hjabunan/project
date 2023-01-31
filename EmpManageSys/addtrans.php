<?php session_start();
if(!$_SESSION['id']){header('Location:index.php');}
    $logged=($_SESSION['id']);

?>
<?php include_once("oopbackend.php");

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM users WHERE id=$id");
 ?>
<html>
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
<head>
	<title>File Leave</title>
	<script type="text/javascript">
		function validate() {
			if (document.form1.type.value == '') {
				alert('Please provide your leave type');
				document.form1.name.focus();				
				return false;
			}
			if (document.form1.days.value == '') {
				alert('Please provide number of days');
				document.form1.email.focus();
				return false;
			}
			if (document.form1.start.value == '') {
				alert('Please provide date start');
				document.form1.email.focus();
				return false;
			}
			return true;
		}
	</script>	
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashoboard1.php">Employee Management System</a>
    </div>
    	 
      <a  href="dashoboard1.php">Home</a>
      <a  href="trans1.php">View Transactions</a>
  </div>
</nav>
<body>
	<br/><br/>
	<div id="msg"></div>
	<!--<form action="add.php" method="post" name="form1" onsubmit = "return(validate());">-->
	<form action="addtransaction.php" method="post" name="form1" >
	<h3>Filing Leave of Employee: <?php echo $id;?></h3>
		<table width="25%" border="0">
		<div class="form-group">
				<label for="id">Applicant ID:</label>
				<input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
			</div>
			<div class="form-group">
				<label for="type">Leave type:</label>
				<SELECT name="type">
					<option >Sick Leave</option>
					<option >Vacation Leave</option>
				</SELECT>
			</div>
			<div class="form-group"> 
				<label for="days">Number of Days:</label>
				<input type="text" class="form-control" id="days" name="days">
			</div>
			<div class="form-group"> 
				<label for="date">Starting Day:</label>
				<input type="date" class="form-control" id="date" name="date">
			</div>
			
				<input class='btn btn-success' type="submit" name="Submit" value="Add"></td>
			
		</table>
	</form>
</body>
</html>

