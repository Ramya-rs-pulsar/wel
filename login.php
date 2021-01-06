<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$email=$_POST['email'];
	$password=$_POST['password'];
}
$server="localhost";
$user="root";
$pw="";
$db="sample";
$conn=new mysqli($server,$user,$pw,$db);
if($conn->connect_error)
{
	die("connection failed:" .$conn->connect_error);
}
else
{
	$sql="select email,password from register where email='$email' and password='$password'";
	$result=$conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc())
		{
			if($email==$row['email']&&$password==$row['password'])
			{
				echo '<script>window.alert("login successfully")</script>';
				echo '<script>setTimeout(function(){window.location.href="search.html"},100);</script>';
				$_SESSION=$row['email'];
				$_SESSION=$row['password'];
			}
			
		}
	
	}
	else
	{
	echo '<script>window.alert("login failed")</script>';
	echo '<script>setTimeout(function(){window.location.href="login.html"},100);</script>';
	}
	

}
$conn->close();
?>
		