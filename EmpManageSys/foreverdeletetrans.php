<?php session_start();
if(!$_SESSION['id']){header('Location:index.php');}
    $logged=($_SESSION['id']);

?>
<?php
//including the database connection file
include_once("oopbackend.php");

$crud = new Crud();

//getting id of the data from url
$id = $crud->escape_string($_GET['id']);
//deleting the row from table
$result = $crud->execute("DELETE from leave_trans where leave_id=$id");
	

if ($result) {
	//redirecting to the display page (index.php in our case)
			
	header("Location:trans1.php");
	echo '<script language="javascript">';
			echo 'alert("Successfully deleted")';
			echo '</script>';
}
?>

