<?php
require_once 'logout.php';
require 'login.php';
require 'connection.php';
require 'date.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/logo.png">
    <title>SCHEDULE</title>
</head>
<script src="https://kit.fontawesome.com/4c890c6a79.js" crossorigin="anonymous"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@520&display=swap');

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }

    body{
        background-color: #f3f5f9;
        font-family: 'Montserrat', sans-serif;
    }

    .wrapper{
        display: flex;
        position: relative;
    }

    .wrapper .sidebar{
        width: 210px;
        height: 100%;
        background:#383838;
        padding: 30px 0px;
        position: fixed;
        transition: ease all .3s;
    }

    .wrapper .sidebar ul li{
        padding: 15px;
        border-bottom: 1px solid #bdb8d7;
        border-bottom: 1px solid #0000000d;
        border-top: 1px solid #ffffff0d;
    }    

    .wrapper .sidebar ul li a{
        color:#afaeae;
        display: block;
    }

    .wrapper .sidebar ul li a .fas{
        width: 25px;
    }

    .wrapper .sidebar ul li:hover a{
        transition: ease all .3s;
	    color:#fff;
    }

    #active{
        background: #fff;
        color:#000000;
        border-radius: 0px;
        /* transform: scale(1.0); */
    }

    .wrapper .main_content{
        width: 100%;
        margin-left: 210px;
    }

    .wrapper .main_content .header{
        width: 100%;
        display:flex;
        position: relative;
        padding: 20px;
        justify-content:space-between;
        align-items:center;

        background-color: #575656;
        color: #fff;
    }

    .wrapper .main_content .header img{
        width: 2.2%;
        overflow: hidden;
    }
    
    .wrapper .main_content .announcement{
        width: 100%;
        /* border:3px solid #2e2e2e; */
        background-color: #ececec;
        height: 90vh;
        padding: 10px;
        overflow: hidden;
    }
    
    .announcement #title{
        margin-top: 1px;
        letter-spacing: -1px;
        padding: 15px;
        font-size: 1.3rem;
        font-weight: 500;
        color: #3e3c3c;
    }

    hr {
        width: 100%;
        margin: auto;
        border: none;
        padding: 0.5px;
        background-color: #ccc7c7;
        margin-top: -1em;
        margin-bottom: 1em;
    }

    #announce{
        background-color: #f3f2f2;
        color: #000000;
        border-radius: 5px;
        padding: 10px;
        font-size: 14px;
        text-align: center;
    }

    #announce i{
        vertical-align: middle;
        font-size: 25px;
    }

    .account-content{
        height: 72vh;
        color: #000000;
        padding: 20px;
        border-radius: 5px;
    }

    .account-content hr {
        margin: 15px auto;
    }

    .changebutton{
        color: #000000;
        float: right;
        border: none;
        font-size: 12px;
        cursor: pointer;
        text-transform: uppercase;
        text-decoration: none;
        background: transparent;
        margin: -20px;
        margin-right: 16px;
    }

    #pass-submit, #cancel{
        border-radius: 5px;
        padding: 5px;
        margin-top: 7px;
        width: 120px;
        font-size: 12px;
        font-family: 'Montserrat';
        background-color: #383838;
        color: #fff;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .account-content form{
        margin-left: 30px;
        margin-top: 10px;
    }
    .account-content form input{
        width: 245px;
    }


    @media screen and (max-width: 900px){
        .logo{
            display: none;
        }

        .wrapper .sidebar{
            width: 50px;
            height: 100%;
            background:#383838;
            padding: 30px 0px;
            position: fixed;
            
            transition: ease all .3s;
        }

        .wrapper .sidebar ul i{
            display: initial;
        }

        .wrapper .sidebar ul li a{
            overflow: hidden;
        }

        .wrapper .sidebar ul i{
            margin-right: 100px;
        }

        .wrapper .main_content{
            width: 100%;
            margin-left: 50px;
            margin-right: 10px;
        }
    }
</style>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <img src="image/logo1.png" style="width: 100%; margin-bottom: 20px;" draggable="false">
            </div>
            
            <ul>
                <li><a href="trnr-home.php"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="trnr-sessions.php" ><i class="fas fa-calendar"></i>SESSIONS</a></li>
                <li><a href="trnr-profile.php"><i class="fas fa-user"></i>PROFILE</a></li>
                <li id="active"><a href="trnr-settings.php" id="active"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php"><i class="fas fa-sign-out"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <?php $welcomeName = $_SESSION['full_name']; ?>
            
            <div class="header"><?php echo $msg,$welcomeName; ?>. <img   src="image/header.png" alt=""></div>  
            
                <div class="announcement">
                    <p id="title" style="margin-bottom: 20px;">SETTINGS</p>

                    <div class="account-content">
                        <div>
                            <p>Name: <span style="margin-left:70px"><?php echo $_SESSION['full_name'];?></span></p><hr>
                            <p>Username: <span style="margin-left:35px"><?php echo $_SESSION['username'];?></span></p><hr>
        
                            <p>Password</p>
                            <a href="trnr-settings.php?changepass=1" class="changebutton" name="changepass">Change</a>
                            <?php  
                                if (isset($_GET['changepass'])){
                                    echo "<form method='POST'>";
                                    echo "<p style='padding-top: 5px;'>Current Password: </p><input type='password' name='curPass'></input><br>";
                                    echo "<p>New Password: </p><input type='password' name='newPass1'></input><br>";
                                    echo "<p>Retype Password: </p><input type='password' name='newPass2'></input>";
        
                                    if(isset($_POST['pass-submit'])){
                                        if($_POST['curPass']==$_SESSION['password']){
                                            if($_POST['newPass1']==$_POST['newPass2']){
                                                $password = $_POST['newPass1'];
                                                if($password != ""){
                                                    $username = $_SESSION['username'];
                                                    $role = $_SESSION['role'];
                                                    $sql = "UPDATE gymacc SET password='$password' WHERE username='$username'";
        
                                                    if($_POST['curPass']==$password)
                                                    {
                                                        echo "<p id='pass-error'><i class='fas fa-exclamation-circle'></i>Old Password can not be used</p>";
                                                    }
                                                    else if(mysqli_query($conn, $sql)){	
                                                        if(mysqli_query($conn, $sql)){
                                                        echo "<script>alert('Password Changed Successfully, Logging you out');window.location.href = 'admin-settings.php?logout=1';</script>";
                                                        }
                                                    }else{
                                                        echo "Error updating record: " . mysqli_error($conn);
                                                    }
                                                }else{
                                                    echo "<p id='pass-error'><i class='fas fa-exclamation-circle'></i> New Password cannot be blank</p>";
                                                }
                                            }else{
                                                echo "<p id='pass-error'><i class='fas fa-exclamation-circle'></i> Password does not match</p>";
                                            }
                                        }else{
                                            echo "<p style= 'margin: 0px;' id='pass-error'><i class='fas fa-exclamation-circle'></i> Wrong Current Password</p>";
                                        }
                                    }
                                    else if(isset($_POST['cancel']))
                                    {
                                        echo "<script> location.replace('trnr-settings.php'); </script>";
                                    }
                                    echo "<br>";
                                    echo "<button id='pass-submit' name='pass-submit'>Save Changes</button>";
                                    echo "<button id='cancel' name='cancel' style='margin-left: 5px; color: #fff; '>Cancel</button>";
                                    echo "</form>";
        
                                    
                                }
                            ?>
                            <hr>

                        </div>
                    </div>
                </div>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>