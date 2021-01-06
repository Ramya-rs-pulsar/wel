<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$blood=$_POST['blood'];
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
	$sql="select*from register where blood='$blood'";
	$result=$conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc())
		{
			echo '<table>';
			echo '<tr><td>NAME:'.$row['name'].'</td></tr>';
			echo '<tr><td>MAIL:'.$row['email'].'</td></tr>';
			echo '<tr><td>MOBILE NO:'.$row['mobno'].'</td></tr>';
			echo '<tr><td>BLOOD:'.$row['blood'].'</td></tr>';
		}
		echo '</table>';
	}
	else{
		echo 'The patient has no details to display';
	}
	echo '<br>';
	echo '<br>';
	echo "<button onclick='func();'>'EXIT'</button>";
	echo '<script>
	function func()
	{
		window.location.href="login.html";
	}
	</script>';
}
$conn->close()
?>
	
			