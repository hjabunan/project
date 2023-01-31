<?php
    require_once('../pcrud/conn/conn.php');

    if(isset($_POST['updatedata'])){
        $id=$_POST['update_id'];

        $name=$_POST['AName'];
        $address=$_POST['AAddress'];
        $bdate=$_POST['ADate'];
        //$profile=$_POST['AProfilex'];
        
        //for image
        $file = $_FILES['AProfilex'];
        
        $fileName = $_FILES['AProfilex']['name'];
        $fileTmpName = $_FILES['AProfilex']['tmp_name'];
        $fileSize = $_FILES['AProfilex']['size'];
        $fileError = $_FILES['AProfilex']['error'];
        $fileType = $_FILES['AProfilex']['type'];


        // if(!is_uploaded_file($_FILES['AProfile'])){
        //     $query_update1 = "Update empdata SET Name='$name', Address='$address', Birthdate='$bdate' where ID='$id'";
        //     $query_update_run1 = mysqli_query($conn,$query_update1);

        //     if($query_update_run1){
        //         echo '<script> alert("Data Updated"); </script>';
        //         header ("Location: index.php");
        //     }else{
        //         echo '<script> alert("Data Not Updated"); </script>';
        //     }
        // }else{
        //     $query_update2 = "Update empdata SET Name='$name', Address='$address', Birthdate='$bdate', Profile='$profile' where ID='$id'";
        //     $query_update_run2 = mysqli_query($conn,$query_update2);

        //     if($query_update_run2){
        //         echo '<script> alert("Data Updated"); </script>';
        //         header ("Location: index.php");
        //     }else{
        //         echo '<script> alert("Data Not Updated"); </script>';
        //     }
        // }

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png');


        if (($fileName) != null){
            if(in_array($fileActualExt,$allowed)){
                if($fileError === 0){
                    if($fileSize < 500000){
                        $fileNameNew = uniqid('',true).".".$fileActualExt;

                         $fileDestination = '../pcrud/profile/'.$fileNameNew;
                         move_uploaded_file($fileTmpName,$fileDestination);
                            
                         $query_update1 = "Update empdata SET Name='$name', Address='$address', Birthdate='$bdate', Profile='$fileNameNew' where ID='$id'";

                         mysqli_query($conn,$query_update1);

                         header("Location: index.php");
                    }else{
                        echo "Your image is too big!";
                    }
                }else{
                    echo "There was an error uploading the image!";
                }
            }else{
                echo "You cannot upload image of this type!";
            }
        }else{
            $query_update2 = "Update empdata SET Name='$name', Address='$address', Birthdate='$bdate' where ID='$id'";

            mysqli_query($conn,$query_update2);

            header("Location: index.php");
        }
        
        // if($file != null )  {
        //     if(in_array($fileActualExt,$allowed)){
        //         if($fileError === 0){
        //              if($fileSize < 500000){
        //                 $fileNameNew = uniqid('',true).".".$fileActualExt;

        //                 $fileDestination = '../pcrud/profile/'.$fileNameNew;
        //                 move_uploaded_file($fileTmpName,$fileDestination);
                            
        //                 $query_update1 = "Update empdata SET Name='$name', Address='$address', Birthdate='$bdate', Profile='$fileNameNew' where ID='$id'";
        //                 mysqli_query($conn,$query_update1);

        //                 header("Location: index.php");
                            
        //             }else{
        //                 echo "Your image is too big!";
        //             }
        //         }else{
        //             
        //         } 
        //     }else{
        //         
        //     }
        // }else{
        //     $query_update2 = "Update empdata SET Name='$name', Address='$address', Birthdate='$bdate' where ID='$id'";
        //     mysqli_query($conn,$query_update2);

        //     header("Location: index.php");
        // }
    }
?>