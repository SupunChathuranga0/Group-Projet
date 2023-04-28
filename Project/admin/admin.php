<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_shortdescription = $_POST['p_shortdescription'];
   $p_longdescription = $_POST['p_longdescription'];
   $p_type = $_POST['p_type'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO products(name, shortdescription,longdescription,type, image) VALUES('$p_name', '$p_shortdescription', '$p_longdescription', '$p_type', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_shortdescription = $_POST['update_p_shortdescription'];
   $update_p_longdescription = $_POST['update_p_longdescription'];
   $update_p_type = $_POST['update_p_type'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', shortdescription = '$update_p_shortdescription', longdescription ='$update_p_longdescription',type ='$update_p_type', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'product updated succesfully';
      header('location:admin.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:admin.php');
   }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

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

   <div class="container">
      <section>
         <form action="" method="post" class="add-product-form" enctype="multipart/form-data" >
         <h3>Add a new product</h3>
         <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
         <input type="text" name="p_shortdescription" placeholder="enter the Short Description" class="box" required>
         <input type="text" name="p_longdescription" placeholder="enter the long Description" class="box" required>
         <input type="text" name="p_type" placeholder="enter the Product Type" class="box" required>
         <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg"class="box" required>
         <input type="submit" value="add the product" name="add_product" class="btn">

      </form>
      </section>

      <section class="display-product-table">
         <table style="table-layout: fixed;">
            <thead>
               <th>Product Image</th>
               <th>Product Name</th>
               <th>Product Short Description</th>
               <th>Long Description</th>
               <th>Type</th>
               <th>action</th>
            </thead>

            <tbody>
               <?php

                  $select_product = mysqli_query($conn, "SELECT * FROM `products`");
                  if(mysqli_num_rows($select_product) > 0){
                     while($row = mysqli_fetch_assoc($select_product)){
               ?>

               <tr>
                  <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                  <td><?php echo $row['name']; ?></td>
                  <td ><?php echo $row['shortdescription']; ?></td>
                  <td ><?php echo $row['longdescription']; ?></td>
                  <td ><?php echo $row['type']; ?></td>
                  <td>
                     <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"><i class="fas fa-trash"></i> delete</a>
                     <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"><i class="fas fa-edit"></i> update </a>
                  </td>
               </tr>

               <?php
                     };
                  }else{
                     echo "<span> no product added</span>";
                  }

               ?>
            </tbody>

         </table>
      </section>

      <section class="edit-form-container">

<?php

if(isset($_GET['edit'])){
   $edit_id = $_GET['edit'];
   $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
   if(mysqli_num_rows($edit_query) > 0){
      while($fetch_edit = mysqli_fetch_assoc($edit_query)){
?>

<form action="" method="post" enctype="multipart/form-data">
   <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
   <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
   <input type="text" class="box" placeholder="enter the product name" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
   <input type="text" class="box" placeholder="enter the Short description" required name="update_p_shortdescription" value="<?php echo $fetch_edit['shortdescription']; ?>">
   <input type="text" class="box" placeholder="enter the Long Description" required name="update_p_longdescription" value="<?php echo $fetch_edit['longdescription']; ?>">
   <input type="text" class="box" placeholder="enter the type"required name="update_p_type" value="<?php echo $fetch_edit['type']; ?>">
   <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
   <input type="submit" value="update the prodcut" name="update_product" class="btn">
   <input type="reset" value="cancel" id="close-edit" class="option-btn">
</form>

<?php
         };
      };
      echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
   };
?>

</section>

   </div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>