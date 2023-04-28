<?php include 'config.php';?>
        
        <?php 
if(isset($_SESSION['msg_status'])){
   $msg_status = $_SESSION['msg_status'];
   unset($_SESSION['msg_status']);
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
   $data = '';
   foreach($_POST as $k => $v){
      if(!empty($data)) $data .= " , ";
      $data .= " `{$k}` = '{$v}' ";
   }
   $sql  = "INSERT INTO `messages` set {$data}";
   $save = $conn->query($sql);
   if($save){
      $msg_status = "success";
      foreach($_POST as $k => $v){
         unset($_POST[$k]);
      }
      $_SESSION['msg_status'] = $msg_status;
      header('location:'.$_SERVER['HTTP_REFERER']);
   }else{
      $msg_status = "failed";
      echo "<script>console.log('".$conn->error."')</script>";
      echo "<script>console.log('Query','".$sql."')</script>";
   }
}
?>
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


</head>
<body >
    
    <!--Headder Navigation-->
        <nav class="navbar navbar-expand-sm navbar-light fixed-top ">
            <a href="#" class="navbar-brand"><img src="photos/fullylogopng.png" alt=""width="230px"></a>
            <button class="navbar-toggler"data-toggle="collapse"data-target="#navlink"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-center" id="navlink">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a href="" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About US</a></li>
                    <li class="nav-item"><a href="product.php" class="nav-link">Product</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact  US</a></li>
                </ul>
            </div>
        </nav>
        <br>
        <br>
        <br>

        <!--Carousel-->
        <div class="container">
            <div class="carousel slide" data-ride="carousel" id="controller" style="padding-top: 50px;">
                <ol class="carousel-indicators">
                    <li data-target="#controller" data-slide-to="0"></li>
                    <li data-target="#controller" data-slide-to="1"></li>
                    <li data-target="#controller" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="photos/carousel/tablecaro.png " class="d-block " alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="photos/carousel/tabcarousel.jpg.png" class="d-block "alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="photos/carousel/tabcaro3.jpg" class="d-block " alt="">
                    </div>
                </div>
                <a href="#controller" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#controller" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        
        <!--About Section-->
        <div class="home">
        <div class="container"id="box"    data-aos="fade-up"
        data-aos-duration="1500">
            <div class="jumbotron">
                <h1 class="display-4 text-center" >Engage.Inspire.Thrive </h1><br>
                <p class="lead text-center">With the sole intention of bringing high quality products at a lower price range. The crew behind VitaPharma pvt ltd has been working tirelessly since 2018 to make their vision a success. With humble beginings the company has expanded through out the island at a fast pace making our products available at each and every phrmacy through out the country. </p>
                <br>
                <hr class="my-4">
                <br>
                <a href="about.html" class="btn btn-primary btn-lg" role="button">See more</a>
            </div>
        </div>
        </div>

        <!--Product Line Header-->
        <div class="container" data-aos="fade-up"
        data-aos-duration="1500">
            <div class="row ">
                <div class="col-12">
                    <h1 class=" display-4 text-center">Our Products</h3>
                </div>
            </div>
        <!--productLine-->
        <div class="container" id="box">
            <div class="row">
                <div class="col-md-4 card">
                    <div class="card-header">
                        <span><br></span>
                    </div>
                    <img src="photos/carousel/productLine.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Vita-</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit suscipit omnis inventore vitae sit. Temporibus.</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-muted">Capsules </p>
                </div>
                </div>
                <div class="col-md-4 card">
                    <div class="card-header">
                        <span><br></span>
                    </div>
                    <img src="photos/carousel/productLine.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Calvita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit suscipit omnis inventore vitae sit. Temporibus.</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-muted">Tablets </p>
                </div>
                </div>

                <div class="col-md-4 mr-10 card">
                    <div class="card-header">
                        <span><br></span>
                    </div>
                    <img src="photos/carousel/productLine.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"> Provita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit suscipit omnis inventore vitae sit. Temporibus.</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-muted">Sachets </p>
                </div>
                </div>
            </div>
            <br>
                <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                        <span><br></span>
                    </div>
                    <img src="photos/carousel/productLine.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Beautil</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit suscipit omnis inventore vitae sit. Temporibus.</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-muted">Tablets </p>
                </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span><br></span>
                    </div>
                    <img src="photos/carousel/productLine.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Provita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit suscipit omnis inventore vitae sit. Temporibus.</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-muted">Capsules </p>
                </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span><br></span>
                    </div>
                    <img src="photos/carousel/productLine.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">VitaVit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit suscipit omnis inventore vitae sit. Temporibus.</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-muted">Capsules </p>
                </div>
                </div>
            </div> 
            <hr class="border border-primary border-3 opacity-75">
        </div>
    </div>
        <hr style="width: 500px;">

        <!--Priciples-->
        <div class="container padding" data-aos="fade-up"
        data-aos-duration="1500">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4">Our Principals</h1>
                </div>
                <hr>
                <div class="col-12">
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla consequuntur placeat error cum debitis non unde quibusdam! Provident suscipit cupiditate accusamus non. Est itaque fugiat rem harum blanditiis quidem exercitationem?</p>
                </div>
            </div>
        </div>
        <div class="container padding" data-aos="fade-up"
        data-aos-duration="1500">
            <div class="row">
                <div class="col-12" >
                    <br>
                    <br>
                    <a href="http://www.tactusnutra.com/">
                    <img src="photos/logonew.jpg.png"class="mx-auto d-block img-fluid"style=width:350px; height: 200px; alt="">   
                    </a>
                    <br>
                    <hr style="width: 500px;" id="contact">
                    <br>              
                    <br>
                    <br> 
                </div>
            </div >
        </div >


   
          <!-- contact section -->

  <section class="contact_section layout_padding" data-aos="fade-up"
  data-aos-duration="1500">
    <div class="container" >
      <div class="col-md-6"> 
        <div class="d-flex mb-4 ml-4 ml-md-0">
          <h2 class="custom_heading text-center" >
              <br>
            CONTACT US
          </h2>
        </div>
        <form action="" id="" method="POST">
          <div class="form-group">
            <input type="text" placeholder="Name" class="form-control" id="full_name" name="full_name" required value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : "" ?>">
          </div>
          <div class="form-group">
            <input type="email" placeholder="Email" class="form-control" id="email" name="email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ?>">
          </div>
          <div class="form-group">
            <input type="text" placeholder="Phone Number" class="form-control" id="contact_no" name="contact" required value="<?php echo isset($_POST['contact']) ? $_POST['contact'] : "" ?>">
          </div>
          <div class="form-group">
            <input type="text" placeholder="Subject" class="form-control" id="subject" name="subject" required value="<?php echo isset($_POST['subject']) ? $_POST['subject'] : "" ?>">
          </div>
          <div class="form-group">
            <textarea name="message" placeholder="Message" id="message"  class="form-control message-box" required><?php echo isset($_POST['message']) ? $_POST['message'] : "" ?></textarea>
          </div>
          <div class='text-center'>
                  <?php if(isset($msg_status) && $msg_status =='success'): ?>
                     <span class="text-danger">Message Successfully Sent.</span>
                  <?php elseif(isset($msg_status) && $msg_status =='failed'): ?>
                     <span class="text-danger">Message Sending Failed.</span>
                     <?php endif; ?>
               </div>
          <div class="d-flex justify-content-center mt-4 ">
            <button>
              SEND
            </button>
          </div>
          <br>
        </form>
      </div>
    </div>
  </section>

  <!-- end contact section -->
<!--Footer-->
        <footer>
            <div class="container-fluid padding" style="padding-top: 20px;">
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
                        <h3 class="fw-bold text-black mb-4">Get In Tuch</h3>
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