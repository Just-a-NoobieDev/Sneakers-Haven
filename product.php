<?php include 'includes/session.php'; ?>
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];
	$collection = $_GET['collection'];


	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

			
				<section class="product1">
					<div class="left">
					<div class="callout" id="callout" style="display:none">
						<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
						<span class="message"></span>
					</div>
						<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$collection.'/'.$product['slug'].'-1.jpeg' : 'images/noimage.jpg'; ?>" alt="" class="img1">
						<div class="small">
							<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$collection.'/'.$product['slug'].'-2.jpeg' : 'images/noimage.jpg'; ?>" alt="" class="small-img">
							<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$collection.'/'.$product['slug'].'-3.jpeg' : 'images/noimage.jpg'; ?>" alt="" class="small-img">
							<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$collection.'/'.$product['slug'].'-4.jpeg' : 'images/noimage.jpg'; ?>" alt="" class="small-img">
						</div>
						
					</div>
					<div class="right">
						<a href="collection.php?collection=" class="back"><img src="images/icons/back.png" alt="">Back to Collection</a>
						<h1><?php echo $product['prodname'] ?></h1>
						<p><?php echo $product['description'] ?></p>
						<h1>₱ <?php echo number_format($product['price'], 2); ?></h1>

						<form id="productForm">
							<div class="colors">
								<h1>Colors</h1>
									<input type="radio" name="c" id="black" value="black">
									<label for="black">Black</label>
									<input type="radio" name="c" id="white" value="white">
									<label for="white">White</label>
									<input type="radio" name="c" id="colored" value="colored">
									<label for="colored">Colored</label>
							</div>
							<div class="sizes">
								<h1>Size</h1>
								<select name="size" id="s">
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
								</select>
							</div>
							<div class="form-group f1">
								<div class="input-group col-sm-5">
									
									<span class="input-group-btn">
										<button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
									</span>
									<input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
									<span class="input-group-btn">
											<button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
											</button>
									</span>
									<input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
							</div>
								<div class="btns">
									<button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									<a href="/" class="btn btn-primary btn-lg btn-flat">Checkout</a>
								</div>
							</div>
						</form>
					</div>
				</section>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>
</body>
</html>