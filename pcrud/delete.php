<?php
    require_once('../pcrud/conn/conn.php');

    if (isset($_POST['deletedata'])){
        $id = $_POST['delete_id'];

        $query_delete = "Delete from empdata where ID='$id'";
        $query_delete_run = mysqli_query($conn,$query_delete);

        if ($query_delete_run){
            echo '<script> alert("Data Deleted"); </script>';
            header("Location: index.php");
        }else{
            echo '<script> alert("Data Not Deleted"); </script>';
        }

    }
?>