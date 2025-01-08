<?php session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Lemon Home Page</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/red.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">



		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Kavoon&family=Playwrite+IE+Guides&display=swap" rel="stylesheet">


<style>
	
		/* Overall container to arrange menu and products side by side */
		.main-container {
		    display: flex;
		    gap: 20px; /* Space between the menu and the products section */
		}

		/* Side menu styles */
		.sidemenu-holder {
		    flex: 1; /* Allow the side menu to take minimal width */
		    max-width: 200px;
		    padding: 10px;
		    border-right: 1px solid #ddd; /* Optional: Add a divider */
		}

		/* Products section styles */
		.product-section {
		    flex: 3; /* Allow the product section to take the rest of the width */
		    padding: 10px;
		}

		.product-slider {
		    display: flex;
		    flex-wrap: wrap;
		    gap: 15px; /* Space between product items */
		}

		.product-slider .item {
		    width: calc(25% - 15px); /* Each item takes 25% of the width minus gaps */
		    box-sizing: border-box;
		    padding: 10px;
		    border: 1px solid #ddd;
		    border-radius: 5px;
		    text-align: center;
		}

		.product-slider .product-image img {
		    width: 100%;
		    height: auto;
		    max-height: 300px; /* Ensure image fits within limits */
		    object-fit: cover;
		}

		.top-cart-row {
    margin-right: 0;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.items-cart-inner {
    display: flex;
    align-items: center;
    gap: 10px;
}

.cnt-home{
	background-color:rgba(191, 191, 183, 0.3)
}


</style>

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="furniture-container homepage-container">
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<!-- ================================== TOP NAVIGATION ================================== -->
				<!-- <?php include('includes/side-menu.php');?> -->
<!-- ================================== TOP NAVIGATION : END ================================== -->
			</div><!-- /.sidemenu-holder -->	
			
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->
			


<!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->		
			</div><!-- /.homebanner-holder -->
			
		</div><!-- /.row -->

		<!-- ============================================== SCROLL TABS ============================================== -->
		<div class="main-container">
    <!-- Side Menu -->
   

    <!-- Products Section -->
    <div class="product-section">
        <div class="more-info-tab clearfix">
            <h3 class="new-product-title pull-left">All Products</h3>
        </div>

        <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
                <div class="product-slider">
                    <?php
                    $ret = mysqli_query($con, "select * from products");
                    while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <div class="item">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="<?php echo htmlentities($row['productName']); ?>">
                                            </a>
                                        </div><!-- /.image -->
                                    </div><!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        <div class="product-price">
                                            <span class="price">
                                                Rs.<?php echo htmlentities($row['productPrice']); ?>
                                            </span>
                                            <span class="price-before-discount">
                                                Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?>
                                            </span>
                                        </div><!-- /.product-price -->
                                    </div><!-- /.product-info -->

                                    <?php if ($row['productAvailability'] == 'In Stock') { ?>
                                        <div class="action">
                                            <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-info">Add to Cart</a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="action" style="color:red">Out of Stock</div>
                                    <?php } ?>
                                </div><!-- /.product -->
                            </div><!-- /.products -->
                        </div><!-- /.item -->
                    <?php } ?>
                </div><!-- /.product-slider -->
            </div>
        </div>
    </div>
</div>
         <!-- ============================================== TABS ============================================== -->
	
		
<hr />

<?php include('includes/brands-slider.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
	
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>