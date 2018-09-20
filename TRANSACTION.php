
<!DOCTYPE html>
<html>
<head> 
<style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #d96459;
   font-family: monospace;
   font-size: 20px;
   text-align: left;
     } 
  th {
   background-color: #d96459;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
  
  #search{
	width: 50 px;
   	padding: 7px;
	border: 1px solid #333;	
  }
  #submit{
	padding: 7px;
	background: orange;
	border: 1px solid black;
	color: black;	
	margin-left: -5px;
	cursor: pointer;
  }
  #submit:hover{
	background: #333;
	transition: all 0.40s;
  }
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
<h1>                  <B>SHOP MANAGEMENT</B></h1>
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




  <!DOCTYPE html>

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
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {

$fname = $_POST['firstname'];
$lname =$_POST['lastname'];
$phno =$_POST['phoneno'];


$file = fopen("test2494.txt","w");
fwrite($file,$fname);
fwrite($file,$lname);
fwrite($file,$phno);
fclose($file);


echo $fname;
	$aa = $mydb->execute('insert into customer VALUES ("'.$fname.'","'.$lname.'","'.$phno.'")');
	if (!empty($aa))	 {  }
	
	
} 


			
?>











<title>RDBMS Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css">

<script src="js/jquery-1.11.3-jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});


function showRow(row)
{
	var x=row.cells;
	document.getElementById("item_name").value = x[0].innerHTML;
	document.getElementById("ppu").value = x[1].innerHTML;
}




</script>



</br>
<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading"><h2>Voucher List </h2></div>
	<div class="panel-body"> 
	<ul class="nav nav-tabs">
		<li class="active"><a href="purchases2.php"><b>Make Purchases</b></a></li>
	
	</ul></br>
		<div class="col-sm-6">
		
		
		<div class=".col-md-6">
          <div class="panel panel-default">
          <div class="bs-example">
         
		 
		  <div class="form-group">
           <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name="search_text" id="search_text" placeholder="Search items" class="form-control" />
           </div>
         </div>
		 
		

	       </div>
          </div>
        </div>
		
		
		
		
		
				<table class="table table-striped table-hover" id="main">
				<thead>
				  <tr>
					<th>item_name</th>
					<th>price_per_unit</th>
				  </tr>
				</thead>
				
				

				<tbody id="result">
					
				</tbody>
				</table>
			<div class="paging_link"></div>
		</div>
		<div class="col-sm-6">
			<form class="form-horizontal" method="post">
				<div class="form-group">
				<label class="control-label col-sm-3">Item Name: </label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="item_name" required placeholder="sdfsdfa" name="item_name">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">Price Per Unit: </label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="ppu" required placeholder="sdhdteh" name="ppu" >
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-3">Quantity: </label>
				<div class="col-sm-9"> 
				  <input type="text" class="form-control" id="quantity" required placeholder="sdhjfh" name="quantity">
				</div>
			  </div>
			  
			  <div class="form-group"> 
				<div class="col-sm-offset-3 col-sm-9">
				  <button type="submit" class="btn btn-default" name="submit">Add</button>
				</div>
			  </div>
			</form>
		</div>
	</div>
<?php

     if (isset($_POST['submit'])) 
    {
        $pname=$_POST['item_name'];
        $price=$_POST['ppu'];
        $quantity=$_POST['quantity'];
	$total=$price*$quantity;
        $uu = $total;
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
                               $sql = "SELECT * FROM voucher_list";
	                        $result = $conn->query($sql);
	                        if ($result->num_rows > 0) { 
		                        while($row = $result->fetch_assoc()) {
                                                $uu=$uu+$row["total"];
			                                                      }
                                                                     }
	                  
                       }
		 
	$query = $mydb->execute('insert into voucher_list VALUES ("'.$pname.'","'.$price.'","'.$quantity.'","'.$total.'","'.$uu.'")');
	
     if (!empty($query))
		 {
?>
			<div class="well">
				<h4>Purchase successfull!</h4>
				<div class="row">
				<div class="col-sm-2">Total Price</div><div class="col-sm-10">: <?php echo $uu; ?></div>
				</div>
			</div>
                        <div class="col-sm-offset-8 col-sm-15>
				  <button type="submit" class="btn btn-default" name="submit">Finish Transaction</button>
				  <a href = "finish_transaction.php"> >> </a>	
			</div>
<?php
		 } else {
         echo "Error: " ;
         }
      }   
?>
	<div class="panel-footer"></div>
	</div>
</div>

</body>
</html>







