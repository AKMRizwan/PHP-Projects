<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
}
$userdata=$_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if ($_SESSION['userdata']['status']==0) {
    $status='<b style="color:red;">Not Voted </b>';
}
else{
     $status='<b style="color:green;">Voted </b>';
}
?>








<html>

<head>
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>

<body>
    <style>
    #backbtn {
        padding: 10px;
        border-radius: 6px;
        background-color: aliceblue;
        float: left;
        text-decoration: none;
        box-shadow: 6px 8px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    #logoutbtn {
        padding: 10px;
        border-radius: 6px;
        background-color: aliceblue;
        float: right;
        box-shadow: 6px 8px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;

    }

    #backbtn a,
    #logoutbtn a {
        text-decoration: none;
        color: black;
        display: block;

    }




    #votebtn {
        padding: 10px;
        border-radius: 6px;
        background-color: aliceblue;
    }

    #voted {
        padding: 10px;
        border-radius: 6px;
        background-color: green;
        color: white;
    }






    #Candidate>div {

        padding: 20px;
        margin-bottom: 30px;
        border-bottom: 1px solid #ccc;
    }

    #Profile {
        width: 250px;
        height: 400px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        border-radius: 12px;
        background-color: #f9fcff;
    }

    #Candidate {
        flex: 1;
        min-height: 400px;

    }



    #Candidate img,
    #Profile img {
        border-radius: 8px;
        object-fit: cover;
    }

    #voted {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {

        #Profile,
        #Candidate {
            float: right;
            width: 90%;
            margin: 10px auto;
        }
    }

    h1 {
        font-family: 'Segoe UI', sans-serif;
        font-size: 28px;
        color: #222;
    }

    .content-wrapper {
        display: flex;
        gap: 30px;
    }
    </style>

    <div id="mainSection">

        <button id="backbtn"><a href="../">Back</a></button>
        <button id="logoutbtn"><a href="logout.php">LogOut</a></button>

        <h1 style="padding: 10px;
    font-family: cursive;">Online Voting System</h1>
        <br>
        <hr><br>
        <div class="content-wrapper">
            <div id="Profile">
                <img src="../uploads/<?php echo $userdata['photo']?>" height="100px" width="100px"><br><br><br>
                <b>Voter Name: </b> <?php echo $userdata['name']?><br><br>
                <b>Mobile: </b><?php echo $userdata['mobile']?><br><br>
                <b>Address: </b><?php echo $userdata['address']?><br><br>
                <b>Status: </b><?php echo $status?><br><br>
            </div>

            <div id="Candidate">
                <?php
        if ($_SESSION['groupsdata']) {
            for ($i=0; $i <count($groupsdata) ; $i++) { 
                ?>
                <div
                    style="width: auto; overflow: hidden; margin-bottom: 20px; background-color: #f9fcff; padding: 15px; border-radius: 10px; border-bottom: 1px solid #ccc; margin-right:18px;">

                    <!-- Left side: info -->
                    <div style="float: left; width: auto; margin-left:12px;">
                        <b>Candidate Name: </b><?php echo $groupsdata[$i]['name']?><br><br>
                        <b>Votes: </b><?php echo $groupsdata[$i]['votes']?><br><br>

                        <form action="../api/vote.php" method="post">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">

                            <?php if ($_SESSION['userdata']['status'] == 0): ?>
                            <input type="submit" name="votebtn" value="Vote" id="votebtn">
                            <?php else: ?>
                            <button disabled type="button" id="voted"><b>Voted</b></button>
                            <?php endif; ?>
                        </form>
                    </div>

                    <!-- Right side: image -->
                    <div style="float: right; width: 24%; border-radius: 8px;">
                        <img src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="auto"
                            style="border-radius: 8px;">
                    </div>

                    <div style="clear: both;"></div>
                </div>

                <?php
                }
                }
                else{

                }
                ?>

            </div>

        </div>

</body>

</html>