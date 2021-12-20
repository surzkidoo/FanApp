<?php
session_start();
include "config.php";
if(isset($_SESSION["userid"])){

	$user=$_SESSION["userid"];

      $follow=1;
	    
}else{
    if(!isset($_SESSION["nouserid"])){
  $user= $_SESSION["nouserid"]=rand();
    }
    else{
        $user= $_SESSION["nouserid"];
    }
  $follow=0;
}
if(isset($_SESSION["username"])){

	$username=$_SESSION["username"];
}
if(isset($_SESSION["auth"])){
$authenticated=$_SESSION["auth"];
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
<link rel="stylesheet" href="index.css">
<!-- jQuery library -->
<script src ="https://ajax.googleapis.com/ajax/
libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src ="https://cdnjs.cloudflare.com/
ajax/libs/popper.js/1.16.0/umd/
popper.min.js"></script>
<script async="" src="index.js"></script>
<!-- Latest compiled JavaScript -->
<script src ="https://maxcdn.bootstrapcdn.com/
bootstrap/4.4.1/js/bootstrap.min.js">
</script>
</head>
<style type="text/css">

        .likec{
            color: rgb(19, 80, 194);
        }
        .likec span{
            color:black;
        }
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
		//end
		
		// when the user clicks on like
		$('.like').on('click', function(){
			var postid = $(this).data('id');
			 var   $post = $(this);
			$.ajax({
				url: 'like.php',
				type: 'post',
				data: {
					'userid': <?php echo $user;?>,
					'postid': postid
				},
				success: function(response){
                    var r=JSON.parse(response);                
					if(r.type==1){
                        $post.addClass("likec");
                        $post.children("span").text(r.nums);
                    }else{
                        $post.removeClass("likec");
                         $post.children("span").text(r.nums);
                    }
				},
				error:function(err){
				    alert("An error occur");
				}
			});
		});
		
		// when the user clicks on like
		$('.follow').on('click', function(){
		    var id=<?php echo $follow.";";?>
		    if (id==0) {
            window.location.href="login.php";
            
            }
		    else{
			var postid = $(this).data('id');
			var    follow = $(this);
    
			$.ajax({
				url: 'follow.php',
				type: 'post',
				data: {
					'follower':<?php echo $user;?>,
					'follow': postid
				},
				success: function(response){
                                   
					if(response==1){
                       
                        follow.html("<span  class=' fa fa-user-plus text-dark font-weight-bold active'> Follow</span>");
                    }else{
                        follow.html("<span  class=' fa fa-user text-dark font-weight-bold active'> UnFollow</span>");
                    }
				},
				error:function(err){
				    alert("An error occur while executing the operation");
				}
			});
		    }
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
				$x=0;
				while($row=$result->fetch_assoc()){
				    $x++;
				?>	
					<li><a href="<?php echo "directory.php?dir=".$x;?>" class="dropdown-item"><?php echo$row["name"]?></a></li>
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
					<li><a href="<?php echo strtolower($row["name"]).".php"?>" class="dropdown-item"><?php echo$row["name"]?></a></li>
				<?php }?>
				</ul>
			</li>
            <li class="nav-item"><a href="#" class="nav-link">Knowlegde</a></li>
            
			
			<li class="nav-item"><a href="newsfeed.php" class="nav-link">NewsFeed</a></li>			
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Music<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#" class="dropdown-item">Gospel music</a></li>
					<li><a href="#" class="dropdown-item">Music Album</a></li>
					
				</ul>
			</li>
			
			
			
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">videos<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="comedy-video.php" class="dropdown-item">Comedy skit</a></li>
					<li><a href="music-video.php" class="dropdown-item">Music Video</a></li>
					<li><a href="tv-show.php" class="dropdown-item">Tv-Show</a></li>
					
					
					
				</ul>
			</li>
			
			
			
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

<h3 class="font-weight-bold">Knowlegde</h3>
        <?php 
        	$sql="SELECT * from post left join user on post.Post_id = user.id where post_type=6 limit 5";


?>
<div class="container  mb-5">
    <span class="label   text-danger ">
		<hr>
		Lesson
    </span>
   
    <div class="row">
	<?php 
	$i=0;
	$result=$connect->query($sql);
	if($result->num_rows==0){
		echo "<h5 class='mx-auto col-6'>Post not Available in this category </h5>";
		
	}
	while($post=$result->fetch_assoc()){
		
	
	$i++;

	if($i==2){
	?>
        <div class="col-12 col-sm-12 col-md-3 m-1 conc ">
		<img src=<?php echo$post["post_img"] ;?> alt="" width="100%" >
		<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
		<p class="post-title"><a  class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
		
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
		<?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        
        </div>
	<?php }
		if($i==1){
	?>

        <div class="col-12 col-sm-12  col-md-5 m-1 conc">
        <img src="<?php echo$post["post_img"] ;?>" class="img-fluid" alt="" width="100%" >
		<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
		<p class="post-title "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
		<p class="post-con d-none d-md-block"><?php echo substr($post["post_content"],0,200)?>...</p>
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
        <?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        </div>
		
		<?php }
		if($i==3){
	?>
        <div class="col-12 col-sm-12 col-md-3 m-1 conc">
            <img src="<?php echo$post["post_img"] ;?>" alt="" width="100%" >
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
            <?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        </div>
		<?php }
		if($i==4){
	?>

		<div class="col-md-5 img conc m-2">
			<img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
            <?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        </div>
		<?php }
			if($i==5){
		?>
		 <div class="col-md-5 img conc m-2">
			 <img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			 <span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			 <p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			 <p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
             <?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        </div>
		  <?php }
			}
		?>
	</div>

		<p class="float-right"><a href="lesson.php?id=1" class="btn btn-outline-danger">More News</a></p>
 

		<br>
		<br>
		<hr>
	</div>
	

	
	
	




	<?php
		
		
		$sql="SELECT * from post left join user on post.Post_id = user.id where post_type=7 limit 5";

		
		
		?>
<div class="container  mb-5">
    <span class="label   text-danger ">
		<hr>
		Overview
	
	
    </span>
   
    <div class="row">
	<?php 
	$i=0;
	$result=$connect->query($sql);
	if($result->num_rows==0){
		echo "<h5 class='mx-auto col-6'>Post not Available in this category </h5>";
		
	}
	while($post=$result->fetch_assoc()){
		
	
	$i++;

	if($i==2){
	?>
        <div class="col-12 col-sm-12 col-md-3 m-1 conc ">
		<img src=<?php echo$post["post_img"] ;?> alt="" width="100%" >
		<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
		<p class="post-title"><a  class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
		
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
        <?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        </div>
	<?php }
		if($i==1){
	?>

        <div class="col-12 col-sm-12  col-md-5 m-1 conc">
        <img src="<?php echo$post["post_img"] ;?>" class="img-fluid" alt="" width="100%" >
		<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
		<p class="post-title "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
		<p class="post-con d-none d-md-block"><?php echo substr($post["post_content"],0,200)?>...</p>
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
        <?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        </div>
		
		<?php }
		if($i==3){
	?>
        <div class="col-12 col-sm-12 col-md-3 m-1 conc">
            <img src="<?php echo$post["post_img"] ;?>" alt="" width="100%" >
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
            <?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        </div>>
		<?php }
		if($i==4){
	?>

		<div class="col-md-5 img conc m-2">
			<img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
            <?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        </div>
		<?php }
			if($i==5){
		?>
		 <div class="col-md-5 img conc m-2">
			 <img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			 <span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			 <p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			 <p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
             <?php $lik=$connect->query("select * from like_table where post_id=".$post["post_id"]);
		 $like=$lik->num_rows;?>
    		<span data-id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up like"><span><?php echo $like ?></span></span>
        </div>
		  <?php }
			}
		?>
	</div>


   
		<p class="float-right"><a href="overview.php?id=1" class="btn btn-outline-danger">More Overview</a></p>
   

		<br>
		<br>
		<hr>
	</div>
	

	
	
	






	<?php
	
	
	$sql="SELECT * from post left join user on post.Post_id = user.id where post_type=8 limit 5";

 ?>
<div class="container  mb-5">
    <span class="label   text-danger ">
		<hr>	
    Resource
    </span>
   
    <div class="row">
	<?php 
	$i=0;
	$result=$connect->query($sql);
	if($result->num_rows==0){
		echo "<h5 class='mx-auto col-6'>Post not Available in this category </h5>";
		
	}
	while($post=$result->fetch_assoc()){
		
	
	$i++;

	if($i==2){
	?>
        <div class="col-12 col-sm-12 col-md-3 m-1 conc ">
		<img src=<?php echo$post["post_img"] ;?> alt="" width="100%" >
		<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
		<p class="post-title"><a  class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
		
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
		<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>
        </div>
	<?php }
		if($i==1){
	?>

        <div class="col-12 col-sm-12  col-md-5 m-1 conc">
        <img src="<?php echo$post["post_img"] ;?>" class="img-fluid" alt="" width="100%" >
		<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
		<p class="post-title "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
		<p class="post-con d-none d-md-block"><?php echo substr($post["post_content"],0,200)?>...</p>
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
		<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>
		</div>
		
		<?php }
		if($i==3){
	?>
        <div class="col-12 col-sm-12 col-md-3 m-1 conc">
            <img src="<?php echo$post["post_img"] ;?>" alt="" width="100%" >
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
			<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>
		</div>
		<?php }
		if($i==4){
	?>

		<div class="col-md-5 img conc m-2">
			<img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
			<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>     
		 </div>
		<?php }
			if($i==5){
		?>
		 <div class="col-md-5 img conc m-2">
			 <img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			 <span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			 <p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			 <p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["fullname"]?></a></p>
			 <span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>        
		  </div>
		  <?php }
			}
		?>
	</div>

		<p class="float-right"><a href="resource.php?id=1" class="btn btn-outline-danger">More Resource</a></p>
  
		
		<br>
		<br>
		<hr>
	</div>
	

	</div>
	
	</div>

    </div>
        </div>