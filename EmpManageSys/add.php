<?php session_start();
if(!$_SESSION['id']){header('Location:index.php');}
    $logged=($_SESSION['id']);

?>
	<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("oopbackend.php");
include_once("emailvalidation.php");

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['Submit'])) {	
	$name = $crud->escape_string($_POST['name']);
	$email = $crud->escape_string($_POST['email']);
	$pos = $crud->escape_string($_POST['pos']);
	$password = $crud->escape_string($_POST['password']);	
	$msg = $validation->check_empty($_POST, array('name', 'email', 'pos'));
	$check_email = $validation->is_email_valid($_POST['email']);

	
	// checking empty fields
	if($msg != null) {
		echo $msg;		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} elseif (!$check_email) {
		echo 'Please provide proper email.';
	} 
	else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = $crud->execute("INSERT INTO users(name,position,email,password) VALUES('$name','$pos','$email','$password')");
		
		//display success message
		
		header('location:dashboard.php');
	}
}
?>
</body>
</html>
