<?php
//Artworks of Scanhead   HNU 2017

include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()


$item_per_page = 7;
$get_total_rows = $mydb->pagi('SELECT COUNT(*) FROM voucher_list'); // 1 line selection, return 1 line
$pages = ceil($get_total_rows[0]/$item_per_page);	


?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Midterm Project</title>

<script src="js/jquery-1.11.3-jquery.min.js"></script>     

<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	$("#results").load("get_purchases.php");  //initial page number to load
	$(".paging_link").bootpag({
	   total: <?php echo  $pages; ?>
	}).on("page", function(e, num){
		e.preventDefault();
		$("#results").load("get_purchases.php", {'page':num});
	});

});
</script>
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 <link href="css/style.css" rel="stylesheet" type="text/css">
 
</head>
<body>
</br>
<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading"><h2>Purchase Transactions</h2></div>
    <div class="panel-body">
	<ul class="nav nav-tabs">
		<li><a href="purchases.php"><b>Make Purchases</b></a></li>
		<li class="active"><a href="viewpurchases.php"><b>View Purchases</b></a></li>
	</ul></br>
		<table class="table table-hover table-striped" id="main">
            <thead>
                <tr>
                    <th>Purchase No.</th>
                    <th>Customer Name</th>
                    <th>Address</th>
					<th>Product</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total Price</th>
                 </tr>
            </thead>
            <tbody id="results">
            </tbody>
        </table>
	</div>
	<div class="panel-footer"><div class="paging_link"></div></div>
  </div>
</div>

</body>
</html>