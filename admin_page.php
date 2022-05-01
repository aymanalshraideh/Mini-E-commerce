<?php
@include 'config.php';
if(isset($_POST['add_product'])){
    
$product_name=$_POST['product_name'];
$product_price=$_POST['product_price'];
$product_image=$_FILES['product_image']['name'];
$product_image_tmp_name=$_FILES['product_image']['tmp_name'];
$product_image_folder='uploded_img/'.$product_image;
if(empty($product_name)||empty($product_price)||empty($product_image)){
  $message[]='Please Fill out All';
}else{
  $insert="INSERT INTO products(name,price,image) VALUES('$product_name','$product_price','$product_image') ";
  $upload=mysqli_query($conn,$insert);
  if($upload){
    move_uploaded_file($product_image_tmp_name,$product_image_folder);
    $message[]='new product addes successfully';
  }else{
    $message[]='Could not add the product';
  }
}
};
if(isset($_GET['delete'])){
  $id=$_GET['delete'];
  mysqli_query($conn,"DELETE FROM products WHERE id = $id");
  header('location:admin_page.php');
};

?>
<!Doctype html>
<html lang="en">
  <head>
    <title>Admin Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="image/style.css">  
</head>
  <body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a id="logo1" class="navbar-brand" href="#">Ayman</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="admin_page.php">Admin</a>
          </li>
          <li class="nav-item">
            
          </li>
        </ul>
      </div>
    </nav>

    <?php
    if(isset($message)){
      foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
      }
    }
    ?>
  
    <div class="container">
        <div class="admin-product-form-container">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <h3>Add new Product</h3>
        <input type="text" placeholder="Enter Product Name" name="product_name" class="box">
        <input type="number" placeholder="Enter Product price" name="product_price" class="box">
        <input type="file" accept="image/png , image/jpeg , image/jpg"  name="product_image" class="box">
        <input type="submit" class="btn btn-success" name="add_product" value="Add">
        
        </form>
        </div>
        <?php
        $select = mysqli_query($conn, "SELECT * FROM products");
   
        ?>
        <div class="product-display">
           <table class="product-display-table">
              <thead>
              <tr>
                 <th>product image</th>
                 <th>product name</th>
                 <th>product price</th>
                 <th>action</th>
              </tr>
              </thead>
              <?php while($row = mysqli_fetch_assoc($select)){ ?>
              <tr>
                 <td><img src="uploded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                 <td><?php echo $row['name']; ?></td>
                 <td><?php echo $row['price']; ?>/JD</td>
                 <td>
                    <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                    <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
                 </td>
              </tr>
           <?php } ?>
           </table>
         
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>