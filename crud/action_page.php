<?php
    require_once('../conn/conn.php');

    if(isset($_POST['btn-submit'])){
        $name = $_POST['Name'];
        $age = $_POST['Age'];
        $address = $_POST['Address'];
        $salary = $_POST['Salary'];
        $profile = $_FILES['Profile']['name'];
        $profile_tmp = $_FILES['Profile']['tmp_name'];
        $profile_image_location = '../profile/'.$profile;
        $move = move_uploaded_file($profile_tmp,$profile_image_location);

        // $insert_data = "INSERT INTO `customers`(`NAME`, `AGE`, `ADDRESS`, `SALARY`, `PROFILE`, `CREATEDATE`) 
        // VALUES ('$name','$age','$address','$salary','$profile','CURRENT_TIMESTAMP')";

        // $insert_data_query = mysqli_query($conn, $insert_data);

        echo $name;
    }
?>