<?php
session_start();
?>
<?php
include('function.php');
if(isset($_SESSION['uname1']))
{
$uname1=$_SESSION['uname1'];
$query4="select * from reg where Name like '$uname1' ";
$con4=con();
$res4=$con4->query($query4);
if($res4->num_rows==0){
header("location:signin2.php");
} 
	while($arr=$res4->fetch_array()){
		
		 $id=$arr['Customer_Id'];
			$_SESSION['id']=$id;
			$name=$arr['Name'];
		
	}
}
			?>
<html>
<head>
<meta charset="utf-8">
<title>SignIn</title>
<link href="signin2.css" type="text/css" rel="stylesheet"/>
<link href="main.css" type="text/css" rel="stylesheet"/>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/aladin:n4:default.js" type="text/javascript"></script>
</head>


<body>
<header class="mainhead"><p><img src="Images/Shopping-Cart-icon123123.png" width="150" height="150">&nbsp;&nbsp;<img src="Images/icon.png"></p>
	<div class="userinfo"><p><?php 
	if(isset($_SESSION['uname1']))
echo "Welcome"." $name" ;
else
echo "Welcome Guest" ;?>&nbsp;&nbsp;<img src="Images/avatar_2x.jpg" height="30" width="30"></p></div>
</header>
<hr>



<nav>
<ul>
	<li><a href="mainpage.php">Home</a></li>
	<li><a href="categories.php">Categories</a>
    <div class="submenu">
		<ul>
        	<div class="submenuitem"><li><a href="electronics.php">Electronics</a></li></div>
			<div class="submenuitem"><li><a href="fashion.php">Fashion & Lifestyle</a></li></div>
			<div class="submenuitem"><li><a href="books.php">Books</a></li></div>
			<div class="submenuitem"><li><a href="sports.php">Sports</a></li></div>

        </ul>
        </div>
	</li>
	<li><?php 
	if(isset($_SESSION['uname1']))
	{
	 ?>
<a href="logout.php">Logout</a><?php ;
	
	
	
	}
else {?>
<a href="signin.php">Sign In</a><?php ;}?></li>
	<li><a href="signup.php">Sign Up</a></li>
	<li><a href="customercare.php">Customer Care</a></li>
</ul>
</nav>

<div class="info">
	<p>Wrong Credentials !!!</p>
</div>


<form action="signed.php" method="post" name="buynow" >
<table width="500px" height="423" align="center" class="signintable">
<tr><td colspan="2" height="200px" align="center"><img src="Images/avatar_2x.jpg"></td></tr>
<tr><td height="50px" align="center" width="33%" style="padding-left:100px" ><font face="Comic Sans Ms" size="+2">Username:</font></td><td height="50px" align="center" width="66%"><input  type="text" name="uname1" required  style="margin-right:120px"></td></tr>
<tr><td height="50px" align="center" width="33%" style="padding-left:100px"><font face="Comic Sans Ms" size="+2">Password:</font></td><td height="50px" align="center" width="66%"><input  type="password" name="password1" required  style="margin-right:120px"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Log In"></td></tr>
<tr><td colspan="2" align="center" height="30px">New User?&nbsp;<a href="signup.html" style="text-decoration:none">Click Here</a></td></tr>
</table>
</form>

<hr>
<footer>
Copyright &copy; 2015-2020 Clueless Idiots. 
</footer>

</body>
</html>
