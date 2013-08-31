<?php
//Create connection
$con=mysqli_connect("naturefitter.com","root","","thefreedomofthehills");

//Check connection
if (mysqli_connect_errno($con))
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 
 //Get values
 
 $oper = $_POST[oper];
 $id = $_POST[id];
 $item_name = $_POST[item_name];
 $primary_user = $_POST[primary_user];
 $brand = $_POST[brand];
 
if ($oper == "del"){
 
	 //Delete the record
	 
	 $SQL = "DELETE from gear WHERE id = " . $id; 
	 
	mysqli_query($con, $SQL);
	
 }
 else{
 
	//Insert Data 
	 $gear_exists = 'SELECT * from gear WHERE item_name = "' . $item_name .'" AND primary_user = "' . $primary_user .'" AND brand = "' . $brand .'";'; 
	 
	if ($gear_exists_result = mysqli_query($con, $gear_exists)){
	 $rowcount=mysqli_num_rows($gear_exists_result);
	  printf("Result set has %d rows.\n",$rowcount);
	  // Free result set
	  mysqli_free_result($gear_exists_result);
		if ($rowcount == 0){
			$sql1="INSERT INTO gear (item_name,unit_weight,inventory,primary_user,brand) VALUES ('$_POST[item_name]','$_POST[unit_weight]','$_POST[inventory]','$_POST[primary_user]','$_POST[brand]')";
			mysqli_query($con, $sql1);
			printf ("New Record has id %d.\n", mysqli_insert_id($con));

			$lastid = mysqli_insert_id($con);
			echo "</br></br>LastID = ". $lastid;

			$sql2="INSERT INTO category (category_name, gid) VALUES ('$_POST[category_name]'," . $lastid .")";
		}
		else {
		printf ("That item aleady exists.\n");
		}
	}


	mysqli_query($con, $sql2);
	printf ("New Record has id %d.\n", mysqli_insert_id($con));


	/*
	if (!mysqli_query($con,$sql1))
	 {
	 die('Error: ' . mysqli_error($con));
	 }
	if (!mysqli_query($con,$sql2))
	 {
	 die('Error: ' . mysqli_error($con));
	 }
	*/

	echo "success";
}

mysqli_close($con);

?>
