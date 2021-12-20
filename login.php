<?php
include "config.php";
 session_start();?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>orbvibes | Login</title>
<link rel="stylesheet" href="https://
cdnjs.cloudflare.com/ajax/libs/font-
awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel ="stylesheet" href ="https://
maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/
bootstrap.min.css">
<link rel="stylesheet" href="index.css">
<!-- jQuery library -->
<script src ="https://ajax.googleapis.com/ajax/
libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src ="https://cdnjs.cloudflare.com/
ajax/libs/popper.js/1.16.0/umd/
popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src ="https://maxcdn.bootstrapcdn.com/
bootstrap/4.4.1/js/bootstrap.min.js">
</script>
</head>
<body >
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

<?php if(!empty($_SESSION["success"]) ){
        
    ?>
    <p class='alert alert-success'><?php echo $_SESSION["success"];?></p>
    <?php
    unset($_SESSION["success"]);
        } 

    else if(!empty($_SESSION["error"])){
        ?>
        <p class='alert alert-danger text-center'><?php echo $_SESSION["error"];?></p>
        
        <?php
        unset($_SESSION["error"]);
    }?>
    <div class="col-md-4 col-12 mx-auto">
   
    <form class="form-horizontal" role="form" method="post" action="loginscript.php">
    <div class="form-group">
        <label for="username" class="col-md-12 control-label">Email <i class="fa fa-user"></i></label>
        <div class="col-md-12">
            <input type="text" name="email" class="form-control" id="username" placeholder="Enter your username" required>
        </div>
    </div>
    <div class="form-group">
        
        <label for="username" class="col-md-12">Password <i class="fa fa-lock"></i></label>
        <div class="col-md-12">
        
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
        </div>
    </div>
    <div class="checkbox col-md-12">
       
    </div>
    <p class="col-md-12">if you don't have an account <a href="register.php">Register here</a></p>
    <div class="col-md-12">
    <input type="submit" value="Login" class="col-12 btn btn-outline-danger">
    </div>
    </form>
   
    </div>
</div>
</div>
</body>