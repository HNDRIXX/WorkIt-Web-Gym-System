<?php
require_once 'logout.php';
require 'login.php';
require 'connection.php';
require 'date.php';

$fullName = $_SESSION['full_name'];
$username = $_SESSION['username'];
$ContactNum = $_SESSION['ContactNum'];
$Age = $_SESSION['Age'];
$Gender = $_SESSION['Gender'];
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
        background-color: #e4e4e4;
        color: #000000;
        border-radius: 5px;
        padding: 10px;
        font-size: 14px;
        text-align: center;
    }

    .content{
        background-color: #DDDDDD;
        border-radius: 8px;
        margin-top: 80px;
        width: 100%;
        height: 68vh;
        color: #383838;
    }

    #profilename{
        position: relative;
        top: -28%;
        left: 16%;
        font-size: 24px;
        color: #383838;
    }

    #info{
        text-align: center;
        margin-top: -55px;
        font-size: 18px;
    }

    .content hr{
        width: 90%;
        outline: none;
        margin-top: 2px;
        margin-bottom: 40px;
        padding: 1px;
    }

    .info p, label{
        line-height: 30px;
        margin-left: 40px;
    }

    .content img{
        border: solid #ececec 8px;
        border-radius: 360px;
        position: relative;
        top: -58px;
        left: 1%;
        right: 0;
        width: 150px;
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
                <li><a href="mem-home.php"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="mem-sessions.php" ><i class="fas fa-calendar"></i>SESSIONS</a></li>
                <li id="active"><a href="mem-profile.php" id="active"><i class="fas fa-user"></i>PROFILE</a></li>
                <li><a href="mem-settings.php"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php"><i class="fas fa-sign-out"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <?php $welcomeName = $_SESSION['full_name']; ?>
            
            <div class="header"><?php echo $msg,$welcomeName; ?>.<img src="image/header.png" alt=""></div>  
            
            <div class="announcement">
                <p id="title" style="margin-bottom: 20px;">PROFILE</p><hr>
                
                <div class="content">
                    <img draggable="false" src="image/profile.png" alt="">
                    <p id="profilename"><?php echo $fullName; ?></p>

                    <p id="info">INFORMATION</p><br><hr>

                    <div class="info">
                        <p><label style="margin-right: 2rem;">Member Name: </label><?php echo $fullName; ?></p>

                        <p><label style="margin-right: 4.5rem;">Username: </label><?php echo $username; ?></p>

                        <p><label style="margin-right: 4rem;">Contact No: </label><?php echo $ContactNum; ?></p>
                        
                        <p><label style="margin-right: 7.7rem;">Age: </label><?php echo $Age; ?></p>

                        <p><label style="margin-right: 5.9rem;">Gender: </label><?php echo $Gender; ?></p>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>