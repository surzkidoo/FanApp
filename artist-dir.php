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


$magazine="all";
$country="all";

if(isset($_POST["magazine"]) && isset($_POST["country"])){
$magazine=$_POST["magazine"];
$country=$_POST["country"];

if($magazine=="all" && $country!="all"){
	$sql="SELECT * from post left join user on post.user_id = user.id where  post_country_id=$country limit 5";
	
}
elseif($magazine!="all" && $country=="all"){

		$sql="SELECT * from post left join user on post.user_id = user.id where post_type=$magazine limit 5";
	}
elseif($magazine!="all" && $country!="all"){
	$sql="SELECT * from post left join user on post.user_id = user.id where post_country_id=$country post_type=$magazine limit 5";
}
else{
	$magazine="all";
	$country="all";
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
<link rel="stylesheet" href="magazine.css">
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
		<a class="navbar-brand" href="#">Brand<b>Name</b></a>  		
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
          
			<li class="nav-item"><a href="#" class="nav-link">Artists & Industry</a></li>
			<li class="nav-item"><a href="#" class="nav-link">Magazine</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Knowlegde</a></li>
            
			<li class="nav-item"><a href="#" class="nav-link">Music</a></li>
			<li class="nav-item"><a href="#" class="nav-link">NewsFeed</a></li>			
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Services <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="#" class="dropdown-item">Web Design</a></li>
					<li><a href="#" class="dropdown-item">Web Development</a></li>
					<li><a href="#" class="dropdown-item">Graphic Design</a></li>
					<li><a href="#" class="dropdown-item">Digital Marketing</a></li>
				</ul>
			</li>
			<li class="nav-item active"><a href="#" class="nav-link"></a></li>
			<li class="nav-item"><a href="#" class="nav-link">Artists & Industry</a></li>
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Login<b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="#" class="dropdown-item">Web Design</a></li>
					<li><a href="#" class="dropdown-item">Web Development</a></li>
					<li><a href="#" class="dropdown-item">Graphic Design</a></li>
					<li><a href="#" class="dropdown-item">Digital Marketing</a></li>
				</ul>
			</li>
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


    
    
    <hr>
    <p class="label">Magazine</p>
        <form class="contact" method="post" action="<?php echo$_SERVER["PHP_SELF"]?>">
            
            <select name="magazine" id="" required>
                
				<option value="all" selected>All magazine Section</option>
				<option value="1" >News</option>
				<option value="2" >Reviews</option>
				<option value="3" >Features</option>
				<option value="4" >Theme</option>
				
            </select>
				<span class="pl-2">in</span>
            <select name="country" id="" required>
			<option value="all" selected>All country</option>
			   <?php 
				 $csql="select country_id,name from country";
				 $row=$connect->query($csql);
				 while($ccountry=$row->fetch_assoc()){
			   ?>

				<option value="<?php echo $ccountry["country_id"];?>" ><?php echo $ccountry["name"];?></option>
				 <?php }?>
            </select>
            
         
        
            <input type="submit" value="search">
          
        </form>
        
       
		<hr>
		<div class="white fcontainer">

	<?php if($magazine=="all" || $magazine=="1"){ ?>

			
<div class="container  mb-5">
    <span class="label   text-danger ">
		<hr>
		<?php
		$sqlm="select * from post_type where id=$magazine";
		$mag=$connect->query($sqlm);
		$mag=$mag->fetch_assoc();
		echo$mag["name"];
		?>
    </span>
   
    <div class="row">
	<?php 
	$i=0;
	
	$sql="SELECT * from post left join user on post.user_id = user.id order  by post.created_on limit 2";
	
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
		
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
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
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
		<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>
		</div>
		
		<?php }
		if($i==3){
	?>
        <div class="col-12 col-sm-12 col-md-3 m-1 conc">
            <img src="<?php echo$post["post_img"] ;?>" alt="" width="100%" >
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
			<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>
		</div>
		<?php }
		if($i==4){
	?>

		<div class="col-md-5 img conc m-2">
			<img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
			<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>     
		 </div>
		<?php }
			if($i==5){
		?>
		 <div class="col-md-5 img conc m-2">
			 <img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			 <span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			 <p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			 <p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
			 <span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>        
		  </div>
		  <?php }
			}
		?>
	</div>


		<p class="float-right"><a href="#" class="btn btn-outline-danger">View category</a></p>

		<br>
		<br>
		<hr>
	</div>
	
	</div>
		<?php } ?>

		<?php if($magazine=="all" || $magazine=="2"){ ?>
	<div class="container  mb-5">
    <span class="label   text-danger ">
		<hr>
		<?php
		$sqlm="select * from post_type where id=$magazine";
		$mag=$connect->query($sqlm);
		$mag=$mag->fetch_assoc();
		echo$mag["name"];
		?>
    </span>
   
    <div class="row">
	<?php 
	$i=0;
	
	$sql="SELECT * from post left join user on post.Post_id = user.id order  by post.created_on limit 5";

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
		
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
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
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
		<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>
		</div>
		
		<?php }
		if($i==3){
	?>
        <div class="col-12 col-sm-12 col-md-3 m-1 conc">
            <img src="<?php echo$post["post_img"] ;?>" alt="" width="100%" >
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
			<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>
		</div>
		<?php }
		if($i==4){
	?>

		<div class="col-md-5 img conc m-2">
			<img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
			<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>     
		 </div>
		<?php }
			if($i==5){
		?>
		 <div class="col-md-5 img conc m-2">
			 <img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			 <span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			 <p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			 <p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
			 <span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>        
		  </div>
		  <?php }
			}
		?>
	</div>


		<p class="float-right"><a href="#" class="btn btn-outline-danger">View category</a></p>

		<br>
		<br>
		<hr>
	</div>
		</div>

	<div class="container  mb-5">
    <span class="label   text-danger ">
		<hr>
		<?php
		$sqlm="select * from post_type where id=$magazine";
		$mag=$connect->query($sqlm);
		$mag=$mag->fetch_assoc();
		echo$mag["name"];
		?>

    </span>
   
    <div class="row">
	<?php 
	$i=0;
	
	$sql="SELECT * from post left join user on post.Post_id = user.id order  by post.created_on limit 5";
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
		
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
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
		<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
		<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>
		</div>
		
		<?php }
		if($i==3){
	?>
        <div class="col-12 col-sm-12 col-md-3 m-1 conc">
            <img src="<?php echo$post["post_img"] ;?>" alt="" width="100%" >
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
			<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>
		</div>
		<?php }
		if($i==4){
	?>

		<div class="col-md-5 img conc m-2">
			<img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			<span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			<p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			<p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
			<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>     
		 </div>
		<?php }
			if($i==5){
		?>
		 <div class="col-md-5 img conc m-2">
			 <img src="<?php echo$post["post_img"] ;?>" class="img-fluid float-left mr-2 " width="30%" alt="">
			 <span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
			 <p class="post-title-sm "><a class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
			 <p class="postby ">by <a href="#" class="text-decoration-none "><?php echo $post["stagename"]?></a></p>
			 <span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up"> 11</span>        
		  </div>
		  <?php }
			}
		?>
	</div>


		<p class="float-right"><a href="#" class="btn btn-outline-danger">View category</a></p>

		<br>
		<br>
		<hr>
	</div>
	<?php } ?>

	</div>