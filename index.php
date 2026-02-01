<?php 

include_once 'classes/Register.php';

$re = new Register();

//if($_SERVER['REQUEST_METHOD']=='POST'){
 //$register = $re-> addRegister($_POST,$_FILES,$id);
//}

if(isset($_GET['delStd'])){
$id = base64_decode($_GET['delStd']);
$delStudent = $re-> delStudent($id);

}




?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Add Students</title>
  </head>
  <body>
    <br>
   <div class ="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
               <?php 
              if(isset($delStudent)){ 
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?=$delStudent?></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php 
}
 ?>
           
                <div class="card-header">
                   <div class ="row">
                        <div class="col-md-6">
                            <h3>All Student Form</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="addstd.php" class="btn btn-info float-right">Add Student</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class = "table table-bordered">
                        <tr> 
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Photo</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        $allStd = $re-> allStudent();
                        while($row = mysqli_fetch_assoc($allStd)){ 
                        ?>
                       <tr>
                           <td><?= $row['name'] ?></td>
                           <td><?= $row['email'] ?></td>
                           <td><?= $row['phone'] ?></td>
                           <td><img style="width: 100px;" src = "<?= $row['photo']?>"
                           class =" img-flued" alt = "">
                        </td>


                           <td><?= $row['address'] ?></td>
                           <td>
                            <a href = "edit.php?id=<?=base64_encode($row['id'])?>" class = "btn btn-info btn-sm btn-warning">Edit</a>
                            <a href ="?delStd=<?=base64_encode($row['id'])?>" onclick="return confirm ('Are you sure to delete')" class = "btn btn-danger ">Delete</a>
                           </td>
                          </tr> 
                          <?php } ?>

                    </table>
               </div>
                

            </div>
        </div>
    </div>
   </div>


   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>
</html>

