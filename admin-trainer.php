<?php
require 'connection.php';
require 'login.php';
require 'date.php';

// if (isset($_SESSION['admin'])){
//     echo "<script> location.replace('admin-trainer.php'); </script>";
// 	exit();
// }

// if (isset($_SESSION['member'])){
//     echo "<script> location.replace('index.php'); </script>";
// 	exit();
// }

// if (isset($_SESSION['trainer'])){
//     echo "<script> location.replace('index.php'); </script>";
// 	exit();
// }

if (isset($_POST['submit-button1'])){

    $unique_id = $_POST['unique_id'];
    $trn_id = $_POST['trn_id'];
    $trn_FirstName = $_POST['trn_FirstName'];
    $trn_MiddleName = $_POST['trn_MiddleName'];
    $trn_LastName = $_POST['trn_LastName'];
    $trn_Gender = $_POST['trn_Gender'];
    $trn_ContactNum = $_POST['trn_ContactNum'];
    $trn_Address = $_POST['trn_Address'];
    $trn_Height = $_POST['trn_Height'];
    $trn_Weight = $_POST['trn_Weight'];
    $trn_Birthdate = $_POST['trn_Birthdate'];

    $insert = "INSERT INTO trainer (unique_id,trn_id,trn_FirstName,trn_MiddleName,trn_LastName,trn_Gender,trn_ContactNum,trn_Address,trn_Height,trn_Weight,trn_Birthdate) 
	VALUES ('$unique_id','$trn_id','$trn_FirstName','$trn_MiddleName','$trn_LastName','$trn_Gender','$trn_ContactNum','$trn_Address','$trn_Height','$trn_Weight','$trn_Birthdate')";
    if (mysqli_query($conn, $insert)) {
        echo '<script>alert("Inserted Successfully")</script>';
        header('location: admin-trainer.php');
}
else{
    echo '<script>alert("Insert Error")</script>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/logo.png">
    <title>TRAINERS</title>
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

    .wrapper .main_content .announcement{
        width: 100%;
        /* border:3px solid #2e2e2e; */
        background-color: #ececec;
        height: 91vh;
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


    #announce i{
        vertical-align: middle;
        font-size: 25px;
    }

    .button {
        font-size: 15px;
        padding: 10px;
        color: #fff;
        border-radius: 10px;
        width: 3vw;
        text-align: center;
        background-color: #717070;
        text-decoration: none;
        color: #fffdfd;
        cursor: pointer;
        transition: all 0.3s ease-out;
        position: fixed;
        display: block;
        right: 25px;
        top: 80px;
    }

    .button:hover {
        background: #1b1b1b;
    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
    }

    .overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .popup {
        margin: 70px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        height: 50vh auto;
        width: 30vw;
        position: relative;
        transition: all 0.5s ease-in-out;
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
        margin-bottom: 13px;
        position: relative;
        left: 35px;
        width: 200px;
        display: inline-block;
        vertical-align: top;
    }

    .content input{
      outline: none;
      padding: 4px;
      width: 13.2vw;
      max-width: 100%;
      margin-left: -40px;
    }

    .content select{
        outline: none;
        width: 13.1vw;
        max-width: 100%;
        margin-bottom: 4px;
        margin-left: -44px;
    }

    .submit-button{
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

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    table{
        border-collapse: collapse;
        height: auto;
        width: 100%;
    }
    th {
        background-color: #e9e8e8;
        color:#2e2d2d;
        font-size: 15px;
        font-weight: 500;
        padding: 10px;
    }
    th, td {
                
        text-align:center;
        border:1px solid #dfdfdf;
    }

    td{
        padding: 4px;
        white-space: nowrap;
    }

    tr{
        background-color: #fff;
        font-size: 14px;
    }

    table tr:nth-child(odd) td{
        background-color: #f2f2f2;
    }

    .fa-info-circle{
        font-size: 19px;
        width: -10px
    }
    
    .hover {
        position: relative;
        display: inline-block;
    }

    .hover .hoverdisplay {
        visibility: hidden;
        padding: 15px;
        background-color: #575656;
        color: #fff;
        text-align: justify;
        line-height: 23px;
        border-radius: 0.25em;
        white-space: nowrap;
        font-size: 15px;
        width: 30vw;
        
        /* Position the tooltip */
        position: absolute;
        z-index: 1;
        top: 80%;
        right: 50%;
        transition-property: visibility;
        transition-delay: 0s;
    }

    .hover:hover .hoverdisplay {
        visibility: visible;
        transition-delay: 0.3s;
    }

    .hoverdisplay label{
        margin-right: 5px;
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

        .popup{
            width: 85vw;
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
                <li><a href="admin-home.php"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="admin-users.php"><i class="fas fa-users"></i>USERS</a></li>
                <li><a href="admin-member.php" ><i class="fas fa-users"></i>MEMBERS</a></li>
                <li id="active"><a href="admin-trainer.php" id="active"><i class="fas fa-dumbbell"></i>TRAINERS</a></li>
                <li><a href="admin-sessions.php" ><i class="fas fa-calendar"></i>SESSIONS</a></li>
                <li><a href="admin-plan.php"><i class="fas fa-file"></i>PLANS</a></li>
                <li><a href="admin-announcement.php"><i class="fas fa-bullhorn"></i>ANNOUNCEMENT</a></li>
                <li><a href="admin-settings.php"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php?logout=1"><i class="fas fa-sign-out"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <?php $welcomeName = $_SESSION['username']; ?>
            
            <div class="header"><?php echo $msg,$welcomeName; ?>.</div>  
            
            <div class="announcement">
                <p id="title" style="margin-bottom: 20px;">TRAINERS</p><hr>

                <a class="button" href="#popuptrainer"><i class="fa-solid fa-user-plus"></i></a>

                <div id="popuptrainer" class="overlay">
                    <div class="popup">
                        <h2>Add Trainer</h2><hr>
                        
                        <a class="close" href="#">×</a>
                        <form action="admin-trainer.php" method="POST">
                        <div class="content">

                             <label>Unique ID: </label>
                             <select id="unique_id" name="unique_id">
				        	<option value=""> --- </option>
		    	        		<?php
			    			$sql = "SELECT * FROM gymacc WHERE roles='trainer'";
			    			$result = mysqli_query($conn, $sql);

			    			while($row = mysqli_fetch_assoc($result))
		    				{
			    				echo "<option>".$row['unique_id']."</option>";
			    			}
			        		?>
  			            		</select>
                                        <br>
                            <label>Trainer ID: </label><input type="text" placeholder="Note: Same with unique Id" name="trn_id"><br>

                            <label>First Name: </label><input type="text" placeholder="FirstName"class="text" name="trn_FirstName"><br>

                            <label>Middle Name: </label><input type="text" placeholder="MiddleName" name="trn_MiddleName"><br>

                            <label>Last Name: </label><input type="text" placeholder="LastName" name="trn_LastName"><br>

                            <label>Gender: </label> <select id ="trn_Gender" name="trn_Gender">
					                <option value=" "> </option> 
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                    <option value="PreferNotToSay"> Prefer Not To Say </option>
					                </select><br>

                            <label>Contact#: </label><input type="text" placeholder="ContactNum" name="trn_ContactNum"><br>

                            <label>Address: </label><input type="text" placeholder="Address" name="trn_Address"><br>

                            <label>Height: </label><input type="number" placeholder="Height in inch" name="trn_Height"><br>

                            <label>Weight: </label><input type="number" placeholder="Weight in kg" name="trn_Weight"><br>

                            <label>Birthday: </label><input type="date" placeholder="Birthday" name="trn_Birthdate"><br>

                        </div>

                        
                        <input style="margin-top: 10px;" type="submit" name="submit-button1" value="SUBMIT" class="submit-button">
                    </div>
                    </form>
                </div>

				<?php
                    $query = "SELECT * FROM trainer_vw";
                    $result = mysqli_query($conn, $query);
                        
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table>";
                            echo "<tr>";
                                    echo "<th>Name</th>";
                                    echo "<th>Contact Number</th>";
                                    echo "<th>Details</th>";
                                    echo "<th>Action/s</th>";
                            echo "</tr>";

                            while($row = mysqli_fetch_assoc($result)){
                                
                                echo "<tr>";
                                echo "<td>$row[TrainerFullName]";
                                echo "<td>$row[ContactNum]</td>";   

                                echo "<td><div class='hover'><i class='fa fa-info-circle'></i>
                                <span class='hoverdisplay'>
                                <label>Address:</label> $row[Address]<br>
                                <label>Gender:</label> $row[Gender]<br>
                                <label>Height:</label> $row[Height]<br>
                                <label>Weight:</label> $row[Weight]<br>
                                </div></td>";

                                echo "<td><a href='edit-admin-trainer.php?trn_ContactNum=".$row['ContactNum'].
                                    "&trn_Address=".$row['Address']."&trn_id=".$row['ID']."'> 
                                    <i class='fa fa-pencil'style='font-size:19px; color:#2e2d2d'></i>
                                    </td>";   
                                echo "</tr>";

                            }
                            echo "</table>";
                        } 
                        else {
                            echo "<p id='announce'>No trainer/s listed</i> </p>";
                        }
                        ?>

                        <a href="#popupedittrainer"> </a>

                        <div id="popupedittrainer" class="overlay">
                            <div class="popup" style="width:34vw;">
                                <h2>Update Trainer Data</h2><hr>
                                
                                <a class="close" href="#">×</a>
                                <form action="admin-trainer.php" method="POST">
                                    <div class="content">
                                        <label>Contact Number: </label><input style="margin-left:20px" type="text" placeholder="Number"><br>

                                        <label>Address Number: </label><input style="margin-left:20px" type="text" placeholder="Address"><br>

                                    </div>
                            
                                    <input style="margin-top: 10px;" type="submit" name="submit-button1" value="UPDATE" class="submit-button">
                                </form>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</body>
</html>