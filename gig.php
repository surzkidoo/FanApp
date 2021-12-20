<?php include "config.php"; 
session_start();
if(!isset($_SESSION["auth"])){
    header("location:index.php");
}
$id=$_SESSION["userid"];

$sql="select * from user where id=$id";
$result=$connect->query($sql);
$upload=1;
$user=$result->fetch_assoc();

if(isset($_POST["save"])){
    
    if(is_uploaded_file($_FILES["eventpic"]["tmp_name"])){
$target_dir="images/event/";
$target_file=$target_dir."l".time().basename($_FILES["eventpic"]["name"]);
$imagetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    if($_FILES["eventpic"]["size"]>6000000){
       $upload=0;
        $imessage="Sorry the file is too large <br>";
    }
    if($imagetype!="jpg" || $imagetype!="png" || $imagetype!="jpeg" || $imagetype!="gif"){
        $upload=0;
        $imessage="Sorry the file is too large <br>";
    }
   
       
    if(move_uploaded_file($_FILES["eventpic"]["tmp_name"],$target_file)){
            $imessage="image uploaded successfully";
        }
  
   $profilepic=$target_file;
   



    $poster=$id;
    $country=$_POST["country"];
    $venue=$_POST["venue"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $desc=$_POST["desc"];
    $header=$_POST["headline"];
    $gigtype=$_POST["gigtype"];
    $website=$_POST["website"];
    
    $sql="insert into gig(user_id,country,event_name,event_pic,venue,gig_type_id,website,event_desc,date,time)
     values($poster,$country,'$header','$profilepic','$venue',$gigtype,'$website','$desc','$date','$time')";


    if($connect->query($sql)===TRUE){
        $messege="Inserted Succesfully";
    }
    else{
        $messege=" Failed Try Again";
    }


    }
} ?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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
    <div class="container">
        <h4 class="p-3">Create Event</h4>
        <div class="col-sm-12"> 

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
             <div class="form-group">
                    <label for="profilepic">Event Image<span class="text-danger">*</span></label><br>
                    <input type="file"  class="" name="eventpic" id="profilepic" >
                    <p class="mt-3">
                        Files must be less than 6 MB.<br>
                        Allowed file types: png gif jpg jpeg.<br>
                            
                        Images must be larger than 400x400 pixels. <br>
                    </p>
                </div>      

          <?php echo $messege;?>
              
                <div class="form-group">
                    <label>Headline<span class="text-danger">*</span>    </label>
                    <input type="text" name="headline" id="headline" class=" form-control"  />
                </div>

                <div class="form-group">
                    <label>venue<span class="text-danger"></span>    </label>
                    <input type="text" name="venue" id="venue" class=" form-control"  />
                </div>
                <div class="border p-3 bordered">
                <div class="form-group ">
                    <label>Date<span class="text-danger">*</span>    </label>
                    <input type="date" name="date" id="date" class=" col-6 col-md-4 form-control"  />
                </div>
                <div class="form-group ">
                    <label>Time<span class="text-danger">*</span>    </label>
                    <input type="time" name="time" id="time" class="col-6 col-md-4 form-control"  />
                </div>

                </div>
                

                <div class="form-group">
                    <label for="stagename">Type<span class="text-danger">*</span>    
                    </label>
                    <select name="gigtype" id="country"  class=" form-control" required>
                    <option value="all" disabled> Select Type </option>
                        <?php
                        $sql="Select * from gig_type";
                        $resultc=$connect->query($sql);
                        while($gig=$resultc->fetch_assoc()){
                        ?>
                        <option value="<?php echo $gig["gig_type_id"];?>" ><?php echo $gig["gig_type_name"]; ?></option>
                        
                        
                        
                        <?php } ?>
                        
                    </select>
                        </div>


                <div class="form-group">
                    <label for="stagename">Country<span class="text-danger">*</span>    
                    </label>
                    <select name="country" id="country"  class=" form-control" required>
                    <option value="all" disabled > Select  Country </option>
                        <?php
                        $sql="Select country_id,name from country";
                        $resultc=$connect->query($sql);
                        while($country=$resultc->fetch_assoc()){
                        ?>
                        <option value="<?php echo $country["country_id"];?>" ><?php echo $country["name"]; ?></option>
                        
                        
                        
                        <?php } ?>
                        
                    </select>
                        </div>

                <div class="form-group">
                    <label>Website </label>
                    <input type="url" name="website" id="website" class=" form-control"  />
                </div>

                <div class="form-group">
                    <label for="textEditor">Short Description<span class="text-danger">*</span></label>
                    <textarea name="desc" id="txtEditor"></textarea>
                </div>
                
                <div class="form-group">
                    <input type="submit"  name="save" class="btn btn-primary">
                </div>
            </form>
            
        </div>
    </div>
   <script>
        $(document).ready(function() {
            $('textarea').summernote({
                height: 300,   //set editable area's height
            });
        });
    </script>
</body>