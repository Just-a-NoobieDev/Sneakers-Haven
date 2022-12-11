<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">
			
				<div class="contents">
					<?php
						if(isset($_SESSION['error'])){
							echo "
								<div class='error'>
									".$_SESSION['error']."
								</div>
							";
							unset($_SESSION['error']);
						}

						if(isset($_SESSION['success'])){
							echo "
								<div class='success'>
									".$_SESSION['success']."
								</div>
							";
							unset($_SESSION['success']);
						}
					?>
					<h1>MY ACCOUNT</h1>
					<div class="up">
						<div class="avatar">
							<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/icons/person.png'; ?>" alt="">
						</div>
						<div class="details">
							<div class="name">
								<h3>Name: </h3>
								<h2><?php echo $user['firstname'].' '.$user['lastname']; ?></h2>
							</div>
							<div class="name">
								<h3>Email: </h3>
								<h2><?php echo $user['email']; ?></h2>
							</div>
							<div class="name">
								<h3>Contact: </h3>
								<h2><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'No contact info provided'; ?></h2>
							</div>
							<div class="name">
								<h3>Address: </h3>
								<h2><?php echo (!empty($user['address'])) ? $user['address'] : 'No address provided'; ?></h2>
							</div>
						</div>
						<div class="edit">
							<span class="pull-right">
								<a href="#edit" data-toggle="modal"><img src="images/icons/edit.png" alt=""></a>
							</span>
						</div>
					</div>
					<div class="bottom">
						<h1>MY TRANSACTIONS</h1>
						<table class="table" style="text-align: center;" id="example1">
							<thead>
								<th class="hidden"></th>
								<th>Date</th>
								<th>Transaction#</th>
								<th>Amount</th>
								<th>Full Details</th>
							</thead>
							<tbody>
							<?php
								$conn = $pdo->open();

								try{
									$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
									$stmt->execute(['user_id'=>$user['id']]);
									foreach($stmt as $row){
										$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
										$stmt2->execute(['id'=>$row['id']]);
										$total = 0;
										foreach($stmt2 as $row2){
											$subtotal = $row2['price']*$row2['quantity'];
											$total += $subtotal;
										}
										echo "
											<tr style='height: 100px;'>
												<td class='hidden'></td>
												<td>".date('M d, Y', strtotime($row['sales_date']))."</td>
												<td>".$row['pay_id']."</td>
												<td>₱ ".number_format($total, 2)."</td>
												<td><button class='v transact' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
											</tr>
										";
									}

								}
								catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

								$pdo->close();
							?>
							</tbody>
						</table>
					</div>
				</div>

	      <!-- Main content -->
	      <!-- <section class="contents">
	        <div class="row">
	        	<div class="">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
	        		<div class="box box-solid">
	        			<div class="up">
	        				<div class="avatar">
	        					<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/icons/person.png'; ?>" width="100%">
	        				</div>
	        				<div class="">
	        					<div class="row">
	        						<div class="">
	        							<h4>Name:</h4>
	        							<h4>Email:</h4>
	        							<h4>Contact Info:</h4>
	        							<h4>Address:</h4>
	        							<h4>Member Since:</h4>
	        						</div>
	        						<div class="">
	        							<h4><?php echo $user['firstname'].' '.$user['lastname']; ?>
	        								<span class="pull-right">
	        									<a href="#edit" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
	        								</span>
	        							</h4>
	        							<h4><?php echo $user['email']; ?></h4>
	        							<h4><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></h4>
	        							<h4><?php echo (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></h4>
	        							<h4><?php echo date('M d, Y', strtotime($user['created_on'])); ?></h4>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        		<div class="box box-solid">
	        			<div class="box-header with-border">
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Transaction History</b></h4>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered" id="example1">
	        					<thead>
	        						<th class="hidden"></th>
	        						<th>Date</th>
	        						<th>Transaction#</th>
	        						<th>Amount</th>
	        						<th>Full Details</th>
	        					</thead>
	        					<tbody>
	        					<?php
	        						$conn = $pdo->open();

	        						try{
	        							$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
	        							$stmt->execute(['user_id'=>$user['id']]);
	        							foreach($stmt as $row){
	        								$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
	        								$stmt2->execute(['id'=>$row['id']]);
	        								$total = 0;
	        								foreach($stmt2 as $row2){
	        									$subtotal = $row2['price']*$row2['quantity'];
	        									$total += $subtotal;
	        								}
	        								echo "
	        									<tr>
	        										<td class='hidden'></td>
	        										<td>".date('M d, Y', strtotime($row['sales_date']))."</td>
	        										<td>".$row['pay_id']."</td>
	        										<td>&#36; ".number_format($total, 2)."</td>
	        										<td><button class='btn btn-sm btn-flat btn-info transact' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
	        									</tr>
	        								";
	        							}

	        						}
        							catch(PDOException $e){
										echo "There is some problem in connection: " . $e->getMessage();
									}

	        						$pdo->close();
	        					?>
	        					</tbody>
	        				</table>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	      </section> -->
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$(document).on('click', '.transact', function(e){
		e.preventDefault();
		$('#transaction').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'transaction.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
				$('#date').html(response.date);
				$('#transid').html(response.transaction);
				$('#detail').prepend(response.list);
				$('#total').html(response.total);
			}
		});
	});

	$("#transaction").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
});
</script>
</body>
</html>