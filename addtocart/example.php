<?php

// A collection of sample products
$products = json_decode('[{"id":100,"name":"Áo Ghi - Lê (gile) áo khoác ngoài nam nữ.","image":{"source":"https://down-vn.img.susercontent.com/file/sg-11134201-22100-mw1zxtvt80hve4","width":250,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray","rose-gold":"Rose Gold"},"price":"349.00"},
{"id":101,"name":"Áo Khoác Gió Unisex Line Jacket Fredo Menswear Local Brand 𝐅𝐫𝐞𝐝𝐨 𝐌𝐞𝐧𝐰𝐞𝐚𝐫","image":{"source":"https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lm9rde056nrzf9_tn","width":200,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray","rose-gold":"Rose Gold"},"price":"449.00"},
{"id":114,"name":"Áo khoát xuất khẩu,áo khoác thể thao add Nam Nữ thời trang chất vải siêu xịn mịn thoáng","image":{"source":"https://down-vn.img.susercontent.com/file/vn-11134201-7r98o-lmg9r7swkq8vbb_tn","width":252,"height":250},"colors":[],"price":"179.00"},
{"id":115,"name":"Quần Jean Xanh Bạc Rách Gối Nam Nữ Phong Cách Đường Phố MENFASHION1989 MQK 004","image":{"source":"https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lh75hftkufarb6_tn","width":252,"height":250},"colors":[],"price":"199.00"}]');

$colors = [
	'black'      => 'Black',
	'space-gray' => 'Space Gray',
	'jet-black'  => 'Jet Black',
	'silver'     => 'Silver',
	'gold'       => 'Gold',
	'rose-gold'  => 'Rose Gold',
];

// Page
$a = (isset($_GET['a'])) ? $_GET['a'] : 'home';

require_once 'class.Cart.php';

// Initialize cart object
$cart = new Cart([
	// Maximum item can added to cart, 0 = Unlimited
	'cartMaxItem' => 0,

	// Maximum quantity of a item can be added to cart, 0 = Unlimited
	'itemMaxQuantity' => 5,

	// Do not use cookie, cart items will gone after browser closed
	'useCookie' => false,
]);

// Shopping Cart Page
if ($a == 'cart') {
	$cartContents = '
	<div class="alert alert-warning">
		<i class="fa fa-info-circle"></i> There are no items in the cart.
	</div>';

	// Empty the cart
	if (isset($_POST['empty'])) {
		$cart->clear();
	}

	// Add item
	if (isset($_POST['add'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}

		$cart->add($product->id, $_POST['qty'], [
			'price' => $product->price,
			'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
		]);
	}

	// Update item
	if (isset($_POST['update'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}

		$cart->update($product->id, $_POST['qty'], [
			'price' => $product->price,
			'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
		]);
	}

	// Remove item
	if (isset($_POST['remove'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}

		$cart->remove($product->id, [
			'price' => $product->price,
			'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
		]);
	}

	if (!$cart->isEmpty()) {
		$allItems = $cart->getItems();

		$cartContents = '
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th class="col-md-7">Product</th>
					<th class="col-md-3 text-center">Quantity</th>
					<th class="col-md-2 text-right">Price</th>
				</tr>
			</thead>
			<tbody>';

		foreach ($allItems as $id => $items) {
			foreach ($items as $item) {
				foreach ($products as $product) {
					if ($id == $product->id) {
						break;
					}
				}

				$cartContents .= '
				<tr>
					<td>' . $product->name . ((isset($item['attributes']['color'])) ? ('<p><strong>Color: </strong>' . $colors[$item['attributes']['color']] . '</p>') : '') . '</td>
					<td class="text-center"><div class="form-group"><input type="number" value="' . $item['quantity'] . '" class="form-control quantity pull-left" style="width:100px"><div class="pull-right"><button class="btn btn-default btn-update" data-id="' . $id . '" data-color="' . ((isset($item['attributes']['color'])) ? $item['attributes']['color'] : '') . '"><i class="fa fa-refresh"></i> Update</button><button class="btn btn-danger btn-remove" data-id="' . $id . '" data-color="' . ((isset($item['attributes']['color'])) ? $item['attributes']['color'] : '') . '"><i class="fa fa-trash"></i></button></div></div></td>
					<td class="text-right">$' . $item['attributes']['price'] . '</td>
				</tr>';
			}
		}

		$cartContents .= '
			</tbody>
		</table>

		<div class="text-right">
			<h3>Total:<br />$' . number_format($cart->getAttributeTotal('price'), 2, '.', ',') . '</h3>
		</div>

		<p>
			<div class="pull-left">
				<button class="btn btn-danger btn-empty-cart">Empty Cart</button>
			</div>
			<div class="pull-right text-right">
				<a href="?a=home" class="btn btn-default">Continue Shopping</a>
				<a href="?a=checkout" class="btn btn-danger">Checkout</a>
			</div>
		</p>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Cart - A Simple PHP Cart Library by Sei Kan</title>

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

		<style>
			body{margin-top:50px;margin-bottom:200px}
		</style>
	</head>

	<body>
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="?a=shop" class="navbar-brand">Sample Shop</a>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-main">
					<ul class="nav navbar-nav">
						<li><a href="?a=cart" id="li-cart"><i class="fa fa-shopping-cart"></i> Cart (<?php echo $cart->getTotalItem(); ?>)</a></li>
					</ul>
				</div>
			</div>
		</div>

		<?php if ($a == 'cart'): ?>
		<div class="container">
			<h1>Shopping Cart</h1>

			<div class="row">
				<div class="col-md-12">
					 <div class="table-responsive">
						<?php echo $cartContents; ?>
					 </div>
				</div>
			</div>
		</div>
		<?php elseif ($a == 'checkout'): ?>
		<div class="container">
			<h1>Checkout</h1>

			<div class="row">
				<div class="col-md-12">
					 <div class="table-responsive">
					 	<pre><?php print_r($cart->getItems()); ?></pre>
					 </div>
				</div>
			</div>
		</div>
		<?php else: ?>
		<div class="container">
			<h1>Products</h1>
			<div class="row">
				<?php
				foreach ($products as $product) {
					echo '
					<div class="col-md-6">
						<h3>' . $product->name . '</h3>

						<div>
							<div class="pull-left">
								<img src="' . $product->image->source . '" border="0" width="' . $product->image->width . '" height="' . $product->image->height . '" title="' . $product->name . '" />
							</div>
							<div class="pull-right">
								<h4>$' . $product->price . '</h4>
								<form>
									<input type="hidden" value="' . $product->id . '" class="product-id" />';

					if ($product->colors) {
						echo '
										<div class="form-group">
											<label>Color:</label>
											<select class="form-control color">';

						foreach ($product->colors as $key => $value) {
							echo '
												<option value="' . $key . '"> ' . $value . '</option>';
						}

						echo '
											</select>
										</div>';
					}

					echo '

									<div class="form-group">
										<label>Quantity:</label>
										<input type="number" value="1" class="form-control quantity" />
									</div>
									<div class="form-group">
										<button class="btn btn-danger add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>';
				}
				?>
			</div>
		</div>
		<?php endif; ?>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script>
			$(document).ready(function(){
				$('.add-to-cart').on('click', function(e){
					e.preventDefault();

					var $btn = $(this);
					var id = $btn.parent().parent().find('.product-id').val();
					var color = $btn.parent().parent().find('.color').val() || '';
					var qty = $btn.parent().parent().find('.quantity').val();

					var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="add" value=""><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="color" value="' + color + '"><input type="hidden" name="qty" value="' + qty + '">');

					$('body').append($form);
					$form.submit();
				});

				$('.btn-update').on('click', function(){
					var $btn = $(this);
					var id = $btn.attr('data-id');
					var qty = $btn.parent().parent().find('.quantity').val();
					var color = $btn.attr('data-color');

					var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="update" value=""><input type="hidden" name="id" value="'+id+'"><input type="hidden" name="qty" value="'+qty+'"><input type="hidden" name="color" value="'+color+'">');

					$('body').append($form);
					$form.submit();
				});

				$('.btn-remove').on('click', function(){
					var $btn = $(this);
					var id = $btn.attr('data-id');
					var color = $btn.attr('data-color');

					var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="remove" value=""><input type="hidden" name="id" value="'+id+'"><input type="hidden" name="color" value="'+color+'">');

					$('body').append($form);
					$form.submit();
				});

				$('.btn-empty-cart').on('click', function(){
					var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="empty" value="">');

					$('body').append($form);
					$form.submit();
				});
			});
		</script>
	</body>
</html>