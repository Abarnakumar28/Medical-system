
<?php
// Connect to the database
$host="localhost";
$user="root";
$password="";
$connect=mysqli_connect($host,$user,$password,"my_hospital");
if(mysqli_connect_errno($connect))
{
 echo 'Failed to connect***';
}
else
{
	echo 'Connection to db - Success...';
}

// Grab User submitted information
$email = $_POST["user_email"];
$pass = $_POST["user_pass"];

print("<br>");
print("<br>");
echo 'Your Mail-id is  ';
print( "$email" ); 
print("<br>");
echo 'Your Password is  ';
echo "$pass";
print("<br>");

$result = mysqli_query($connect,"SELECT user_email, user_pass FROM admin");

print("<br>");
$flag = 0;
while($row = mysqli_fetch_row($result))
{
	if($email==$row[0] && $pass==$row[1])
	{
		$flag = 1;
		break;
	}
}
 
print("<br>");
if ($flag==1)
{	echo "You are a validated user.";
	header('Location:a.php');
}
else
	echo "Sorry, your credentials are not valid, Please try again.";

?> 
                                                                  
