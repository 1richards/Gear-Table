<?php
//Open Log File and write timestamp
$log = fopen ('php.log', 'a');
$timestamp = date("Y-m-d H:i:s"); 
$data = PHP_EOL . 'Submission: ' . $timestamp . '------------' . PHP_EOL . PHP_EOL;
fwrite($log, $data);

//Get the ID value and store for later reference 
if (!empty($_REQUEST['id']))
{
$id = $_REQUEST['id'];
fwrite($log, ("id : " . $id . PHP_EOL));
}

//Get the Brand value if it's present and save it as the $change_request variable
if (!empty($_REQUEST['brand']))
{
$brand = $_REQUEST['brand'];
$change_request = $brand;
$change_column = "brand";
fwrite($log, ("brand : " . $brand . PHP_EOL));

}
//Get the Inventory value if it's present and save it as the $change_request variable
if (!empty($_REQUEST['inventory']))
{
$inventory = $_REQUEST['inventory'];
$change_request = $inventory;
$change_column = "inventory";
fwrite($log, ("inventory : " . $inventory . PHP_EOL));
}
//Get the Primary User value if it's present and save it as the $change_request variable
if (!empty($_REQUEST['primary_user']))
{
$primary_user = $_REQUEST['primary_user'];
$change_request = $primary_user;
$change_column = "primary_user";
fwrite($log, ("primary_user : " . $primary_user . PHP_EOL));
}
//Get the Item Name value if it's present and save it as the $change_request variable
if (!empty($_REQUEST['item_name']))
{
$item_name = $_REQUEST['item_name'];
$change_request = $item_name;
$change_column = "item_name";
fwrite($log, ("item_name: " . $item_name . PHP_EOL));
}
//Get the Category Name value if it's present and save it as the $change_request variable
if (!empty($_REQUEST['category_name']))
{
$category_name = $_REQUEST['category_name'];
$change_request = $category_name;
$change_column = "category_name";
fwrite($log, ("category_name: " . $category_name . PHP_EOL));
}
//Get the Unit Weight value if it's present and save it as the $change_request variable
if (!empty($_REQUEST['unit_weight']))
{
$unit_weight = $_REQUEST['unit_weight'];
$change_request = $unit_weight;
$change_column = "unit_weight";
fwrite($log, ("unit_weight: " . $unit_weight . PHP_EOL));
}

// connect to the MySQL database server 
$con=mysqli_connect("naturefitter.com","root","","thefreedomofthehills");

//Check connection
if (mysqli_connect_errno($con))
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

//If data isn't just on the gear table I need to join and update on the category table
if ($change_request != $category_name) {
$SQL = "UPDATE gear SET ".$change_column." = '" . $change_request. "' WHERE id =" .$id;
}
else{
$SQL = "UPDATE category c JOIN gear g ON c.gid = g.id SET category_name = '" . $change_request . "' WHERE g.id = " . $id;
}

fwrite($log, ("SQL Query was: " . $SQL));
 
$result1 = mysqli_query($con, $SQL);


fclose($log);
?>