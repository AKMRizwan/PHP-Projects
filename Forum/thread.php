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
            ques{
                min-height: 433px;
            }
        </style>

    <title>Welcome to iDiscuss - Coding Forum</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    
    <?php
     $id=$_GET['threadid'];
     $sql="SELECT * FROM `threads` WHERE thread_id=$id";
     $result=mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_assoc($result)) {
      
      $title =$row['thread_title'];
      $desc =$row['thread_desc'];
      $thread_user_id =$row['thread_user_id'];
    //    Query the users table to find out the original poster
        $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id' ";
        $result2=mysqli_query($conn, $sql2);
        $row2=mysqli_fetch_assoc($result2);
        $posted_by=$row2['user_email'];
     }

      ?>

        <?php
     $showAlert=false;
     $method= $_SERVER['REQUEST_METHOD'];
     if ($method=='POST') {
        // Insert into comment DB
        $comment=$_POST['comment'];
        // $comment=str_replace("<", "&lt;",  $comment);
        // $comment=str_replace(">", "&gt;",  $comment);

        $sno=$_POST['sno'];
        
        $sql="INSERT INTO `comments` (`comment_content`,`thread_id`,  `comment_by`,`comment_time`) VALUES ('$comment','$id','$sno', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if ($showAlert) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success </strong> Your comment has been added!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            ';
        }
     }
     ?>

    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title ; ?></h1>
            <p class="lead"><?php echo $desc ; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.<br>
                Rules:-
                No plagiarism.

                No discussions of hacking someones system, network, password, etc.

                No Rep begging or abuse of the Rep System.

                No discussions of religion, politics, or firearms.
            </p>
           <p>Posted by - <b><?php echo $posted_by; ?><b></p>
        </div>
    </div>

     
     <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
echo '
    <div class="container">
        <h1 class="py-2">Post a comment</h1>
        <form action="' . $_SERVER['REQUEST_URI']. '" method="post">
                <div class="form-floating my-4">
                    <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment"
                        style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Type your comment</label>
                    <input type="hidden" name="sno" value="'.  $_SESSION["sno"]. '">
                </div>
                <button type="submit" class="btn btn-success my-4">Post Comment</button>
        </form>
    </div>';
}
    else{
        echo '
        <div class="container">
        <h1 class="py-2">Post a comment</h1><h5>You are not logged in. Please login to post a comment.</h5></div>';
    }
    ?>


    <div class="container" id="ques">
        <h1>Discussions</h1>

           <?php
     $id=$_GET['threadid'];
     $sql="SELECT * FROM `comments` WHERE thread_id=$id";
     $result=mysqli_query($conn,$sql);
     $noResult=true;
     while ($row=mysqli_fetch_assoc($result)) {
        $noResult=false;
      $id       =$row['comment_id'];
      $content  =$row['comment_content'];
      $comment_time= $row['comment_time'];

      $thread_user_id=$row['comment_by'];
        $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id' ";
        $result2=mysqli_query($conn, $sql2);
        $row2=mysqli_fetch_assoc($result2);
     
        echo '
        <div class="d-flex my-4">
            <div class="flex-shrink-0">
                <img src="img/male-avatar-profile-picture-vector-10211761.jpg" width="64px">
            </div>
            <div class="flex-grow-1 ms-3 mx-2">
              <p class="font-weight-bold my-0">Commented by -  '. $row2['user_email'] .' at ' . $comment_time . '</p>  
                ' .$content. '
            </div>
        </div>';
        }
        
            if ($noResult) {
                        echo '<div class="jumbotron jumbotron-fluid bg-light">
                        <div class="container">
                        <h1 class="display-4">No comments found</h1>
                        <p class="lead">Be the first person to comment</p>
                        </div>
                        </div>';
                    }

      ?>  




    </div>

    <?php include 'partials/_footer.php'; ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>


</body>

</html>