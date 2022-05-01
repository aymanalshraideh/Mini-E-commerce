<?php


$conn=mysqli_connect('localhost','root','','cart-db');


?>
<?php

$select = mysqli_query($conn, "SELECT * FROM products");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HOME</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        #logo{
            display: flex;
            justify-content: center;     
        }
      .fakeimg {
        height: 200px;
        background: #aaa;
      }
    </style>
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
     <div class="container" style="margin-top: 30px">
      <div class="row">
        <div id="logo" class="col-sm-12">
          <img src="image/logo.png" id="logo" alt=""  width="300px" height="300px"/>
          
        </div>
      </div>
    </div>
    <div class="container" style="margin-top: 30px">
      <div class="row">
     
      <?php while($row = mysqli_fetch_assoc($select)): ?>
               <div class="col-sm-3">
                  
              <div class="card">
                  <img src="uploded_img/<?php echo $row['image']; ?>"   class="fakeimg" alt="Fissure in Sandstone"/>
                  <div class="card-body">
                      <h5 ><?php echo $row['name']; ?></h5>
                      <p >$<?php echo $row['price']; ?></p>
                      <p ></p>
                      
                      <a href="#!" class="btn btn-primary">Show Product</a>
                  </div>
              </div></div>
     <?php   endwhile?>
      </div></div>
  
   
    
    <div class="jumbotron text-center" style="margin-bottom: 0">
    <footer >
        

            
                <ul >
                    <li> <a class="ri" href="https://web.facebook.com/AYMaN.xDe96" target="_blank"> <img
                                src="image/facebook.png" width="50px" alt=""> </a>
                    </li>
                    <li> <a class="ri" href="https://github.com/aymanalshraideh" target="_blank"> <img
                                src="image/github.png" width="50px" alt="">
                        </a></li>
                    <li> <a class="ri" href="https://www.linkedin.com/in/ayman-al-shraideh" target="_blank"> <img
                                src="image/linkedin.png" width="50px" alt=""> </a></li>
                  
                </ul>
            

<h4>Copyright AymanAlshradieh © 2022 </h4>


        
    </footer>
    </div>
  </body>
</html>
