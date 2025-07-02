<!doctype html>
<html lang="en" dir="ltr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-MdqCcafa5BLgxBDJ3d/4D292geNL64JyRtSGjEszRUQX9rhL1QkcnId+OT7Yw+D+" crossorigin="anonymous">
    
    <style>
    body {
        padding-bottom: 70px; /* Equal to or more than footer height */
    }
</style>


  <title>Welcome to iDiscuss - Coding Forum</title>
</head>

<body>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php include 'partials/_header.php'; ?>
 <!-- Slider starts here  -->
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://picsum.photos/800/200" class="d-block w-100" alt="Random Image">
    </div>
    <div class="carousel-item">
      <img src="https://picsum.photos/800/200" class="d-block w-100" alt="Random Image">
    </div>
    <div class="carousel-item">
      <img src="https://picsum.photos/800/200" class="d-block w-100" alt="Random Image">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Category container starts here -->
  <div class="container" >
    <h2 class ="text-center">iDiscuss - Browse Category</h2>
    <div class="row">

    <!-- Fetch all the categories &  Using loop to iterate through categories --> 
     <?php
     $sql="SELECT * FROM `categories`";
     $result=mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_assoc($result)) {
      // echo $row['category_id'];
      // echo $row['category_name'];
      $id =$row['category_id'];
      $cat =$row['category_name'];
      $desc =$row['category_description'];
      echo '
      <div class="col-md-4 ">
        <div class="card" style="width: 18rem;">
          <img src="https://picsum.photos/800/600/?'.$cat.'" alt="Random Image">
          <div class="card-body">
            <h5 class="card-title"><a href="threadlist.php?catid=' .$id. '">' .$cat. '</a></h5>
            
            <p class="card-text">'.substr($desc, 0, 30).'...</p>
            <a href="threadlist.php?catid=' .$id. '" class="btn btn-primary">View Threads</a>
          </div>
        </div>
      </div>';
     }
     ?>


      



  <?php include 'partials/_footer.php'; ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>


</body>

</html>