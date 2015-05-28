<?php

//storing the data from the post global array into variables
$w=$_POST["email"];
$x=$_POST["first_name"];
$y=$_POST["last_name"];
$z=$_POST["city"];
$flag=0; //flag variable will be set to 1 if error occurs anywhere in inserting data into database.
if(isset($_POST["first_name"])&&isset($_POST["last_name"])&&isset($_POST["email"])&&isset($_POST["city"])&&isset($_POST["product"]))
{
//connecting to mysql user:root@localhost,password:"" and database name:"test"
$link = mysqli_connect("localhost", "root", "", "test");
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "INSERT INTO test (first_name,last_name,email,city) VALUES ('$x','$y','$w','$z')";

//storing selected products into a different table "products"
foreach($_POST['product'] as $arr){
$sql2 = "INSERT INTO products (first_name,last_name,product) VALUES ('$x','$y','$arr')";
if(mysqli_query($link, $sql2)){
} else{
$flag=1;
break;
    //echo "checkbox ERROR: Could not able to execute $sql2. " . mysqli_error($link);

}
}

if(mysqli_query($link, $sql)){
    //echo "Records added successfully.";

} else{
$flag=1;
   // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
echo $flag;
mysqli_close($link);
}
else {
$flag=1;
echo $flag;}


?>