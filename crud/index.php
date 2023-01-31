<?php
    require_once('../crud/conn/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>  

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="mn-div">
        <header>CRUD Activity</header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form action="add.php">
            <div class='but-add'>
                <button id="show"><img src="../crud/icon/icons8-add-user-48.png"></button>
            </div>

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th class="header1">ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Create Date</th>
                            <th>Profile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $select_data = "SELECT `ID`, `NAME`, `AGE`, `ADDRESS`, `SALARY`, `PROFILE`, `CREATEDATE` 
                            FROM `customers`";
                            $select_data_query = mysqli_query($conn, $select_data);

                            $row_count = mysqli_num_rows($select_data_query);
                            //echo $row_count;

                            if(mysqli_num_rows($select_data_query)>0){
                                while($rows = mysqli_fetch_array($select_data_query)){ ?>
                                    <tr>
                                        <td><?php echo $rows['ID'] ?></td>
                                        <td><?php echo $rows['NAME'] ?></td>
                                        <td><?php echo $rows['AGE'] ?></td>
                                        <td><?php echo $rows['ADDRESS'] ?></td>
                                        <td><?php echo $rows['SALARY'] ?></td>
                                        <td><?php echo $rows['CREATEDATE'] ?></td>
                                        <td><img src = "../crud/profile/<?php echo $rows['PROFILE'] ?>" width="60" height="60"></td>
                                        <td>
                                            <a href="../crud/edit.php/id=<?php echo $rows['ID'] ?>"><img src="../crud/icon/icons8-edit-profile-48.png" width="40" height="40"></a>
                                            <a href="../crud/delete.php/id=<?php echo $rows['ID'] ?>"><img src="../crud/icon/icons8-remove-48.png" width="40" height="40"></a>
                                        </td>
                                    </tr>                      
                                <?php }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

</body>
</html>