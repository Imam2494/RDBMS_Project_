

<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 20;
    overflow: hidden;
    background-color: #333333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 15px;
    text-decoration: none;
}

li a:hover {
    background-color: #111111;
}
body {
   background-color: #cccccc;
}
</style>
</head>
<body>



<pre>
<h1>  					<B>SHOP MANAGEMENT</B></h1>
</pre>
<pre>
<p><b>	
</p>
</pre>

<ul>
  <li><a href="HOME.php"><h3>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</H3></a></li>
  <li><a href="grocery_list.php"><h3>Grocery List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</H3></a></li>
  <li><a href="ABOUT.php"><h3>About&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></a></li>
  <li><a href="HELP.php"><h3>Help</h3></a></li>
</ul>



<!-- here is the table to display the table contents of grocery_list from my SQL table -->

		



<table>
	<tr>
		<th> Item Name</th>
		<th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price Per Unit</th>
		<th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity</th>
		<th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total</th>
	</tr>

<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "rdbms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
	//echo "Connected successfully";
} 
// SHOW THE TABLE HERE
	$sql = "SELECT item_name,price_per_unit,quantity,total FROM voucher_list";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
    		// output data of each row
    		while($row = mysqli_fetch_assoc($result)) {
        		echo "<tr><th>" . $row["item_name"]. 
			"</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row["price_per_unit"]."</th>".
			"</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;" . $row["quantity"]."</th>"."</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row["total"]."</th></tr>"."<br>";
    		}
		echo "</table>";
	
	} else {
    		echo "0 result";
	}


mysqli_close($conn);

?>
</table>


</br>
</br>




<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "rdbms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_select_db($conn,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
	echo "Connected successfully1";
	
} 

	$poop = $_POST['promo'];
	echo $poop;
        $flag=0;
	echo "Connected success";
	$sql = "SELECT * FROM promo_t";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
			if($row["code"] == $poop) {
			    	
				date_default_timezone_set('Asia/Dhaka');	
			    	$date_ = date('m/d/Y h:i:s a', time());
				$date_ = date("Y-m-d",strtotime($date_));
			    	echo $date_;
				if($row["valid"] >= $date_) {
					$flag=1; 
					echo "----";
					echo $date_;
					echo "-8888-";
					
					mysqli_query($conn,"delete from promo_t where code = '".$poop."'");
					break;
				}
			}
		}
                if($flag==0)
		{
                   echo"not valid";
                }
	}
	 $uu=0;
	 $sql = "SELECT * FROM voucher_list";
	 $result = $conn->query($sql);
	  if ($result->num_rows > 0) { 
		    while($row = $result->fetch_assoc()) {
                             	$uu=$uu+$row["total"];
		   }
          }
	if($flag==1) {
		$uu = $uu - .2*($uu);
		echo "Total Price : $uu";
		$file = fopen("test2494.txt","a");
		$tt = "Total Price after Discount : ";
		fwrite($file,$tt);
		fwrite($file,$uu);
		fclose($file);
	}
	else {
		echo "Total Price : $uu";
	}




?>




			  <div class="form-group"> 
				<div class="col-sm-offset-5 col-sm-5">
				  <button type="submit" class="btn btn-default" name="submit">Print Voucher List</button>
				  <a href = "print.php"> >> </a>
				</div>
			  </div>









</body>
</html>






















