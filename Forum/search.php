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
        #maincontainer{
            min-height: 100vh;
        }
    </style>
  <title>Welcome to iDiscuss - Coding Forum</title>
</head>

<body>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php include 'partials/_header.php'; ?>
 
       
<!-- Search results -->
<div class="container my-3" id="maincontainer">
    <h1>Search results for <em>"<?php echo $_GET['search'];?>"</em></h1>

         <?php
         $noresult=true;
         $query=$_GET["search"];
     $sql="SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) against ('$query')";
     $result=mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_assoc($result)) {
      
      $title =$row['thread_title'];
      $desc =$row['thread_desc'];
      $thread_user_id =$row['thread_user_id'];
      $thread_id=$row['thread_id'];
      $url="thread.php?threadid=".$thread_id;
      $noresult=false;
    //   Display the result
      echo '
      <div class="result">
        <h3><a href="'.$url.'" class="text-dark">' . $title . '</a></h3>
        <p>'.$desc.'</p>
      </div>'; 
     }
     if ($noresult) {
        echo '
        <div class="jumbotron jumbotron-fluid bg-light">
                        <div class="container">
                        <h1 class="display-4">No results found</h1>
                        <p class="lead">Suggestions:
                        <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                            </ul>
                        </p>
                        </div>
                        </div>';
     }
      ?>

    
    
</div>



      



  <?php include 'partials/_footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>


</body>

</html>