<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <!-- Modal -->
    <div class="modal fade" id="MyModal" tabindex="-1" aria-labelledby="MyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="MyModalLabel">New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" method="post" id="dataform">
                        <div class="form-group mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="Phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone no">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!--Update Modal -->
    <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="MyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary font-weight-bold" id="UpdateModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" method="post" id="updatedataform">
                        <input type="hidden" name="id" id="updateid">
                        <div class="form-group mb-3">
                            <label for="UpdateName" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="updatename" placeholder="Enter your name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="UpdateEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="updateemail" placeholder="Enter your email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="UpdatePhone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="updatephone" placeholder="Enter your phone no">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>



    <div class="container my-5">
        <h1 class="text-center text-success">CRUD OPERATION</h1>

        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#MyModal">
            Add Users
        </button>
    </div>

    <!-- Result -->
    <div id="result"></div>

    <!-- Table  -->
    <table id="result_table" class="table caption-top">

    </table>

    <div class="print_table" style="display: none;">
    <div id="print">
        
        <br>
        <br>
        <br>
        <table border="1" class="table-primary caption-top output" style="border: 1px solid dodgerblue;border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="col" style="padding: 30px;">ID</th>
                <th scope="col" style="padding: 30px;">Name</th>
                <th scope="col" style="padding: 30px;">Email</th>
                <th scope="col" style="padding: 30px;">Phone</th>
            </tr>
            <thead>
            <tr>
                <td scope="row" style="padding: 30px;" id="Printid"></td>
                <td scope="row" style="padding: 30px;" id="Printname"></td>
                <td scope="row" style="padding: 30px;" id="Printemail"></td>
                <td scope="row" style="padding: 30px;" id="Printphone"></td>
            </tr>
        </table>
    </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {


            // delete data from database
            $("#result_table").on('click', '.delete', function() {
                var rowid = $(this).attr('data-id');
                console.log(rowid);
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: {
                        id: rowid
                    },
                    success: function(data) {
                        getData();
                        if (data == 1) {
                            $("#" + rowid).remove();
                        }
                        $("#result").html(data);
                    }
                });
            });

            // load data in form
            $("#result_table").on("click", '.edit', function() {
                var id = $(this).attr("data-id");
                console.log(id);

                $.ajax({
                    url: "getuser.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        var data = JSON.parse(data);
                        $("#updatename").val(data.name);
                        $("#updateemail").val(data.email);
                        $("#updatephone").val(data.phone);
                        $("#updateid").val(data.id);
                        console.log(data);

                    }
                });
            });

            //Get Data from ajax and show in table

            function getData() {
                $.ajax({
                    url: "display.php",
                    type: "POST",
                    data: {
                        action: "getData"
                    },
                    success: function(data) {
                        $("#result_table").html(data);
                    }
                });
            }

            getData(); //reload table data

            //Insert Data

            $('#submit').click(function() {

                var formdata = $('#dataform').serializeArray();

                console.log(formdata);

                $.ajax({
                    url: 'insert.php',
                    type: 'POST',
                    data: formdata,
                    success: function(data, status) {
                        console.log(data);
                        getData();
                        $('#dataform').each(function() {
                            this.reset();
                        });

                        $('#MyModal').modal('hide');

                        $("#id").val("");

                        $("#result").html(data);

                    }
                });

            });


            //Update Data

            $('#update').click(function() {

                var formdata = $('#updatedataform').serializeArray();

                console.log(formdata);

                $.ajax({
                    url: 'edit.php',
                    type: 'POST',
                    data: formdata,
                    success: function(data) {
                        console.log(data);
                        getData();
                        $('#updatedataform').each(function() {
                            this.reset();
                        });
                        $("#id").val("");
                        $("#result").html(data);

                    }
                });
                $('#UpdateModal').modal('hide');

            });

            //print Data
            $("#result_table").on("click", '.printbtn', function() {
                var id = $(this).attr("data-id");
                console.log(id);

                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        var data = JSON.parse(data);
                        $('#Printid').html(data.id);
                        $('#Printname').html(data.name);
                        $('#Printemail').html(data.email);
                        $('#Printphone').html(data.phone);
                        console.log(data);
                        printData();
                    }
                });
            });

            function printData() {
                var divToPrint = document.getElementById("print");
                newWin = window.open("");
                newWin.document.write(divToPrint.outerHTML);
                newWin.print();
                newWin.close();
            }
        });

    </script>
</body>

</html>