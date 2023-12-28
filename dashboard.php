<?php
        session_start();
        if(!isset($_SESSION['userdata'])){
            header("location: ../");
        }

        $userdata = $_SESSION['userdata'];
        $groupsdata= $_SESSION['groupsdata'];
        if($_SESSION ['userdata']['status']==0){
            $status='<b style="color:red">Not Voted</b>';
        }
        else{
        $status= '<b style="color:red">Not Voted</b>';
        }
?>
<html>
<head>
    <!-- <meta charset="UTF-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
    <style>
        #backbutton{
        padding: 10px;
     font-size:15px;
     border-radius: 5px;
     background-color: aqua;
     color:white ;
     float: left;
     margin: 10px;
    }
    #logoutbutton{
        padding: 10px;
    font-size:15px;
    border-radius: 5px;
    background-color: aqua;
    color:white ;
     float: right;
     margin: 10px;
        
    }
    #profile{
        background-color: white;
        width: 40%;
        padding: 20px;
        float:left;
    }
    #group{
        background-color: white;
        width: 40%;
        padding: 20px;
        float:right;

    }
    #votebtn{
        padding: 10px;
    font-size:15px;
    border-radius: 5px;
    background-color: aqua;
    color:white ;
        
    }
    #mainpanel{
        padding: 10px;
    }
    #voted{
        padding: 10px;
    font-size:15px;
    border-radius: 5px;
    background-color: green;
    color:white;

    }
   
    </style>
    <div id="mainSection">
  <center>
    <div id="headerSection">
    <a href="../"> <button id="backbutton"> Back</button></a>
    <a href="logout.php"><button id ="logoutbutton"> Logout</button></a>
    <h1>Online Voting System</h1>
    </div>
</center>

    <hr>
    <div id="mainpannel">
    <div id="Profile">
        <center><img src="../uploads/<?php echo $userdata['photo']?>" height="100" width="100"></center> <br><br>
        <b>Name:</b> <?php echo $userdata['name']?><br><br>
        <b>Mobile:</b><?php echo $userdata['mobile']?><br><br>
        <b>Address:</b><?php echo $userdata['address']?><br><br>
        <b>Status:</b><?php echo $status?><br><br>
    </div>

    <div id="Group">
        <?php
        if($_SESSION['groupdata']){
           for($i=0;$i<count($groupsdata); $i++){
            ?>
            <div>
                <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?> "height="100" width="100">
              <b> Group Name:</b><?php echo $groupsdata[$i]['name']?></br> <br>
              <b> Votes:</b> <?php echo $groupsdata[$i]['votes']?></br>  <br>
              <form action="../api/vote.php" method="POST">
                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['votes']?>">
                <?php
               if($_SESSION['userdata']['status']==0){
                ?>
                <input type="submit" name="votebtn" value="Vote" id="votebtn">
                <?php
               }
               else{
                ?>
                <button disabled type="button" name="votebtn" value="Vote" id="voted" >Voted</button>
                <?php
               }
              ?>
                
              </form>
            </div>
            <hr>
            <?php
           }
        }
        ?>
    </div>
    </div>
    </div>
    
</body>

</html>
