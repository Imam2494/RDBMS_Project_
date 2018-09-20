

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
</style>
</head>
<body>

<!-- Refresh document every 30 seconds: -->

<meta http-equiv="refresh" content="30">

<pre>
<h1>  					<B>SHOP MANAGEMENT</B>											</h1>
</pre>
<pre>
<p><b>	hello good people :) 
	welcome!!! </b>
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
		<th> Item Name&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th> Price Per Unit</th>
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
	//echo "Connected successfully"."<br>";
} 



	// SHOW THE TABLE HERE
	$sql = "SELECT item_name,price_per_unit FROM grocery_list";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
    		// output data of each row
    		while($row = mysqli_fetch_assoc($result)) {
        		echo "<tr><td>" . $row["item_name"]. "</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row["price_per_unit"]."</td></tr>"."<br>";
    		}
		echo "</table>";
	
	} else {
    		echo "0 result";
	}
mysqli_close($conn);

?>
</table>















</body>
</html>






















