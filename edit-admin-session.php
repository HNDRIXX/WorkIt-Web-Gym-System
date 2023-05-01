<?php
require 'connection.php';

$SessionID = $_GET['SessionID'];    
$TimeIn = $_GET['TimeIn'];  
$TimeOut = $_GET['TimeOut'];
$Category = $_GET['Category']; 
$sessionDay = $_GET['sessionDay']; 

if(isset($_POST['update'])) // when click on Update button
{  
    $TimeIn = $_POST['ssn_TimeIn'];  
    $TimeOut = $_POST['ssn_TimeOut'];
    $Category = $_POST['ssn_Category'];
    $sessionDay = $_POST['ssn_Day']; 
    $edit = "UPDATE session SET ssn_TimeIn ='$TimeIn', ssn_TimeOut='$TimeOut', ssn_Category='$Category', ssn_Day='$sessionDay' WHERE ssn_id = '$SessionID'";

    if (mysqli_query($conn,$edit)){
        echo '<script>alert("Successfully edit a record");window.location.href = "admin-sessions.php?editrecord=1";</script>';
    }
    else{
        echo '<script>alert("Edit record failed");window.location.href = "admin-sessions.php?edit=fail";</script>';
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
        left: 25px;
        width: 190px;
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
        cursor: pointer;
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
        <h2>Update Session Data</h2><hr>
                                    
        <a class="close" href="admin-sessions.php">×</a>
        <form method="POST">
            <div class="content">
                <label>Time In: </label>
                <input type="time" class="form-control input-lg" name="ssn_TimeIn" value="<?php echo $TimeIn;?>" placeholder="Enter Time" Required><br>

                <label>Time Out: </label>
                <input type="time" class="form-control input-lg" name="ssn_TimeOut" value="<?php echo $TimeOut;?>" placeholder="" Required><br>

                <label>Category: </label>
                <input type="text" class="form-control input-lg" name="ssn_Category" value="<?php echo $Category;?>" placeholder="" Required><br>

                <label>Session Days Taken: </label>
                <input type="number" class="form-control input-lg" name="ssn_Day" value="<?php echo $sessionDay;?>" placeholder="" Required><br>

                <input type="submit" class="update"  style="margin-top: 10px;"  name="update" value="Update">
            </div>
        </form>
    </div>
</body>
</html>