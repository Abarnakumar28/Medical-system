
<?php
// Connect to the database
$host="localhost";
$application="root";
$password="";
$email="";
$dname="";
$time="";
$mobile="";
$Name="";
$connect=mysqli_connect($host,$application,$password,"my_hospital");
if(mysqli_connect_errno($connect))
{
 echo 'Failed to connect***';
}
else
{
	echo 'Connection to db - Success...';
}

// Grab User submitted information
$Name = $_POST["users_name"];
$email = $_POST["users_email"];
$mobile = $_POST["users_mobile"];
$dname = $_POST["users_dname"];
$time = $_POST["users_time"];
print("<br>");
print("<br>");
echo 'Your name is  ';
print( "$Name" ); 
print("<br>");
echo 'Your Mail-id is  ';
print( "$email" ); 
print("<br>");
echo 'Your mobile nmber  is  ';
print( "$mobile" ); 
print("<br>");
echo 'Doctor choosen by you is ';
print( "$dname" );
print("<br>");
echo 'Timings chosen by you is ';
print( "$time" );
print("<br>");
print("<br>");

//$ins = "INSERT INTO users (users_email, users_pass) VALUES ('xyz','123')";

/*
if(mysqli_query($connect, $sql)
    echo 'Record inserted successfully.';
else
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
*/

$sql="INSERT INTO  input(users_name ,users_email, users_mobile, users_dname, users_time) VALUES ('$_POST[users_name]','$_POST[users_email]','$_POST[users_mobile]','$_POST[users_dname]','$_POST[users_time]')";
if (mysqli_query($connect,$sql))
  {  echo "New User inserted......";
header('Location:home.html');}
else
  die('Error: ' . mysqli_error($connect));
  


mysqli_close($connect)


?>
