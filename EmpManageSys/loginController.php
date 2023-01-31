
<?php require('SessionController.php');?>
<?php 

if(isset($_POST['btnLoginSubmit'])){
	attemptLogin();
}
function attemptLogin(){
	$id=$_POST['id'];
	$password=$_POST['password'];
	$conn = mysqli_connect("localhost", "root", "", "empmanagesysdb");
	$sql = "SELECT * FROM users WHERE id='$id' AND password='$password' LIMIT 1";
	$result= mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
    
		while($row = mysqli_fetch_assoc($result)) {
			$admin="admin";
		setSesh($row['id'],$row
			['password'],$row['position']);
		if($row['position']==$admin){
			header('Location:dashboard.php');
		}else
		header('Location:dashoboard1.php');
		}
	} else {
		header('Location:index.php');
	}
	mysqli_close($conn);
}
?>
