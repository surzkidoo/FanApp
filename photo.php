<?php include "config.php";
session_start();


if(isset($_SESSION["userid"])){

	$user=$_SESSION["userid"];
}
if(isset($_SESSION["username"])){

	$username=$_SESSION["username"];
}
if(isset($_SESSION["auth"])){
$authenticated=$_SESSION["auth"];
}

if(isset($_POST["upload"])){

    if(is_uploaded_file($_FILES["profilepic"]["tmp_name"])){
        $target_dir="images/user-picture/";
        $target_file=$target_dir."l".time().basename($_FILES["profilepic"]["name"]);
        $imagetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        
           
            if($_FILES["profilepic"]["size"]>6000000){
               $upload=0;
                $imessage="Sorry the file is too large <br>";
            }
            if($imagetype!="jpg" || $imagetype!="png" || $imagetype!="jpeg" || $imagetype!="gif"){
                $upload=0;
                $imessage="Sorry the file is too large <br>";
            }
           
               
            if(move_uploaded_file($_FILES["profilepic"]["tmp_name"],$target_file)){
                    $imessage="image uploaded successfully";
                }
                $profilepic=$target_file;
                
                $sql="insert into photo(user_id,photo_link) values($user,'$profilepic')";

                 $connect->query($sql);
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
<link rel="stylesheet" href="index.css">
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
		<a class="navbar-brand" href="#"><b>Orb</b>vibes</a>  		
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
            <span class="bg-secondary rounded p-1 m-2"><a href="artist.php?id=<?php echo $user;?>" class="text-white  text-decoration-none">View Profile</a></span>
        
        <span class="bg-secondary rounded p-1 m-2"><a href="profile.php" class="text-white  text-decoration-none">Account setting</a></span>
        <span class="bg-secondary rounded p-1 m-2"><a href="payment.html" class="text-white  text-decoration-none">payment</a></span>
            </div>
        <div class="row">
             <div class="col-12 col-md-3 profile-menu pt-4">
               
             <a href="profile.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Profile Info</a>
            
            <a href="music-set.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Music</a>
            <a href="video.html" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Video</a>
            <a href="photo.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block active">Photo</a>
           
     
        <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Gigs</a>
        <a href="contact.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">contact info</a>
        <?php if($_SESSION["role_id"]==3) {?>
            <a href="article-dashboard.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Article</a>
            <?php } ?>
        
        <a href="email.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Email</a>
        <a href="password.php" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">password</a>

            </div>
            <div class="col-12 col-md-8 mt-sm-2">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
        <div class="form-group">
                    <label for="profilepic">Profile Photo<span class="text-danger">*</span></label>
                    <input type="file"  class="" name="profilepic" id="profilepic" >
                    <p class="mt-3">
                        Files must be less than 6 MB.<br>
                        Allowed file types: png gif jpg jpeg.<br>
                            
                        Images must be larger than 400x400 pixels. <br>
                    </p>
                </div>
                <input type="submit" name="upload" value="upload" >
                </form>
        
    </div>
    
    </div>
</body>