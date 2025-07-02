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
    ques {
        min-height: 433px;
    }
    </style>

    <title>Welcome to iDiscuss - Coding Forum</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <?php
     $id=$_GET['catid'];
     $sql="SELECT * FROM `categories` WHERE category_id=$id";
     $result=mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_assoc($result)) {
      
      $catname =$row['category_name'];
      $catdesc =$row['category_description'];
     }

      ?>

    <?php
     $showAlert=false;
     $method= $_SERVER['REQUEST_METHOD'];
     if ($method=='POST') {
        // Insert thread into DB
        $th_title=$_POST['title'];
        $th_desc =$_POST['desc'];
        $sno=$_POST['sno'];
        $sql="INSERT INTO `threads` (`thread_title`,`thread_desc`,`thread_cat_id`,  `thread_user_id`,`timestamp`) VALUES ('$th_title','$th_desc','$id','$sno',current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if ($showAlert) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success </strong> Your thread has been added! Please wait for community to respond
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            ';
        }
     }
     ?>

    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron bg-light">
            <h1 class="display-4">Welcome to <?php echo $catname ; ?></h1>
            <p class="lead"><?php echo $catdesc ; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.<br>
                Rules:-
                No plagiarism.

                No discussions of hacking someones system, network, password, etc.

                No Rep begging or abuse of the Rep System.

                No discussions of religion, politics, or firearms.
            </p>
            <a class="btn btn-success btn-lg " href="#" role="button">Learn more</a>
        </div>
    </div>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
echo '
    <div class="container">
        <h1 class="py-2">Start a discussion</h1>

        <form action=" '. $_SERVER["REQUEST_URI"].' " method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thread Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="" class="form-text">Keep your title as crisp and short as possible.</div>
                <input type="hidden" name="sno" value="'.  $_SESSION["sno"]. '">
                <div class="form-floating my-4">
                    <textarea class="form-control" placeholder="Leave a comment here" id="desc" name="desc"
                        style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Elaborate your concern</label>
                </div>


                <button type="submit" class="btn btn-success my-4">Submit</button>
        </form>
    </div>';
}
    else{
        echo '
        <div class="container">
        <h1 class="py-2">Start a discussion</h1><h5>You are not logged in. Please login to start a discussion.</h5></div>';
    }
    ?>
    
    <div class="container" id="ques">
        <div class="container"><h5 class="py-2">Browse Questions</h5></div>

        <?php
     $id=$_GET['catid'];
     $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
     $result=mysqli_query($conn,$sql);
     $noResult=true;
     while ($row=mysqli_fetch_assoc($result)) {
      $noResult=false;
      $id    =$row['thread_id'];
      $title =$row['thread_title'];
      $desc  =$row['thread_desc'];
      $thread_time  =$row['timestamp'];
     
        $thread_user_id=$row['thread_user_id'];
        $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id' ";
        $result2=mysqli_query($conn, $sql2);
        $row2=mysqli_fetch_assoc($result2);

        echo '
        <div class="d-flex my-4">
            <div class="flex-shrink-0 mx-2">
                <img src="img/male-avatar-profile-picture-vector-10211761.jpg" width="64px">
            </div>
            <div class="flex-grow-1 ms-3 my-2">
            <p class="font-weight-bold my-0">Asked by -  ' . $row2['user_email'] . ' at ' . $thread_time . '</p> 
                <h5> <a href="thread.php?threadid=' .$id. '">' .$title. '</a></h5>
                ' .$desc. '
            </div>
        </div>';
        }
        // echo var_dump($noResult);
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid bg-light">
            <div class="container">
            <h1 class="display-4">No threads found</h1>
            <p class="lead">Be the first person to ask a question</p>
            </div>
            </div>';
        }
      ?>






        <?php include 'partials/_footer.php'; ?>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>


</body>

</html>