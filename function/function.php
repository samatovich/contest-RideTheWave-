<?php
	require_once "config.php";
	
	session_start();
	
	// global variables
	$goto = $_GET["goto"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password_1 = $_POST["password_1"];
	$password_2 = $_POST["password_2"];
	
	if($goto == "product_counter"){
		// variables to insert into user_product_choice table
		$user = $_SESSION["user"];
		$counter = $_POST["counter"];
		$product_name = $_GET["product_name"];
		$button1 = $_POST["form_sub"];
		$button2 = $_POST["to_cancel"];
		
		// check empty of chosen product if not empty than input it
		$sql_check_product = "SELECT * FROM userproductchoice WHERE user_product_choice = '$product_name' AND username='$user'";
		$result_check_product = $conn -> query($sql_check_product);
		$row_check_product = $result_check_product -> fetch_array();
		if($button1 == "form_sub"){
			if($row_check_product["user_product_choice"] == null){
				// insert product to choises
				$sql_insert_product = "INSERT INTO userproductchoice(username, user_product_choice, product_times)
										VALUES('$user', '$product_name', '$counter')";
				$conn -> query($sql_insert_product);
				header("Location: ../UserProfile/?goto=you&success_inserted");
			} else{
				$sql_update_product = "UPDATE userproductchoice SET product_times = '$counter' WHERE username = '$user' AND user_product_choice = '$product_name'";
				$conn -> query($sql_update_product);
				header("Location: ../UserProfile/?goto=you&success_updated");
			}
		} else if($button2 == "to_cancel"){
			$sql_delete_product = "DELETE FROM userproductchoice WHERE username = '$user' AND user_product_choice = '$product_name'";
			$conn -> query($sql_delete_product);
			header("Location: ../UserProfile/?goto=you&success_deleted");
		}
	}
	
	if($goto == "signin"){
		// get username's password from database
		$sql_password_control = "SELECT password FROM userinfo WHERE username = '$username'";
		$result_password = $conn -> query($sql_password_control);
		$row_password = $result_password -> fetch_array();
		
		if($password == $row_password["password"]){
			$_SESSION["user"] = $username;
			header("Location: ../UserProfile/?goto=you&are&welcome&mr=".$username);
		} else{
			header("Location: ../ServiceLogin/?goto=signin&passwords_now_matches");
		}
	}
	
	if($goto == "signup"){ 	
		// check new username from database
		$sql_username_control = "SELECT username FROM userinfo WHERE username = '$username'";
		$result_username = $conn -> query($sql_username_control);
		$row_username = $result_username -> fetch_array();

		// compare the two passwords
		if($password_1 != $password_2){
			header("Location: ../ServiceLogin/?goto=signup&error&not_match_passwords");
		}
		else if(!empty($row_username)){
			header("Location: ../ServiceLogin/?goto=signup&error&username_is_taken"); 
		}
		else{
			// insert the username to database
			$sql_username_insert = "INSERT INTO userinfo(username, password)
									VALUES('$username', '$password_1')";
			$conn -> query($sql_username_insert);			
			header("Location: ../ServiceLogin/?goto=signin&success&successfully_inserted_the_new_user");
		}
	}
?>