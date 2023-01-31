<?php
    require_once('../pcrud/conn/conn.php');

    if(isset($_POST['adddata'])){
        $AName = $_POST['AName'];
        $AAddress = $_POST['AAddress'];
        $ADate = $_POST['ADate'];
        //$AProfile = $_POST['AProfile'];

        //for image
        $file = $_FILES['AProfile'];

        $fileName = $_FILES['AProfile']['name'];
        $fileTmpName = $_FILES['AProfile']['tmp_name'];
        $fileSize = $_FILES['AProfile']['size'];
        $fileError = $_FILES['AProfile']['error'];
        $fileType = $_FILES['AProfile']['type'];


        // Current_Timestamp - this is to get the current date and time of the computer.

        // $query_add = "Insert into empdata(`Name`,`Address`,`Birthdate`,`Profile`,`Create Date`) 
        // values ('$AName','$AAddress','$ADate','$AProfile',Current_Timestamp)";
        // $query_run = mysqli_query($conn,$query_add);

        // if ($query_run){
        //     echo "Data Saved!";
        //     header('Location: index.php');
        // }else{
        //     echo "Data not saved!";
        // }

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png');
        
        if(in_array($fileActualExt,$allowed)){
           if($fileError === 0){
                if($fileSize < 500000){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;

                    $fileDestination = '../pcrud/profile/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);

                    $query_add = "Insert into empdata(`Name`,`Address`,`Birthdate`,`Profile`,`Create Date`) 
                    values ('$AName','$AAddress','$ADate','$fileNameNew',Current_Timestamp)";
                    mysqli_query($conn,$query_add);

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
    }
?>