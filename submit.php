
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



<pre>
<h1>  					<B>SHOP MANAGEMENT</B>											</h1>
</pre>
<pre>
<p><b>  </b>
</p>
</pre>

<ul>
  <li><a href="HOME.php"><h3>Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</H3></a></li>
  <li><a href="grocery_list.php"><h3>Grocery List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</H3></a></li>
  <li><a href="ABOUT.php"><h3>About&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></a></li>
  <li><a href="HELP.php"><h3>Help</h3></a></li>
</ul>

  <!DOCTYPE html>
<html>
<head>

<?php
//Artworks of Scanhead   HNU 2017
include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()


?>



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
	
	
} 


$name = $_POST['name__'];
$pass =$_POST['pass__'];


	// SHOW THE TABLE HERE
	$sql = "SELECT * FROM keeper ";
	$result = $conn->query($sql);


	$flg = 0;
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
			if($row["password"] == $pass and $row["name"] == $name) {
				$flg = 1;
				break;
			}
		}
		if($flg==0) {
			echo "Error";
		}
		else { 
		mysqli_query($conn,"truncate table voucher_list");
		
					
?>
<h3> Log In </h3>
<form action="TRANSACTION.php" method = "POST"> 
Name:<br>
<input type="text" name="firstname">
<br>
Address:<br>
<input type="text" name="lastname">
<br>
Phone no:<br>
<input type="text" name="phoneno">
<br><br>
<input type="submit">


</form>
<?php
		}

		
	}	

	
mysqli_close($conn);

?>






</head>
</html>