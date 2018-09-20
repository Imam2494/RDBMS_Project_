

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


</br>
</br>
<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "rdbms";

$file = fopen("test2494.txt","a");
file_put_contents("test2494.txt"," \r\n",FILE_APPEND); 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_select_db($conn,$dbname);
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
		   }
          }
	                  
} 
if ($uu>=5000) {
	
	$rr = rand(10001,1000000);
	
	$timestamp = time()-86400;

	$date = strtotime("+7 day", $timestamp);
	$date_ = date('Y-m-d', $date);
	echo $date_;
	
	mysqli_query($conn," insert into promo_t values('".$rr."', '". $date_."') ");


	fwrite($file,"You are Eligible for the Membership. Membership Code : ");
	fwrite($file,$rr);	
	file_put_contents("test2494.txt"," \r\n",FILE_APPEND); 
	
	fwrite($file,"Thank You !!!");
}
else {fwrite($file,"Thank You !!!");}



fclose($file);

?>




<h1> Thanks for being with us :) </h1>






</body>
</html>






















