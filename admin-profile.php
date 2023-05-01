<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/logo.png">
    <title>SESSIONS</title>
</head>
<script src="https://kit.fontawesome.com/4c890c6a79.js" crossorigin="anonymous"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@520&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

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
        width: 99.2%;
        
        margin: 5px;
        display:flex;
        position: relative;
        padding: 20px;
        border-radius: 5px;
        justify-content:space-between;
        align-items:center;

        background-color: #575656;
        color: #fff;
    }

    .wrapper .main_content .announcement{
        width: 99.2%;

        border-radius: 5px;
        /* border:3px solid #2e2e2e; */
        background-color: #1b1b1b;
        height: 88.5vh;
        margin: 5px;
        padding: 10px;
    }
    
    .announcement #title{
        border-radius: 5px;
        margin-top: 5px;
        padding: 15px;
        text-align: center;
        letter-spacing: 1px;
        font-size: 1.3rem;
        background-color: #575757;
        color: #fff;
    }

    .button {
        font-size: 12px;
        padding: 10px;
        color: #fff;
        border-radius: 10px;
        background-color: #2e2d2d;
        text-decoration: none;
        color: #fffdfd;
        cursor: pointer;
        transition: all 0.3s ease-out;
        position: relative;
        right: 10px;
        bottom: 103px;
        float: right;
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
        height: 50vh;
        width: 50vw;
        position: relative;
        transition: all 2s ease-in-out;
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

    .popup .content #fillup{
        font-size: 0.9rem;
        margin-bottom: -10px;
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
                <li><a href="admin-home.php"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="admin-member.php" ><i class="fas fa-users"></i>MEMBERS</a></li>
                <li><a href="admin-trainer.php"><i class="fas fa-dumbbell"></i>TRAINERS</a></li>
                <li><a href="admin-sessions.php" ><i class="fas fa-calendar"></i>SESSIONS</a></li>
                <li><a href="admin-plan.php"><i class="fas fa-users"></i>PLANS</a></li>
                <li><a href="admin-settings.php"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php"><i class="fas fa-sign-out"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <div class="header">WELCOME ADMIN</div>  
            
            <div class="announcement">
                <p id="title" style="margin-bottom: 20px;">PROFILE</p>
				
				<table id="table1" style="position: absolute; background-color: #575757;  border-spacing: 10px;  border-radius: 5px; margin: auto; margin-left: -3px; color:white;">
				    <tr>
					    <th>
						    <a href="https://www.w3schools.com">
						    <img src="image/camera.jpg" alt="picture" style="width:176px; height:176px; margin-top:0px;">
					    </th>
					    <td colspan="3">
					        
						    <form action="../cgi-bin/mycgi.pl">
                                <label for="adminname"><p1 style="padding-right: 30px; font-size: 15px;">&nbsp;&nbsp;Name:</p1></label>
								    <input type="text" id="fname" name="fname" maxlength="40" size="35" placeholder="Lastname, Firstname Middle Initial" style="text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px;">
								    <br><br>
							    <label for="adminemail"><p1 style="padding-right: 30px; font-size: 15px;">&nbsp;&nbsp;Email:&nbsp;</p1></label>
								    <input type="email" id="email" name="email" maxlength="40" size="35" placeholder="Googlemail@gmail.com" style="text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px;">
								    <br><br>
                                <label for="admincontactnumber"><p1 style="padding-right: 30px; font-size: 15px;">&nbsp;&nbsp;Contact No:</p1></label>
								    <input type="cell" id="phone" name="phone" placeholder="0911-111-1111" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required style="text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px;">
								    <br><br>
								<label for="adminage"><p1 style="padding-right: 46px; font-size: 15px;">&nbsp;&nbsp;Age:</p1></label>
								    <input type="number" id="age" name="age" min="1" max="122" style="text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px;">
								    <br><br>
								<label for="admingender"><p1 style="padding-right: 21px; font-size: 15px;">&nbsp;&nbsp;Gender:</p1></label>
								    <select id="gender" style="text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px;">
										<option value=""style="text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px;"> </option>
										<option value="male" style="text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px;"> Male</option>
										<option value="female" style="text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px;"> Female</option>
									</select>
								    <br>
						    </form>
					    </td>				
				    </tr>
			    </table>
				
				
				
				<table id="table2" style="color: white; position: absolute; background-color: #575757;  border-spacing: 8px;  border-radius: 5px; top:159px; margin-left: 563px;">
					<tr>
					    <td>
							<form action="../cgi-bin/mycgi.pl">
								<label for="Post"><p1 style="padding-right: 15px; font-size: 15px;">Create a Post</p1></label>
									<select id="category" style="text-align: left; font-family: 'Poppins',sans-serif; border-radius: 5px;">
										<option value=""style="text-align: left; font-family: 'Poppins',sans-serif; border-radius: 5px;"> </option>
										<option value="quote" style="text-align: left; font-family: 'Poppins',sans-serif; border-radius: 5px;">Quote for the Day</option>
										<option value="safety" style="text-align: left; font-family: 'Poppins',sans-serif; border-radius: 5px;">Safety Protocols</option>
										<option value="services" style="text-align: left; font-family: 'Poppins',sans-serif; border-radius: 5px;">Service</option>
										<option value="new" style="text-align: left; font-family: 'Poppins',sans-serif; border-radius: 5px;">Something New</option>
										<option value="occassion" style="text-align: left; font-family: 'Poppins',sans-serif; border-radius: 5px;">Occassion</option>
										<option value="others" style="text-align: left; font-family: 'Poppins',sans-serif; border-radius: 5px;">Others</option>
									</select>
									<input type="date" style="text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px; margin-left:151px;">
									<br><br>
									<textarea 
									id = "w3review"
									rows = "7"
									cols = "82"
									placeholder = "Make an announcement?" 
									style="resize: none; text-align: center; font-family: 'Poppins',sans-serif; border-radius: 5px; padding: 4px;"></textarea>
									<br>
						    </form>
					    </td>				
				    </tr>
				</table>
				
				<table id="table3" style="width:100%; color: white; position: relative; background-color: #575757;  border-spacing: 8px;  border-radius: 5px; top:242px; margin:auto;">
					<tr>
						<th colspan="4" style="font-size:18px;">
							EMPLOYMENT HISTORY
						</th>
					</tr>
				<table>
				<table id="table3" style="width:100%; position:relative; top:247px; margin:auto;">
					<tr>
						<th style="font-size:16px; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							Date<br>Started
						</th>
						<th style="font-size:16px; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							Date<br>Finished
						</th>
						<th style="font-size:16px; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							Place
						</th>
						<th style="font-size:16px; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							Address
						</th>
					</tr>	
					<tr>
						<td style="font-size:14px; text-align:center;border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							January 1, 2022
						</td>
						<td style="font-size:14px; text-align:center; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							January 2, 2022
						</td>
						<td style="font-size:14px; text-align:center; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							Manila City Hall
						</td>
						<td style="font-size:14px; text-align:center; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							145 Onyx St Manila
						</td>
					</tr>
					<tr>
						<td style="font-size:14px; text-align:center;border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							January 3, 2022
						</td>
						<td style="font-size:14px; text-align:center; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							January 4, 2022
						</td>
						<td style="font-size:14px; text-align:center; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							Makati City Hall
						</td>
						<td style="font-size:14px; text-align:center; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							145 Ermita St Manila
						</td>
					</tr>
					<tr>
						<td style="font-size:14px; text-align:center;border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							January 5, 2022
						</td>
						<td style="font-size:14px; text-align:center; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							January 6, 2022
						</td>
						<td style="font-size:14px; text-align:center; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							Malabon City Hall
						</td>
						<td style="font-size:14px; text-align:center; border-spacing: 8px; border-radius: 10px; border-style:solid; border-color:  #1b1b1b; background-color: #575757; color:white; padding:5px;">
							145 Mapagmataas St Manila
						</td>
					</tr>
				</table>
            </div>
        </div>
    </div>
</body>
</html>