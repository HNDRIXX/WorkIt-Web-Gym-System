<?php
require 'connection.php';

$mem_id = $_GET['mem_id'];
$Address = $_GET['mem_Address'];    
$Height = $_GET['mem_Height'];
$Weight = $_GET['mem_Weight'];
$ContactNum = $_GET['mem_ContactNum'];

if(isset($_POST['update'])) // when click on Update button
{
    $mem_Address = $_POST['mem_Address'];
    $mem_Height = $_POST['mem_Height'];
    $mem_Weight = $_POST['mem_Weight'];
    $mem_ContactNum = $_POST['mem_ContactNum'];
    $edit = "UPDATE member SET mem_Address='$mem_Address', mem_Height='$mem_Height', mem_Weight='$mem_Weight' , mem_ContactNum ='$mem_ContactNum' WHERE mem_id = '$mem_id'";

    if (mysqli_query($conn,$edit)){
        echo '<script>alert("Successfully edit a record");window.location.href = "admin-member.php?editrecord=1";</script>';
    }
    else{
        echo '<script>alert("Edit record failed");window.location.href = "admin-member.php?edit=fail";</script>';
    }
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/logo.png">
    <title>ADMIN</title>
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

    .popup {
        margin: 70px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        height: 50vh auto;
        width: 50vw;
        position: relative;
        opacity: 1;
        animation-name: fade;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: .8s;
    }

    @keyframes fade {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .popup h2 {
        color: #333;
        font-size: 1.2rem;
    }

    .popup hr{
        background-color: #000000;
        padding: 0.7px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: none;
    }

    .popup .close {
        position: absolute;
        top: 10px;
        right: 19px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
    }
    
    .popup .content {
        overflow: auto;
    }

    .content label{
        font-size: 0.9em;
        margin-bottom: 23px;
        position: relative;
        left: 35px;
        width: 180px;
        display: inline-block;
        vertical-align: top;
    }

    .content input{
      outline: none;
      padding: 4px;
      width: 15vw;
      max-width: 100%;
      
    }

    .update{
        background-color: #277234;
        color: #fff;
        outline: none;
        border: none;
        width: 300px;
        border-radius: 5px;
        padding: 10px;
        display: block;
        margin: auto;

    }

    .submit-button:hover{
        background-color: #41b654;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }
</style>
<body>

    <div class="popup" style="width:34vw;">
        <h2>Update Member Data</h2><hr>
                                    
        <a class="close" href="admin-member.php">×</a>
        <form method="POST">
            <div class="content">
            
                <label>Address Number</label>
                <input type="text" class="form-control input-lg" name="mem_Address" value="<?php echo $Address;?>" placeholder="Enter Address" Required><br>

                <label>Height</label>
                <input type="number" class="form-control input-lg" name="mem_Height" value="<?php echo $Height;?>" placeholder="Enter Height" Required><br>

                <label>Weight</label>
                <input type="number" class="form-control input-lg" name="mem_Weight" value="<?php echo $Weight;?>" placeholder="Enter Weight" Required><br>

                <label>Contact Number</label>
                <input type="text" class="form-control input-lg" max="number" name="mem_ContactNum" value="<?php echo $ContactNum;?>" placeholder="Enter Contact Number" Required><br>

                <input type="submit" class="update"  style="margin-top: 10px;"  name="update" value="Update">
        </form>
    </div>
</body>
</html>