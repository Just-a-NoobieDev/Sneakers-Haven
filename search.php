<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

				<?php      			
					$conn = $pdo->open();

					$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
					$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
					$row = $stmt->fetch();
					
				?>

			<section class="content collection" style="width: 100%; margin: 50px 0;">
				<div class="row" style="width: 100%;">
					<div>
						<div class="h">
							<?php 
								if($row['numrows'] < 1){
									echo '<h1 class="ph">No results found for <i>'.$_POST['keyword'].'</i></h1>';
								}
								else{
									echo '<h1 class="ph">Search results for <i>'.$_POST['keyword'].'</i></h1>';
								}
							?>
						</div>
						<div class="prod-wrap" style="display: flex; flex-wrap: wrap;">
								<?php 
									if($row['numrows'] > 1) {
										try{
												$stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
												$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
									
												foreach ($stmt as $row) {
													$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
													$image = (!empty($row['photo'])) ? 'images/all/'.$row['slug'].'-1.jpeg' : 'images/noimage.jpg';
													if($row['category_id'] == 1) {
														$c = 'nike';
													} else if($row['category_id'] == 2) {
														$c = 'adidas';
													} else if($row['category_id'] == 3) {
														$c = 'puma';
													} else if($row['category_id'] == 4) {
														$c = 'new-balance';
													}
													
														echo "
															<a href='product.php?collection=".$c."&product=".$row['slug']."' class='p'>
																<div class='product'>
																	<img src='".$image."'>
																	<div class='footer'>
																		<div class='details'>
																			<h2>".$highlighted."</h2>
																			<h2>₱".number_format($row['price'], 2)."</h2>
																		</div>
																		<img src='images/icons/heart2.png'>
																	</div>
																</div>
															</a>
														";
												}						
										}
										catch(PDOException $e){
											echo "There is some problem in connection: " . $e->getMessage();
										}
									}
								?>
						</div>
					</div>
				</div>
			</section>

	      <!-- Main content -->
	      <!-- <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	            <?php
	       			
	       			$conn = $pdo->open();

	       			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
	       			$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
	       			$row = $stmt->fetch();
	       			if($row['numrows'] < 1){
	       				echo '<h1 class="page-header">No results found for <i>'.$_POST['keyword'].'</i></h1>';
	       			}
	       			else{
	       				echo '<h1 class="page-header">Search results for <i>'.$_POST['keyword'].'</i></h1>';
		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
						    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
					 
						    foreach ($stmt as $row) {
						    	$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
						    	$image = (!empty($row['photo'])) ? 'images/all/'.$row['slug'].'-1.jpeg' : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail' style='object-fit: cover;'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$highlighted."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
							
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}
					}

					$pdo->close();

	       		?> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section> -->
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>