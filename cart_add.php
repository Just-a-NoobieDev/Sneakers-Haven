<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);

	$id = $_POST['id'];
	$quantity = $_POST['quantity'];
	$color = $_POST['c'];
	$size = $_POST['size'];

	if(isset($_SESSION['user'])){
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
		$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
			try{
				$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, color, size) VALUES (:user_id, :product_id, :quantity, :color, :size)");
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id, 'quantity'=>$quantity, 'color'=>$color, 'size'=>$size]);
				$output['message'] = 'Item added to cart';			
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Product already in cart';
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['productid']);
		}

		if(in_array($id, $exist)){
			$output['error'] = true;
			$output['message'] = 'Product already in cart';
		}
		else{
			$data['productid'] = $id;
			$data['quantity'] = $quantity;
			$data['color'] = $color;
			$data['size'] = $size;

			if(array_push($_SESSION['cart'], $data)){
				$output['message'] = 'Item added to cart';
			}
			else{
				$output['error'] = true;
				$output['message'] = 'Cannot add item to cart';
			}
		}

	}

	$pdo->close();
	echo json_encode($output);

?>