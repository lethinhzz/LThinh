<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .dropdown:hover .dropdown-menu{
        display: block;
    }
</style>
<body>
    <!-- navbar -->
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a href="index.php" >
          <img src="https://as2.ftcdn.net/v2/jpg/03/22/05/83/1000_F_322058357_REROJoGdxn7YfMgykQOlCP7VqbfCF3XW.jpg" width="50px"></img></a>
          <button type="button"
            class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsup">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navsup">
            <!-- left -->
            <div class="navbar-nav">
                <a href="cart.php" class="nav-link">Cart</a>
                <a href="allproduct.php" class="nav-link">Product</a>
                <a href="amin.php" class="nav-link">Amin</a>
                <!-- nut xo xuong -->
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                    <div class="dropdown-menu">
                        <a href="cat.php?id=1" class="dropdown-item"  where >car toy</a>
                        <a href="cat.php?id=2" class="dropdown-item">teddy</a>
                    </div>
                </div>
            </div>
            <!-- right -->
            <div class="navbar-nav ms-auto">
              <?php
              // session_start();
              if(isset($_COOKIE['cc_username'])):
                ?>
                <a href="" class="nav-item nav-link">Wlecome,<?=$_COOKIE['cc_username']?> </a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
                <?php
                else:
                ?>
                <a href="login.php" class="nav-item nav-link">Login</a>
                <a href="register.php" class="nav-item nav-link">Register</a>
              <?php
              endif;
              ?>
            </div>
          </div>
        </div>
      </nav>
    <div class="container">
    <section class="py-5 text-center container"
        style="background-image: url('img/a.jpg');height: 250px; width:50%;">
        <div class="row py-ly-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light"></h1>
               
            </div>
        </div>
    </section>
    <div class="container my-3">
    <div class="row d-flex justify-content-center align-items-center p-3">
        <div class="col-md-8">
            <form action="search.php" class="search">
                <input type="text" class="form-control" placeholder="Search..." name="search">

                <button class="btn btn-primary btn-rounded-pill my-2" name="btnSearch">Search</button>
            </form>
        </div>
    </div>