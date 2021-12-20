<?php 
include "config.php";
session_start();

if(isset($_SESSION["userid"])){

	$user1=$_SESSION["userid"];
}
if(isset($_SESSION["username"])){

	$username=$_SESSION["username"];
}
if(isset($_SESSION["auth"])){
$authenticated=$_SESSION["auth"];
}

$id=$_SESSION["userid"];
if(isset($_POST["save"])){
    $old=$_POST["old"];
    $new=$_POST["new"];
    $sql="select * from user where id=$id and password='$old'";
    $result=$connect->query($sql);
    $row=$result->fetch_assoc();
    if($row["password"]==$old){
        $sql="update user Set password='$new' where id=$id";
        if($connect->query($sql)===TRUE){
            $message="Password changed Succesfully";
        }
        else{
            $message="password Not Successfully Changed".$connect->error;
        }
    }else{
        $message="Incorrect old password";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title></title>
<link rel="stylesheet" href="https://
cdnjs.cloudflare.com/ajax/libs/font-
awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel ="stylesheet" href ="https://
maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/
bootstrap.min.css">
<link rel="stylesheet" href="adminpost.css">
<!-- jQuery library -->
<script src ="https://ajax.googleapis.com/ajax/
libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src ="https://cdnjs.cloudflare.com/
ajax/libs/popper.js/1.16.0/umd/
popper.min.js"></script>
<script async="" src="magazine.js"></script>
<!-- Latest compiled JavaScript -->
<script src ="https://maxcdn.bootstrapcdn.com/
bootstrap/4.4.1/js/bootstrap.min.js">
</script>
</head>
<body>
<nav class="navbar navbar-default navbar-expand-lg  navbar-light">
	<div class="navbar-header d-flex col">
		<a class="navbar-brand" href="index.php"><b>Orb</b>vibes</a>  		
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<ul class="nav navbar-nav">
          
			

			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Artists & Industry<b class="caret"></b></a>
				<ul class="dropdown-menu">
				<?php 
				$sql="select * from artist_and_industry";
				$result=$connect->query($sql);
				while($row=$result->fetch_assoc()){
				?>					
					<li><a href="#" class="dropdown-item"><?php echo$row["name"]?></a></li>
				<?php }?>
				</ul>
			</li>

			

			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Magazine<b class="caret"></b></a>
				<ul class="dropdown-menu">
                <li><a href="magazine.php" class="dropdown-item">All Magazine section</a></li>
				<?php 
				$sql="select * from post_type limit 5";
				$result=$connect->query($sql);
				while($row=$result->fetch_assoc()){
				?>					
					<li><a href="<?php echo $row["name"].".php"?>" class="dropdown-item"><?php echo$row["name"]?></a></li>
				<?php }?>
				</ul>
			</li>
            <li class="nav-item"><a href="#" class="nav-link">Knowlegde</a></li>
            
			
			<li class="nav-item"><a href="#" class="nav-link">NewsFeed</a></li>			
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Music<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#" class="dropdown-item">Gospel music</a></li>
					<li><a href="#" class="dropdown-item">Music Album</a></li>
					
					
				</ul>
			</li>
			<li class="nav-item active"><a href="#" class="nav-link"></a></li>
			<li class="nav-item"><a href="#" class="nav-link">Comedy Videos</a></li>
			<?php if(isset($authenticated)==true) {?>
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><span class="fa fa-user-o"> <?php echo $username;?><b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="artist.php?id=<?php echo $user;?>" class="dropdown-item">My Profile</a></li>
					<li><a href="#" class="dropdown-item">Get maximum visibility</a></li>
					<li><a href="profile.php" class="dropdown-item">Account Settings</a></li>
					<?php if($_SESSION["role_id"]==3) {?>
						<li><a href="article-dashboard.php" class="dropdown-item">My Articles</a></li>
					<?php } ?>
					<li><a href="#" class="dropdown-item">My Gigs</a></li>
					<li><a href="logout.php" class="dropdown-item">Log out</a></li>
				</ul>
			</li>
			<?php } else{?>
				<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><span class="fa fa-lock"> Login<b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="login.php" class="dropdown-item">Sign in</a></li>
					<li><a href="register.php" class="dropdown-item">Register</a></li>
					
				</ul>
			</li>
			<?php }?>
			
		</ul>		
		<ul class="nav navbar-nav navbar-right ml-auto">			
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-search"></i></a>
				<a data-toggle="dropdown" class="nav-link dropdown-toggle hide" href="#"><i class="fa fa-close"></i></a>
				<ul class="dropdown-menu">
					<li>
                        <form>
                            <div class="input-group search-box">								
                                <input type="text" id="search" class="form-control" placeholder="Search here...">
								<span class="input-group-btn">
									<button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
								</span>
                            </div>
                        </form>                        
					</li>
				</ul>
			
	</div>
</nav>
    <div class="white fcontainer">

        <div class="container">
        <p id="title" class="label mb-4"><?php echo $username;?>-profile</p>
            <div class="menu">
                <span class="bg-secondary rounded p-1 m-2"><a href="" class="text-white  text-decoration-none">View Profile</a></span>
        
                <span class="bg-secondary rounded p-1 m-2"><a href="" class="text-white  text-decoration-none">Account setting</a></span>
                <span class="bg-secondary rounded p-1 m-2"><a href="" class="text-white  text-decoration-none">payment</a></span>
            </div>
        <div class="row">
             <div class="col-12 col-md-3 profile-menu pt-4">
               
             <a href="profile.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Profile Info</a>
            
            <a href="music-set.html" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Music</a>
            <a href="video.html" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Video</a>
            <a href="photo.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Photo</a>
           
     
        <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Gigs</a>
        <a href="contact.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">contact info</a>
        <?php if($_SESSION["role_id"]==3) {?>
            <a href="article-dashboard.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Article</a>
            <?php } ?>
        
        <a href="email.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Email</a>
        <a href="password.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block active">password</a>
               
            </div>
            <div class="col-12 col-md-8 mt-sm-2">
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                <div class="col-12 col-sm-12 col-md-12 mx-auto">
                 <?php if(!empty($message)){
                     echo "<div class='bg-info mx-auto col-12 col-md-4'>".$message."</div>";
                 }?>
                    <div class="form-group ">
                        <label for="mobile">Old password</label>
                        <input type="text" name="old" class="form-control col-md-8 col-12" id="old" required>
                    </div>
                    <div class="form-group ">
                        <label for="mobile">New password</label>
                        <input type="text" name="new" class="form-control col-md-8 col-12" id="new" required>
                    </div>
                   <input type="submit"  class="btn btn-sm btn-outline-secondary" name="save" value="save">
                </div>
        
            </form>
        
    </div>
    
    </div>
</body>