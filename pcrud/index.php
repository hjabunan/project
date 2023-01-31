<?php
    require_once('../pcrud/conn/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <!-- Important: Link for Modal -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../pcrud/css/style.css">
</head>
<body>

    <!-- Start of ADD Form (Modal) -->
    <div class="modal fade" id="AddModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Add Data
                    </h5>
                    <button class="close" id="closeX" data-dismiss="modal" aria-label="Close">
                        &times;
                    </button>
                </div>
                <form action="add.php" name="addform" method="POST" onsubmit="return adddata()" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="AName" class="">Name</label>
                            <input type="text" name="AName" class="form-control" placeholder="Enter Fullname">
                        </div>
                        <div class="form-group">
                            <label for="AAddress" class="">Address</label>
                            <input type="text" name="AAddress" class="form-control" placeholder="Enter Address">
                        </div>                        
                        <div class="form-group">
                            <label for="ADate" class="">Birthdate</label>
                            <input type="date" name="ADate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="AProfile" class="">Upload Profile</label>
                            <input type="file" name="AProfile" class="form-control">
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="adddata" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger reset" >Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of ADD Form (Modal) -->

    <!-- Start of UPDATE Form (Modal) -->
    <div class="modal fade" id="UpdateModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Update Data
                    </h5>
                    <button class="close" id="closeX" data-dismiss="modal" aria-label="Close">
                        &times;
                    </button>
                </div>
                <form action="update.php" onsubmit="return updatedata()" name="updateform" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label for="AName">Name</label>
                            <input type="text" name="AName" id="AName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="AAddress">Address</label>
                            <input type="text" name="AAddress" id="AAddress" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ADate">Birthdate</label>
                            <input type="date" name="ADate" id="ADate" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="AProfilex">Update Profile</label>
                            <input type="file" name="AProfilex" id="AProfilex" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="updatedata" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-danger reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of UPDATE Form (Modal) -->

    <!-- Start of DELETE Form (Modal) -->
    <div class="modal fade" id="DeleteModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Delete Data
                    </h5>
                    <button class="close" id="closeX" data-dismiss="modal" aria-label="Close">
                        &times;
                    </button>
                </div>
                <form action="delete.php" name="deleteform" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of DELETE Form (Modal) -->

    <div class="mn-div">
        <div class="mn-div-title">
            <header>CRUD with Uploading</header>
        </div>
        <div class="mn-wholebody">
            <div class="mn-div-add">
                <button class="btn-primary" name="Add User" data-toggle="modal" data-target="#AddModal">
                    <img src="../pcrud/icon/icons8-add-user-48.png">
                </button>
            </div>
            <div class="mn-div-search">
                <label for="searchbox">Search:</label>
                <input type="text" name="searchbox" id="searchbox" onkeyup="myFunction()">
            </div>
            <br>
            <div class="mn-div-body flex flex-col " id='searchbody'>
                <div class="body-one">
                    <table class="table-show table-layout:fixed w" name="table-show" id='table-show'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Birthday</th>
                                <th>Profile</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php
                                $select_data="Select * from empdata";
                                $select_data_query = mysqli_query($conn, $select_data);

                                $row_count=mysqli_num_rows($select_data_query);
                                //echo $row_count;

                                if(mysqli_num_rows($select_data_query)>0){
                                    while($row=mysqli_fetch_array($select_data_query)){
                            ?>
                                    <tr>
                                        <td><?php echo $row['ID']; ?></td>
                                        <td><?php echo $row['Name']; ?></td>
                                        <td><?php echo $row['Address']; ?></td>
                                        <td><?php echo $row['Birthdate']; ?></td>
                                        <td><img src="../pcrud/profile/<?php echo $row['Profile']; ?>" width="60" height="60"></td>
                                        <td><?php echo $row['Create Date']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success editbtn" name="updatedata">
                                                <img src="../pcrud/icon/icons8-edit-48.png" alt="Edit" srcset="" width="30" height="30">
                                            </button>
                                            <button type="button" class="btn btn-danger deletebtn" name="deletedata">
                                                <img src="../pcrud/icon/icons8-remove-48.png" alt="Delete" srcset="" width="30" height="30">
                                            </button>
                                        </td>
                                    </tr>
                            <?php
                                    }
                                }else{
                                    echo "No Records Found!";
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->

    <script>
        function adddata(){
            var data_input = document.forms["addform"]["AName"].value;
                if (data_input=="" || data_input==null){
                    alert("Please enter data!");
                    return false;
                }
        }
    </script>

    <!-- Edit Script -->
    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#UpdateModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#AName').val(data[1]);
                $('#AAddress').val(data[2]);
                $('#ADate').val(data[3]);
                $('#AProfilex').val(data[4]);
            });
        });
    </script>

    <!-- Delete Script -->
    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#DeleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
    $(document).ready(function(){
    $("#searchbox").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table-body tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
    </script>

</body>
</html>

