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
    <div class="par-div">
        <header>CRUD Activity</header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form class="addf" action="crud/action_page.php">
            <div class="dbl-field">
                <div class="field">
                    <input type="text" name="name" placeholder="Enter your Name">
                    <i class="fas fa-user"></i>
                </div>
                <div class="field">
                    <input type="text" name="age" placeholder="Enter your Age">
                    <i class="fas fa-arrow-alt-circle-up"></i>
                </div>
            </div>
            <div class="dbl-field">
                <div class="field">
                    <input type="text" name="phone" placeholder="Enter your Address">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="field">
                    <input type="text" name="website" placeholder="Enter your Salary">
                    <i class="fas fa-money-bill"></i>
                </div>
            </div>
            <div class="button-area">
                <input type="file" name="Profile"><br><br>
                <button type="btn-submit">Add</button>
                <!-- <button type="submit">Clear</button> -->
            </div>
        </form>
    </div>

</body>
</html>