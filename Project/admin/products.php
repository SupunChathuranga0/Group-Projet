<?php

@include 'config.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>
    <!-- bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap links -->

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>
   
<?php
   
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.stytle.display = `none`;"></i> </div>';

      };
   };
   
   ?>
   <?php include 'header.php'; ?>

<?php
$select_product= mysqli_query($conn,"select * from products");
if(mysqli_num_rows($select_product)>0){
    ?>
<div class="container" id ="box">
<div class="row mt-4 ">
<?php while($fetch_product=mysqli_fetch_assoc($select_product)){?>
                    <div class="col-md-4 card">
                            <div class="card-header" >
                                <span><br></span>
                            </div>
                            <div class="card-body">
                            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>"alt="" style ="max-width:100% ">
                                <h2 class="card-title"><?php echo $fetch_product['name']?></h2>
                                <div class="card-body">
                                    <p class="card-text "><?php echo $fetch_product['shortdescription']?></p><br>
                                    <p class="card-text"><?php echo $fetch_product['longdescription']?></p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted"><?php echo $fetch_product['type']?></p>
                            </div>
                        </div>
                    <?php }?>
             
                </div>
    </div>
</div>

    <?php
}
?>

<br>
<br>
<br>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>