<?php
require 'connection.php';

$unique_id = $_GET['unique_id'];
$username = $_GET['username'];
$password = $_GET['password'];
$roles = $_GET['roles'];  

if(isset($_POST['update'])) // when click on Update button
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roles = $_POST['roles'];  
    $edit = "UPDATE gymacc SET username ='$username', password='$password', roles='$roles' WHERE unique_id = '$unique_id'";

    if (mysqli_query($conn,$edit)){
        echo '<script>alert("Successfully edit a record");window.location.href = "admin-users.php?editrecord=1";</script>';
    }
    else{
        echo '<script>alert("Edit record failed");window.location.href = "admin-users.php?edit=fail";</script>';
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
                                    
        <a class="close" href="admin-users.php">×</a>
        <form method="POST">
            <div class="content">
                <label>Username</label>
                <input type="text" class="form-control input-lg" name="username" value="<?php echo $username;?>" placeholder="Enter Username" Required><br>

                <label>Password</label>
                <input type="text" class="form-control input-lg" name="password" value="<?php echo $password;?>" placeholder="Enter Passwor" Required><br>

                <label>Role: </label> <select id ="roles" name="roles">
                                    <option value=""> <?php echo $roles;?></option>
                                    <option value="member"> member </option>
                                    <option value="trainer"> trainer </option>
                                    <option value="admin"> admin </option>
					                </select><br>

                <input type="submit" class="update"  style="margin-top: 10px;"  name="update" value="Update">
            </div>
        </form>
    </div>
</body>
</html>