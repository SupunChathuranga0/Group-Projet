<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vita pharma pvt ltd </title>
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
        <!--Headder Navigation-->
        <nav class="navbar navbar-expand-sm navbar-light fixed-top ">
            <a href="#" class="navbar-brand"><img src="photos/fullylogopng.png" alt=""width="230px"></a>
            <button class="navbar-toggler"data-toggle="collapse"data-target="#navlink"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-center" id="navlink">
                <ul class="navbar-nav">
                    <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About US</a></li>
                    <li class="nav-item active"><a href="" class="nav-link">Product</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact  US</a></li>
                </ul>
            </div>
        </nav>
        <br>
        <br>
        <br>


        <!--Cover-->
        <div class="container-fluid" data-aos="fade-down"
        data-aos-duration="1500">
            <img src="photos/Product/productBanner.jpg" alt="" style="width: 100%; height: 350px;">
        </div>



        <!--Description-->
        <div class="container" data-aos="fade-up"
        data-aos-duration="1500" style="margin-top: 30px;">
            <h3 class="text-center display-4">Our Products</h3>
            <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint aliquam facere itaque dignissimos adipisci dolores consectetur provident! Illum nam laborum in error aperiam sit dignissimos, deserunt modi aspernatur tempore eligendi, dicta autem numquam similique debitis beatae inventore ab illo nihil voluptatibus. Officiis hic et voluptas accusantium possimus eligendi cum! Necessitatibus?</p>
        </div>



        <!--Product Line-->

        
        <?php include 'config.php';?>

<?php
$select_product= mysqli_query($conn,"select * from products");
if(mysqli_num_rows($select_product)>0){
    ?>
<div class="container" id = "box">
<div class="row mt-4">
<?php while($fetch_product=mysqli_fetch_assoc($select_product)){?>
                        <div class="col-md-4 card">
                            <div class="card-header" >
                                <span><br></span>
                            </div>
                            <div class="card-body">
                                <img src="photos/carousel/productLine.jpg" class="card-img-top w-100" alt="">
                                <h2 class="card-title"><?php echo $fetch_product['name']?></h2>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $fetch_product['shortdescription']?></p><br>
                                    <p class="card-text " style="display: none;"><?php echo $fetch_product['longdescription']?></p>
                                </div>
                                <a href="#" class="card-link" data-toggle="modal" data-target="#modalId">More</a>
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
    <!--Footer-->
<footer>
    <div class="container-fluid padding ">
        <div class="row text-center padding">
            <div class="col-sm-6 col-md-4" style="padding-left: 90px;">
                <div class="widget dark">
                    <img src="photos/fullylogopng.png" alt="" style="width: 300px; height:100px; padding-bottom: 20px;">
                    <p class="ft">We are a science-led healthcare company with a special purpose: to help people do more, feel better, live longer.</p>
                    <a href="about.html" class="btn btn-secondary btn-transparent btn-theme-colored btn-sm">Read More</a>
                    <br>
                    <br>
                    
                </div>
            </div>
            <div class="col-md-3" style="text-align: justify; margin-left: 100px;" >
                <hr class="light">
                <h3 class="fw-bold text-black mb-4">Get In Touch</h3>
                <p><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>037-2245896</p>
                <p><i class="bi bi-envelope-at-fill"style="margin-right: 10px;"></i>vitapharma@gmail.com</p>
                <p><i class="bi bi-geo-alt-fill"style="margin-right: 10px;"></i>No3,Ranayawatta,Kandy road,</p>
                <p>Kurunegala</p>
            </div>
            <div class="col-md-3 text-center">
                <hr class="light">
                <h3 class="fw-bold text-black mb-4">About Us</h3>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Product</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>

            </div>
            <div class="col-12 bg-light">
                <br>
                <h5 style="text-decoration-color: azure;">Vita Pharma Pvt (ltd)  2023.All Right Reserved</h5>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->


<!--Arrow-->
<a href="#" class="arrow"><i><img src="photos/up-arrow.png" width="50px"></i></a>


<!--Animation Link-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
<!--end-->
    
</body>
</html>