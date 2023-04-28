<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image" href="photos/logopng.png">
    <!-- bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Uchen&display=swap" rel="stylesheet">
    <!-- fonts links -->
    <!-- icons links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- animation links -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- custom style -->
    <link rel="stylesheet" href="style.css">
    <!--Custom JS-->
    <script src="js/main.js"></script>
</head>

<body>

<?php include 'config.php';?>

<?php
$select_product= mysqli_query($conn,"select * from products");
if(mysqli_num_rows($select_product)>0){
    while($fetch_product=mysqli_fetch_assoc($select_product)){?>

<div class="container mt-4 d-flex mb-5 ">

               <div class="row">
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <div class="card-header" >
                                <span><br></span>
                            </div>
                            <div class="card-body">
                                <img src="photos/carousel/productLine.jpg" class="card-img-top w-100" alt="">
                                <h2 class="card-title"><?php echo $fetch_product['name']?></h2>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text"><?php echo $fetch_product['shortdescription']?></p>
                                    <p style="display: none;"><?php echo $fetch_product['longdiscription']?></p>
                                </div>
                                <a href="#" class="card-link" data-toggle="modal" data-target="#modalId">More</a>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Capsules </p>
                            </div>
                        </div>
                    </div>
             </div>
    </div>





   <?php }
}
?>
 


                            <!--Modal Code-->
        
        <div class="modal fade" id="modalId">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content" style="transition: scaleX(1.4);">
                    <div class="modal-header pb-2">
                        <h1 class="font-weight-light ml-4">Description</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-2 p-3">
                            <div class="col-md-6">
                                <img src="" width="100%" height="280px"  class="rounded"/>
                            </div>
                            <div class="col-md-6">
                                <h2 class="product_name"></h2>
                                <p style="box-sizing: border-box;" class="product_desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, ipsa!</p>
                                <br>
                                <h4 class="product_category text-primary "></h4>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
</body>
</html>