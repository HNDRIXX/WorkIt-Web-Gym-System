<?php

require 'connection.php';

$trn_id = $_GET['trn_id']; // get student through query string
$trn_ContactNum = $_GET['trn_ContactNum'];
$trn_Address = $_GET['trn_Address'];  

if(isset($_POST['update'])) // when click on Update button
{
    $trn_ContactNum = $_POST['trn_ContactNum'];
    $trn_Address = $_POST['trn_Address'];
    $edit = "UPDATE trainer SET trn_ContactNum ='$trn_ContactNum', trn_Address='$trn_Address' WHERE trn_Id = '$trn_id'";

    if (mysqli_query($conn,$edit)){
        echo '<script>alert("Successfully edit a record");window.location.href = "admin-trainer.php?editrecord=1";</script>';
    }
    else{
        echo '<script>alert("Edit record failed");window.location.href = "admin-trainer.php?edit=fail";</script>';
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
    <div class="popup" style="width:34vw;">
        <h2>Update Trainer Data</h2><hr>
                                    
        <a class="close" href="admin-trainer.php">×</a>
            <form method="POST">
                <div class="content">
                    <label>Contact Number</label>
                    <input type="text" class="form-control input-lg" name="trn_ContactNum" value="<?php echo $trn_ContactNum;?>" placeholder="Enter Contact Number" Required><br>
                
                    <label>Address Number</label>
                    <input type="text" class="form-control input-lg" name="trn_Address" value="<?php echo $trn_Address;?>" placeholder="Enter Address" Required><br>

                    <input type="submit" class="update"  style="margin-top: 10px;"  name="update" value="Update">
                </div>
            </form>
    </div>
</body>
</html>