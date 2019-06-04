<?php
	require "../function/config.php";
	
	session_start();
	
	$goto = $_GET["goto"];
	$user = $_SESSION["user"];
	
	if(!isset($user)){ // check user session first
		header("Location: ../ServiceLogin/?goto=signin");
	}
	if($goto == "logout"){
		session_destroy();
		header("Location: ../ServiceLogin/?goto=signin&&see&you&next&bye");
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
	
		<!-- navbar -->
		<nav class="container navbar navbar-expand-sm bg-light">
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link" href="?goto=logout">[Log Out]</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="?goto=you">[All Products List]</a>
			</li>
		  </ul>
		</nav><br />
		
		<!-- product list -->
		<div class="container">
			<div class="row">
				<!-- user info -->
				<div class="col-sm-3" style="background-color:whitesmoke;">
					<!-- product list -->
					<table class="table">
						<thead>
							<tr>
								<th><h6><?=$user; ?></h6></th>
							</tr>
						</thead>
						<tbody>
						
							<?php
								// get chosen products
								$sql_chosen_product = "SELECT * FROM userproductchoice WHERE username='$user'";
								$result_chosen_product = $conn -> query($sql_chosen_product);
								while($row_chosen_product = $result_chosen_product -> fetch_assoc()){
									?>
									<tr>
										<td><a href="?goto=<?=$row_chosen_product["user_product_choice"]; ?>" class="small">[<?=$row_chosen_product["user_product_choice"]; ?>]</a></td>
										<td><a class="small"><?=$row_chosen_product["product_times"]; ?> pc</a></td>
										<?php
											// get total price of the chosen product
											$product_name = $row_chosen_product['user_product_choice'];
											$sql_total_price = "SELECT * FROM productinfo WHERE product_name = '$product_name'";
											$result_total_price = $conn -> query($sql_total_price);
											$row_total_price = $result_total_price -> fetch_array();
										?>
										<td><a class="small"><?php echo $row_chosen_product["product_times"] * $row_total_price["product_price"]; ?> сом</a></td>
									</tr>
									<?php
								}
							?>
							
						</tbody>
					</table>
				</div>
				
				<?php
					// view selected product from all list
					$sql_one_product = "SELECT * FROM productinfo WHERE product_name = '$goto'";
					$result_one_product = $conn -> query($sql_one_product);
					$row_one_product = $result_one_product -> fetch_array();
					if($goto == $row_one_product["product_name"]){
						$counter = 0;
						?>	
							<form class="form-group" method="POST" action="../function/function.php?goto=product_counter&product_name=<?=$row_one_product['product_name'];?>">
								<div class="row">
									<div class="col-sm-6" class="rounded">
											<span class="badge badge-pill badge-light align-top"">
												<?php
													echo $row_one_product["product_name"];
													echo ":  ";
													echo $row_one_product["product_price"];
													echo "сом";
												?>
											</span>
											<a href="?goto=<?=$row_product_list["product_name"];?>">
												<img src="../img/<?=$row_one_product["product_name"];?>.jpg" class="rounded" />
											</a>
									</div>
									<div class="col-sm-6">
										<input type="number" name="counter" value="1" min="1" max="100" /><br /><br />
										<button type="submit" name="form_sub" value="form_sub" class="btn btn-dark">To order </button><br /><br />
										<button type="submit" name="to_cancel" value="to_cancel" class="btn btn-dark">To Cancel </button>
									</div>
								</div>
								
							</form>
						<?php
					}
					else if($goto == "you"){
						// select all products 
						$sql_product_list = "SELECT * FROM productinfo";
						$result_product_list = $conn -> query($sql_product_list);
						while($row_product_list = $result_product_list -> fetch_assoc()){
							?>
							<div class="col-sm-3" class="rounded">
								<label>
									<span class="badge badge-pill badge-light align-top"">
										<?php
											echo $row_product_list["product_name"];
											echo ":  ";
											echo $row_product_list["product_price"];
											echo "сом";
										?>
									</span>
									<a href="?goto=<?=$row_product_list["product_name"];?>">
										<img src="../img/<?=$row_product_list["product_name"];?>.jpg" class="rounded" />
									</a>
								</label>
							</div>
							<?php
						}
					}
				?>
				
			</div>
		</div>
		
	</body>
</html>
