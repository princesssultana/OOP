<?php 

include_once 'classes/Register.php';

$re = new Register();

if($_SERVER['REQUEST_METHOD']=='POST'){
 $register = $re-> addRegister($_POST,$_FILES);

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
        <div class="col-md-7">
            <div class="card shadow">
              <?php 
              if(isset($register)){ 
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?= $register ?></strong> You should check in on some of those fields below.
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
                            <h3>All Students</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="index.php" class="btn btn-info float-right">Show Student Info</a>
                        </div>
                    
                    
                </div>
                <div class="card-body">
                    <form method ="POST" 
                    enctype ="multipart/form-data">
                        <label for ="">Name</label>
                        <input type="text" name="name" placeholder="Enter Your Name" class="form-control">
                        <label for ="">Email</label>
                        <input type="email" name="email" placeholder="Enter Your Email" class="form-control">
                        <label for ="">Phone</label>
                        <input type="number" name="phone" placeholder="Enter Your Phone" class="form-control">
                          <label for ="">Photo</label>
                        <input type="file" name="photo"  class="form-control">
                        <label for ="">Address</label>
                       <textarea name="address" class="form-control" placeholder="Enter Your Address"></textarea>
                        <br>
                        <input type="submit" value="Register" class="btn btn-success form-control">
                    </form>
                </div>
                

            </div>
        </div>
    </div>
   </div>


   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>
</html>

