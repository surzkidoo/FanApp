<?php include "config.php";

session_start();
if(isset($_SESSION["userid"])){

	$id=$_SESSION["userid"];
}
if(isset($_SESSION["username"])){

	$username=$_SESSION["username"];
}
if(isset($_SESSION["auth"])){
$authenticated=$_SESSION["auth"];
}

if(empty($_GET["slug"]) || empty($_GET["id"])){
    header('location: index.php');
}

$slug=$_GET["slug"];
$post_id=$_GET["id"];
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
<link rel="stylesheet" href="view-post.css">
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


<?php 
	
	$sql="SELECT * from post left join user on post.user_id = user.id  where post.post_id=$post_id";
	$result=$connect->query($sql);
    $post=$result->fetch_assoc();
	
	?>
<div class="white fcontainer">

<div class="container">
    <p id="title" class="label"><?php echo$post["post_title"];?></p>
    <div class="row">
        <div class="col-12 col-md-8 main">
            <img src="<?php echo$post["image"];?>" alt="" class="rounded-circle" width="60px"><span id="poster-name">By <a class="text-decoration-none text-danger" href="artist.php?id=<?php echo $post["id"]; ?>"><?php echo$post["stagename"];?></a></span><span class="fa fa-clock-o " id="time"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
           


            <?php 
		$ccsql="select * from country where country_id=".$post["post_country_id"];
		$resultt=$connect->query($ccsql);
		$contact=$resultt->fetch_assoc();
		?>
		<img src="<?php echo $contact["image_link"] ?>" width="30px"  class="float-right" alt="">

        <img src="<?php echo$post["post_img"];?>" alt="" sizes="" width="100%" height="400px">
        <?php if(!empty($post["img_cap"])){?>

        <div class="text-secondary"><span class="fa fa-image"></span><span id="imgcaption"><?php echo$post["img_cap"];?></span></div>
        <?php }?>
        <div id="post-content" class="mt-3"><?php echo$post["post_content"];?>
        </div>
        <div class="handler mt-2">
           
            <span id="like" class="fa fa-thumbs-up label"> 11</span>
        </div>
    </div>
        <div class="col-6 mx-auto col-md-3 ">
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
<div class="container  my-5">
    <span class="label   text-danger ">
       
        Related articles
        
    </span>
   <?php 
    $sql="SELECT * from post left join user on post.user_id = user.id  where post.post_id!=$post_id limit 5";
    $result=$connect->query($sql);
   
   ?>
    <div class="row">

    <?php   while($post=$result->fetch_assoc()){?>
        <div class="col-5 col-sm-5 col-md-3 col-lg-2 m-1 p-0 conc ">
        <img src="<?php echo $post["post_img"];?>" alt="" width="100%" >
        <div class="sect"> 
        <span class="fa fa-clock-o " id="time"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
        <p class="post-title"><a  class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
        <p class="postby ">by <a class="text-decoration-none text-dark" href="artist.php?id=<?php echo $post["id"]; ?>"><?php echo $post["stagename"]?></a></p>
        <span class="fa fa-thumbs-up"> 11</span>
        </div>
     </div>
    <?php }?>    
    
       
       
         
    </div>


    </div>
    <div class="container comment">
   
    <p class="label">Comment</p>
    <hr>
    <?php 
    $sql="SELECT * from comment left  join post on post.post_id =comment.post_id
     left join user on user.id=comment.user_id where comment.post_id=$post_id ";
    $result=$connect->query($sql);
   
     while($comment=$result->fetch_assoc()){ ?>

    <div class="commenter">
        
        <img src=<?php echo $comment["image"]?> alt="" class="rounded-circle ml-1 mr-1" width="50px">
      <span id="commenter-name ml-1 mr-1"><?php echo $comment["stagename"]?></span>  <br><span class="fa fa-clock-o ml-2" id="time">
        <?php echo date("d-M-y h:ia",date_timestamp_get(date_create($comment['comment_on']))); ?></span>
        <p class="comment-text ml-3">
        <?php echo $comment["comment_content"]?>
        </p>
        <hr>
    </div>
     <?php }?>
    <!--commnet  reply -->
    
     <!--commnet  reply -->
     <?php if(!empty($id)) {?>
    <div class="comment-input">
        <form method="post" action="comment.php">
            <input type="hidden" name="post_id" value="<?php echo $post_id;?>">
            <input type="hidden" name="user_id" value="<?php echo $id?>">
            <input type="hidden" name="slug"    value="<?php echo $slug;?>">
            <textarea name="comment" id="" cols="50" rows="10" class="" required></textarea>
            <input type="submit" value="post" class="btn col-2 mt-2 btn-outline-success d-block">
        </form> 
    </div>
     <?php  } else {?>
        <a href="login.php" class=" btn-info btn btn-sm">Login to comment</a>
     <?php }?>
    </div>
	</div>