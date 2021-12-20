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
<title>Home | Orvibes</title>
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
				$sql="select * from post_type limit 3";
				$result=$connect->query($sql);
				while($row=$result->fetch_assoc()){
				?>					
					<li><a href="<?php echo strtolower($row["name"]).".php"?>" class="dropdown-item"><?php echo$row["name"]?></a></li>
				<?php }?>
				</ul>
			</li>
            <li class="nav-item"><a href="knowlegde.php" class="nav-link">Knowlegde</a></li>
            
			
			<li class="nav-item"><a href="newsfeed.php" class="nav-link">NewsFeed</a></li>			
			<li class="nav-item"><a href="music.php" class="nav-link">Music</a></li>

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
					<li><a href="payment-type.php" class="dropdown-item">Get maximum visibility</a></li>
					<li><a href="profile.php" class="dropdown-item">Account Settings</a></li>
					<?php if($_SESSION["role_id"]==3) {?>
						<li><a href="article-dashboard.php" class="dropdown-item">My Articles</a></li>
					<?php } 
					if($_SESSION["role_id"]!=4){
					?>
					<li><a href="gig-dashboard.php" class="dropdown-item">My Gigs</a></li>
					<?php } ?>
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
                        <form method="get" action="search.php">
                            <div class="input-group search-box">								
                                <input type="text" id="search"  name="input" class="form-control" placeholder="Search here...">
								<span class="input-group-btn">
								<button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i></button>
								</span>
                            </div>
                        </form>                        
					</li>
				</ul>
			
	</div>
</nav>
<div class="white fcontainer">
<!-- advert-->

<!-- advert-end-->
<div class="container">
	<span class="label   text-danger ">
	Gig guide
	</span>
	<div class="row">
	<?php 
	$i=0;
	$sql="SELECT * from gig   limit 12";
	$result=$connect->query($sql);
	while($post=$result->fetch_assoc()){
	
	
	?>
	
		<div class="col-md-3 col-sm-6 img conc ">
			<img src="<?php echo $post["event_pic"];?>" class="img-fluid" width="100%" alt="">
			<p class="mb-2 post-title "><a class="text-dark text-decoration-none" href="gig-view.php?slug=<?php echo str_replace(" ","-",$post["event_name"])."&id=".$post["gig_id"];?>"><?php echo$post["event_name"] ;?></a></p>
			
			<?php 
		$ccsql="select * from country where country_id=".$post["country"];
		$resultt=$connect->query($ccsql);
		$contact=$resultt->fetch_assoc();
		?>
            <img src="<?php echo $contact["image_link"] ?>" alt="" width="30px" height="20px">
            <span ><?php echo $contact["name"];?></span>

			<p class="bg-secondary rounded p-2"><span class="class text-success">Date: </span><?php echo $post["date"]." - ",$post["time"];?></p>
		 </div>

	<?php }?>
	
	
	</div>
	<p class="float-right"><a href="#" class="btn btn-outline-danger">View more</a></p>

		<br>
		<br>
		<hr>
</div>
<div class="container-fluid p-0">
<span class="label   text-danger">
				<hr>
				Sponsored
				
			</span> <span class="float-right"><a href="payment-type.php" class="text-danger">Take up this space</a></span><br>
	<?php
	 
	 $sqlt="select * from user join  country on user.country_id=country.country_id join sub_cat on  user.artist_type =sub_cat.sub_cat_id where sponsor=1";
	 $sr=$connect->query($sqlt);
	 while($sponsor=$sr->fetch_assoc()){
	?>
	<div class="outcon">
    <div class="imagecon">
        <a class="up" href="artist.php?id=<?php echo $sponsor["id"];?>">
           <?php echo $sponsor["fullname"] ?>
        </a>
        <div>
            <img src="<?php echo $sponsor["image_link"]; ?>" class="countryimage" width="30px" alt="">

        </div>
       
        <img src="<?php echo $sponsor["image"]?>" width="100%" height="80%" alt="">
        <span class="down mb-4"><?php echo substr($sponsor["sub_cat_name"],0,14).".";?></span>
        
    </div>
    <?php 
    $sqlm="select * from music where user_id=".$sponsor["id"];
    $m=$connect->query($sqlm);
    $ms=$m->fetch_assoc();
    $i=rand();
    ?>
<button class=" btn-secondary btn fellow follow mx-auto mt-2 px-4 btn-light active " data-id="<?php echo $sponsor["id"]?>"  ><span class="fa-user-plus text-dark  font-weight-bold fa"> Follow</span> </button> 
<?php if($m->num_rows>0){ ?>
<a href="#" class="btn-sm btn btn-danger fellow  mt-2"data-toggle="modal" data-target="#exampleModalLong<?php echo$i;?>"><span class="fa fa-play"></span></a>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong<?php echo$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $sponsor["fullname"]." Latest music";?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <iframe src="<?php echo $ms["audiomark"]; ?>" width="100%" height="80px" scrollbars="no" frameborder="0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!--endmodel-->
</div>
<?php } ?>
</div>

