<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	<?php include 'includes/navbar.php'; ?>
	 
	<div class="container c">
		<section class="hero">
			<div class="image1">
				<img src="images/hero1.png" class="img1">
				<h1>BRANDED SHOE <br> COLLECTION</h1>
				<div class="cta">
					<p>Add a little spark <br> to your look</p>
					<a href="/">
						TO COLLECTION
						<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8 22.5L6.25 20.75L18.25 8.75H7.5V6.25H22.5V21.25H20V10.5L8 22.5Z" fill="#EEE2DF"/>
						</svg>
					</a>
				</div>
			</div>
				<img src="images/hero2.png" class="img2">
				<img src="images/hero3.png" class="img3">
		</section>

		<section class="collection">
			<div class="head">
				<h1>NIKE COLLECTION</h1>
				<a href="collection.php?collection=nike">SHOW MORE 
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 22.5L6.25 20.75L18.25 8.75H7.5V6.25H22.5V21.25H20V10.5L8 22.5Z" fill="#432818"/>
					</svg>
				</a>
			</div>
			
			
			<div class="prod-wrap">
				<?php 
					$conn = $pdo->open();

					try {
						$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 1 LIMIT 3");
						$stmt->execute();

						foreach($stmt as $row) {
							$image = (!empty($row['photo'])) ? 'images/nike/'.$row['slug'].'-1.jpeg' : 'images/noimage.jpg';
							$price = number_format($row['price'], 2);
							echo "<a href='product.php?collection=nike&product=".$row['slug']."' class='p'>
								<div class='product'>
									<img src='".$image."'>
									<div class='footer'>
										<div class='details'>
											<h2>".$row['name']."</h2>
											<h2>₱".$price."</h2>
										</div>
										<img src='images/icons/heart2.png'>
									</div>
								</div>
							</a>";
						}

					} catch(PDOException $e){
						echo "There is some problem in connection: " . $e->getMessage();
					}
				?>
			</div>
		</section>

		<section class="collection">
			<div class="head">
				<h1>ADIDAS COLLECTION</h1>
				<a href="collection.php?collection=adidas">SHOW MORE 
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 22.5L6.25 20.75L18.25 8.75H7.5V6.25H22.5V21.25H20V10.5L8 22.5Z" fill="#432818"/>
					</svg>
				</a>
			</div>

			
			<div class="prod-wrap">
			<?php 
					$conn = $pdo->open();

					try {
						$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 2 LIMIT 3");
						$stmt->execute();

						foreach($stmt as $row) {
							$image = (!empty($row['photo'])) ? 'images/adidas/'.$row['slug'].'-1.jpeg' : 'images/noimage.jpg';
							$price = number_format($row['price'], 2);
							echo "<a href='product.php?collection=adidas&product=".$row['slug']."' class='p'>
								<div class='product'>
									<img src='".$image."'>
									<div class='footer'>
										<div class='details'>
											<h2>".$row['name']."</h2>
											<h2>₱".$price."</h2>
										</div>
										<img src='images/icons/heart2.png'>
									</div>
								</div>
							</a>";
						}

					} catch(PDOException $e){
						echo "There is some problem in connection: " . $e->getMessage();
					}
				?>
			</div>
		</section>

		<section class="collection">
			<div class="head">
				<h1>PUMA COLLECTION</h1>
				<a href="collection.php?collection=puma">SHOW MORE 
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 22.5L6.25 20.75L18.25 8.75H7.5V6.25H22.5V21.25H20V10.5L8 22.5Z" fill="#432818"/>
					</svg>
				</a>
			</div>

			
			<div class="prod-wrap">
			<?php 
					$conn = $pdo->open();

					try {
						$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 3 LIMIT 3");
						$stmt->execute();

						foreach($stmt as $row) {
							$image = (!empty($row['photo'])) ? 'images/puma/'.$row['slug'].'-1.jpeg' : 'images/noimage.jpg';
							$price = number_format($row['price'], 2);
							echo "<a href='product.php?collection=puma&product=".$row['slug']."' class='p'>
								<div class='product'>
									<img src='".$image."'>
									<div class='footer'>
										<div class='details'>
											<h2>".$row['name']."</h2>
											<h2>₱".$price."</h2>
										</div>
										<img src='images/icons/heart2.png'>
									</div>
								</div>
							</a>";
						}

					} catch(PDOException $e){
						echo "There is some problem in connection: " . $e->getMessage();
					}
				?>	
			</div>
		</section>

		<section class="collection">
			<div class="head">
				<h1>NEW BALANCE COLLECTION</h1>
				<a href="collection.php?collection=new-balance">SHOW MORE 
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 22.5L6.25 20.75L18.25 8.75H7.5V6.25H22.5V21.25H20V10.5L8 22.5Z" fill="#432818"/>
					</svg>
				</a>
			</div>

			
			<div class="prod-wrap">
			<?php 
					$conn = $pdo->open();

					try {
						$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 4 LIMIT 3");
						$stmt->execute();

						foreach($stmt as $row) {
							$image = (!empty($row['photo'])) ? 'images/new-balance/'.$row['slug'].'-1.jpeg' : 'images/noimage.jpg';
							$price = number_format($row['price'], 2);
							echo "<a href='product.php?collection=new-balance&product=".$row['slug']."' class='p'>
								<div class='product'>
									<img src='".$image."'>
									<div class='footer'>
										<div class='details'>
											<h2>".$row['name']."</h2>
											<h2>₱".$price."</h2>
										</div>
										<img src='images/icons/heart2.png'>
									</div>
								</div>
							</a>";
						}

					} catch(PDOException $e){
						echo "There is some problem in connection: " . $e->getMessage();
					}
				?>	
			</div>
		</section>
</div>

	<div class="break">
		<div class="container c">
			<h1>UNWRAP YOUR FAVS</h1>
			<p>You work hard. You gift hard. It’s time to treat yourself to something good.</p>
		</div>
	</div>

<div class="wrapper">
	<div class="container f" id="contact">
		<form action="" class="form">
			<h3>
				If you want  to order a custom shoes,<br />
				please, fill out form below and we will contact<br />
				you within 15 minutes!
			</h3>
			<input type="text" name="fname" placeholder="Full Name">
			<input type="email" name="email" placeholder="Email">
			<textarea name="content" id="" cols="30" rows="10" placeholder="Describe your wishes"></textarea>
			<button>SEND MESSAGE</button>
		</form>
		<img src="images/form.png" alt="">
	</div>
</div>


<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
</body>
</html>