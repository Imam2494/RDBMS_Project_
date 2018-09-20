

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
<p><b>	 </b>
</p>
</pre>

<ul>
  <li><a href="HOME.php"><h3>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</H3></a></li>
  <li><a href="grocery_list.php"><h3>Grocery List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</H3></a></li>
  <li><a href="ABOUT.php"><h3>About&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></a></li>
  <li><a href="HELP.php"><h3>Help</h3></a></li>
</ul>


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

$file = fopen("test2494.txt","a");
file_put_contents("test2494.txt"," \r\n",FILE_APPEND);
file_put_contents("test2494.txt","Item Name		Price Per Unit		Quantity		Total\n",FILE_APPEND); 
file_put_contents("test2494.txt"," \r\n",FILE_APPEND);


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
        $uu=0;
	 $sql = "SELECT * FROM voucher_list";
	 $result = $conn->query($sql);
	  if ($result->num_rows > 0) { 
		    while($row = $result->fetch_assoc()) {
                             	$uu=$uu+$row["total"];
				fwrite($file,$row["item_name"]);		file_put_contents("test2494.txt","		",FILE_APPEND);
				fwrite($file,$row["price_per_unit"]);		file_put_contents("test2494.txt","		",FILE_APPEND);
				fwrite($file,$row["quantity"]);			file_put_contents("test2494.txt","		",FILE_APPEND);
				fwrite($file,$row["total"]);			file_put_contents("test2494.txt","		",FILE_APPEND);			
		   		file_put_contents("test2494.txt"," \r\n",FILE_APPEND); 

		   }
          }
	                  
} 

echo "Total Price :$uu ";
fwrite($file,"Total Price : ");
fwrite($file,$uu);
file_put_contents("test2494.txt"," \r\n",FILE_APPEND);


fclose($file);

?>


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




?>








<form action="after_promo.php" method="POST">
Use Promo Code:<br>
<input type="text" name="promo">
<br><br>
<input type="submit">
<br><br>
</form>


			  <div class="form-group"> 
				<div class="col-sm-offset-8 col-sm-15">
				  <button type="submit" class="btn btn-default" name="submit">Print Voucher List</button>
				  <a href = "print.php"> >> </a>
				</div>
			  </div>









</body>
</html>






















