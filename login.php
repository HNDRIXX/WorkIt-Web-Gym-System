<?php
session_start();
require 'connection.php';
$errors = array();
$username = "";
if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
	if (empty($username)) {
        $errors['username'] = "<p id='errorUsername'><i class='fas fa-exclamation-circle'></i> Username Required</p>";
    }//end if
    if (empty($password)) {
        $errors['password'] = "<p id='errorPassword'><i class='fas fa-exclamation-circle'></i> Password Required</p>";
    }//end if
	if(count($errors) === 0) {
		$query = "SELECT * FROM gymacc WHERE username ='$username' AND password = '$password'";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) == 1){
			while ($row = mysqli_fetch_assoc($result)){
				if ($row["roles"] == "admin"){
					$_SESSION['admin'] = $row["unique_id"];
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $row['password'];
					$_SESSION["roles"] = $row["roles"];
					echo "<script> location.replace('admin-home.php'); </script>";
					exit();
				}elseif ($row["roles"] == "trainer"){
					$_SESSION['trainer'] = $row["unique_id"];
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $row['password'];
					$_SESSION["roles"] = $row["roles"];

					$trainer = $_SESSION['trainer'];
					$query = "SELECT * FROM trainer_vw WHERE ID = '$trainer';";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$_SESSION['full_name'] = $row["TrainerFullName"];
					$_SESSION['ContactNum'] = $row["ContactNum"];
					$_SESSION['Age'] = $row["Age"];
					$_SESSION['Gender'] = $row["Gender"];
					echo "<script> location.replace('trnr-home.php'); </script>";
					exit();
				}elseif ($row["roles"] == "member"){
					$_SESSION['member'] = $row["unique_id"];
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $row['password'];
					$_SESSION["roles"] = $row["roles"];

					$member = $_SESSION['member'];
					$query = "SELECT * FROM member_vw WHERE ID = '$member';";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$_SESSION['full_name'] = $row["MemberFullName"];
					$_SESSION['ContactNum'] = $row["ContactNum"];
					$_SESSION['Age'] = $row["Age"];
					$_SESSION['Gender'] = $row["Gender"];
					echo "<script> location.replace('mem-home.php'); </script>";
					exit();
				}
			}
		}else {
			$errors['login_fail'] = "<p id='errorCredentials'>
			<i class='fas fa-exclamation-circle'></i> Wrong Credentials</p>";}
	}
}

?>