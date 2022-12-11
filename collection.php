<?php include 'includes/session.php'; ?>
<?php
	$slug = $_GET['collection'];


	$conn = $pdo->open();

	try{
		if($slug != '') {
			$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
			$stmt->execute(['slug' => $slug]);
			$cat = $stmt->fetch();
			$catid = $cat['id'];
		}
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">


	      <!-- Main content -->
	      <section class="content collection" style="width: 100%; margin: 50px 0;">
	        <div class="row" style="width: 100%;">
	        	<div>
								<div class="h">
									<h1 class="ph"><?php 
										if($slug != '') {
											echo $cat['name'] . " Collection";
										} else {
											echo "Collection";
										} ?></h1>
										<select name="cars" id="options">
											<option disabled selected>Select a Collection</option>
											<option value="all">All</option>
											<option value="nike">Nike</option>
											<option value="adidas">Adidas</option>
											<option value="puma">Puma</option>
											<option value="new-balance">New Balance</option>
										</select>
								</div>
								<div class="prod-wrap" style="display: flex; flex-wrap: wrap;">
		       		<?php
		       			
		       			$conn = $pdo->open();
								
		       			try{
									if(!$slug == '') {
										$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
										$stmt->execute(['catid' => $catid]);
									} else {
										$stmt = $conn->prepare("SELECT * FROM products");
										$stmt->execute();
									}
									
									
									
						    foreach ($stmt as $row) {
										if($row['category_id'] == 1) {
											$c = 'nike';
										} else if ($row['category_id'] == 2) {
											$c = 'adidas';
										} else if ($row['category_id'] == 3) {
											$c = 'puma';
										} else if ($row['category_id'] == 4) {
											$c = 'new-balance';
										};
										$image = (!empty($row['photo'])) ? 'images/all/'.$row['slug'].'-1.jpeg' : 'images/noimage.jpg';
										$price = number_format($row['price'], 2);
										echo "
												<a href='product.php?collection=".$c."&product=".$row['slug']."' class='p'>
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
											</a>
										";
						    }

						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
							</div>
	        	</div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script type="text/javascript">

let queryString = location.search.split('=');

if(queryString == '') {
	$(`#options option:contains(all)`).prop('selected', true)
} else {
	$(`#options option:contains(${queryString})`).attr('selected', 'selected')
}

$(document).ready(function(){
	// if(queryString == '') {
	// 	$('#options').find('option[all]').attr('selected','selected');
	// } else {
  // 	$('#options').find(`option[${queryString}]`).attr('selected','selected');
	// }
	$('#options').on('change', function() {
		let c = $('#options').val();
		let f = location.search.split('=')
		if(c == 'all') {
			location.href = `collection.php?collection=`
		} else {
			location.href = `collection.php?collection=${c}`
			$('#options').find(`option[value=${f}]`).prop('selected',true);
		}
	})
});

console.log($('#options').val())

</script>
</body>
</html>