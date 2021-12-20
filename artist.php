<?php include "config.php";
session_start();
if(isset($_SESSION["userid"])){

	$userid=$_SESSION["userid"];
}
if(isset($_SESSION["username"])){

	$username=$_SESSION["username"];
}
if(isset($_SESSION["auth"])){
$authenticated=$_SESSION["auth"];
}

$id=$_GET["id"];

$sql="Select * from user where id=$id";
$result=$connect->query($sql);
$user=$result->fetch_assoc();
if(empty($user)){
	header("location:index.php");
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
<link rel="stylesheet" href="artist.css">
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
<style type="text/css">
	
</style>
<script type="text/javascript">
	$(document).ready(function(){
		var dropdown = $(".navbar-right .dropdown");
		var toogleBtn = $(".navbar-right .dropdown-toggle");
		
		// Toggle search and close icon for search dropdown
		dropdown.on("show.bs.dropdown", function(e){
			toogleBtn.toggleClass("hide");
		});
		dropdown.on("hide.bs.dropdown", function(e){
			toogleBtn.addClass("hide");
			toogleBtn.first().removeClass("hide");
		});
	});
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
	<p id="title" class="label mb-4"><?php echo $user["fullname"]?></p>
	<?php if($id==$_SESSION["userid"]){ ?>
    <div class="menu mb-3">
        <span class="bg-secondary rounded p-1 m-2"><a href="" class="text-white  text-decoration-none">View Profile</a></span>

        <span class="bg-secondary rounded p-1 m-2"><a href="" class="text-white  text-decoration-none">Account setting</a></span>
	</div>
			<?php }?>
<div class="row">
     <div class="col-12 col-md-4 main">
        
        <img src="<?php echo $user["image"]?>" alt="" sizes="" class="mb-3 img-fluid rounded" width="100%" height="200px">
        <button class="btn btn-dark col-3"><span class="fa fa-envelope text-center"></span></button>
        <button class="btn btn-dark col-7"><span class="fa fa-user-plus"></span> Follow</button>

        <div class="mt-3 mb-2">
		<?php 
		$ccsql="select * from country where country_id=".$user["country_id"];
		$result=$connect->query($ccsql);
		$contact=$result->fetch_assoc();
		?>
            <img src="<?php echo$contact["image_link"] ?>" alt="" width="30px" height="20px">
            <span ><?php echo $contact["name"];?></span>
        
        </div>
       
		<span class="border p-2">operation since: <?php echo $user["operation"]?></span>
		<?php 
		$csql="select * from social_media where user_id=$id";
		$result=$connect->query($csql);
		$contact=$result->fetch_assoc();
		?>
		<div class="social mt-3">
		<?php if(!empty($contact["mobile-number"])){?>
		<p><span class="fa s text-dark fa-phone"></span><?php echo $contact["mobile-number"];?></p>
		<?php } ?>


		<?php if(!empty($user["email"])){?>
		<p><span class="fa s text-dark fa-envelope"></span><?php echo $user["email"];?></p>
		<?php } ?>

		<?php if(!empty($contact["facebook"])){?>
		<a href="<?php echo $contact["facebook"];?>"><span class="fa s fa-facebook"></span></a>
		<?php } ?>

		<?php if(!empty($contact["twitter"])){?>
			<a href="<?php echo $contact["twitter"];?>"><span class="fa s fa-twitter"></span></a>
		<?php } ?>
			
			<?php if(!empty($contact["website"])){?>
            <a href="<?php echo $contact["website"];?>"><span class="fa s fa-globe"></span></a>
					<?php } ?>
		</div>
    </div>
        <div class="col-12 col-md-5 mt-sm-2">
            <p class="font-weight-bold">
                Bio
            </p>
            <p id="bio-label">
			    <?php echo $user["bio"]?>
			</p>
			<hr>
		<p class="font-weight-bold ">Posts</p>
		<div class="post-section">
			<?php 
			$sqll="select * from post where user_id=$id order by created_on desc";
			$re=$connect->query($sqll);
			while($post=$re->fetch_assoc()){
			?>
			<a class="text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>">
			<div class="conc my-3">
			<img src="<?php echo $post["post_img"];?>" width=30% height=100% alt="">
			<span class="fa fa-clock-o " id="time"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			
			<p class=""><?php echo $post["post_title"]; ?></p>
			
			
			</div>
			</a>
			<?php }?>
		</div>
		<?php 
		$sqlp="select * from photo where user_id=$id";
		$resultp=$connect->query($sqlp);
		if($resultp->num_rows>0){
		?>
		<p class="font-weight-bold mt-4">Photos</p>
		<div class="row ">
			<?php
			while($photo=$resultp->fetch_assoc()){ ?>
			<div class="col-8 mx-auto col-md-5">
				<img src="<?php echo $photo["photo_link"]; ?>" width="100%" alt="">
				
			</div>
			<?php }?>
			
				
			</div>
		
			<?php }?>


			<!-- videos-->
			<?php 
		$sqlp="select * from photo where user_id=$id";
		$resultp=$connect->query($sqlp);
		if($resultp->num_rows>0){
		?>
		<p class="font-weight-bold mt-4">Video</p>
		<div class="row ">
			<?php
			while($photo=$resultp->fetch_assoc()){ ?>
			<div class="col-8 mx-auto col-md-5">
				<img src="<?php echo $photo["photo_link"]; ?>" width="100%" alt="">
				
			</div>
			<?php }?>
			
				
			</div>
		
			<?php }?>
			
        </div>

        <div class="col-8 mx-auto col-md-3 ">
		<?php 
		$fsql="select follower_id ,image,id from follow left join user on user.id=follower_id where follows_id=$id";
		$fresult=$connect->query($fsql);
		
		?>
		
		<p class="font-weight-bold">Follower(<?php echo $fresult->num_rows;?>)</p>
		<div>
		<?php	while($follow=$fresult->fetch_assoc()){ ?>
	
			<a href="artist.php?id=<?php echo $follow["id"]; ?>"><img src="<?php echo $follow["image"]?>" width="60px" class="rounded-circle" alt=""></a>
		
		<?php }?>
		</div>
		<?php if ($fresult->num_rows!=0 && $fresult->num_rows>5 ){ ?>
		<a class="btn btn-secondary btn-sm col-12 m-2" href=""> view all</a>
		<?php }?>
		<?php 
		$fsql="select follows_id ,image,id from follow left join user on user.id=follows_id where follower_id=$id";
		$fresult=$connect->query($fsql);
		
		?>
		<p class="font-weight-bold mt-1 mb-0">Following(<?php echo $fresult->num_rows;?>)</p>
		<div>
		<?php	while($follow=$fresult->fetch_assoc()){ ?>
			<a href="artist.php?id=<?php echo $follow["id"]; ?>"><img src="<?php echo $follow["image"]?>" width="60px" class="rounded-circle" alt=""></a>
			
			<?php }?>
		</div>

		<?php if ($fresult->num_rows!=0  && $fresult->num_rows>5  ) {?>
		<a class="btn btn-secondary btn-sm col-12 m-2" href=""> view all</a>
		<?php }?>
		<div class="advert-section border mt-3">
			<span class="border m-2">advert</span>
			<a href="#">
			<img src="11.jpg" width="100%" height="90%" alt="">
			</a>
			<a href="">adlink</a>
			</div>
			
        </div>
	</div>
	

</div>
</div>
