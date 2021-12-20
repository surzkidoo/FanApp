<?php include "config.php";

if(isset($_POST["post"])){
  $message=$_POST["feed"];
  $userid=1;
  $sql="insert into newsmsg(message,user_id) values('$message',$userid)";
  $connect->query($sql);
  $sql="select * from newsmsg where user_id=$userid order by newsmsg_id desc";
  $res=$connect->query($sql);
  $last=$res->fetch_assoc();
  $lastid=$last["newsmsg_id"];
  $sql="insert into newsfeed(user_id,type_id,item_id) values($userid,3,$lastid)";
  $connect->query($sql);
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
<script async="" src="magazine.js"></script>
<!-- Latest compiled JavaScript -->
<script src ="https://maxcdn.bootstrapcdn.com/
bootstrap/4.4.1/js/bootstrap.min.js">
</script>
</head>
<style> 
.circle{
  border-radius:20px;
  height:50px;
}
body{
  background-color:white;
}
</style>
<body>
    <div class="container">
    <div class="row">

    <div class="col-12 col-md-3">
ass
    </div>
    <!--post-side-->
    <div class="col-12 col-md-5">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="feed">Post an update</label>
    <textarea name="feed" class="form-control" id="" cols="15" rows="3"></textarea>
    <input type="submit" name="post" class="btn btn-sm btn-primary mt-1" value="post">
    </form>
    <?php
    $sql="select * from newsfeed left join follow on user_id=follower_id where follows_id=1 order by date desc";
    $result=$connect->query($sql);
    while($feed=$result->fetch_assoc()){
     if ($feed["type_id"]==1){
      $sql="select * from post join user on user.id = Post.user_id where post_id=".$feed["item_id"];
      $postr=$connect->query($sql);
      $post=$postr->fetch_assoc();
    ?>
  
    <div class="conc mt-5">
    <div class="d-inline-block"> <img src="images/post/9.jpg"  class="circle" width="50px" alt=""> </div> <div class="d-inline-block  ml-3"> <a href="artist.php?id=<?php echo $post["user_id"];?>"><?php echo $post["fullname"];?></a> Post New Article</div>
    <div class="col-12">
        <img src="images/post/9.jpg"   width="" class="img-fluid" alt=""> 
    </div>
    <span class="fa fa-clock-o mt-2"> <?php echo date("d M y",date_timestamp_get(date_create($post['created_on']))); ?></span>
    <?php $ccsql="select * from country where country_id=".$post["post_country_id"];
		$resultt=$connect->query($ccsql);
		$contact=$resultt->fetch_assoc();
		?>
		<img src="<?php echo $contact["image_link"] ?>" width="30px"  class="float-right" alt="">
		<p class="post-title"><a  class="text-dark text-decoration-none" href="view-post.php?slug=<?php echo str_replace(" ","-",$post["post_title"])."&id=".$post["post_id"];?>"><?php echo$post["post_title"] ;?></a></p>
		
		<p class="postby ">by <a href="artist.php?id=<?php echo $post["id"]; ?>"><?php echo $post["stagename"]?></a></p>
		<span id="<?php echo $post['post_id']; ?>" class="fa fa-thumbs-up mb-4"> 11</span>
    <br>
    </div>
    
    <!--end-post-->
     <?php }
    
    
    if ($feed["type_id"]==2){
      $ccsql="select * from gig join user on user.id = gig.user_id where gig_id=".$feed["item_id"];
      $resultt=$connect->query($ccsql);
      
      $post=$resultt->fetch_assoc();
    ?>
    <!--gig--->

      
        <div class=" conc mt-5 ">

        <img src="<?php echo $post["image"]?>"  class="circle" width="50px" alt=""> <div class="d-inline-block  ml-3"><a href="artist.php?id=<?php echo $post["user_id"];?>"><?php echo $post["fullname"];?></a> Create a New Gig</div>
        

          <img src="<?php echo $post["event_pic"];?>" class="img-fluid" width="" alt="">
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
    <!--end gig-->

    <!--msgbig-->


    
    <?php if ($feed["type_id"]==3){
      $ccsql="select * from newsmsg  join user on user.id = newsmsg.user_id where newsmsg_id=".$feed["item_id"];
      $resultt=$connect->query($ccsql);
      $post=$resultt->fetch_assoc();
    ?>
    <!--mesg--->

      
        <div class=" conc mt-5 ">
       
        <img src="<?php echo $post["image"]; ?>"  class="circle" width="50px" alt=""> <div class="d-inline-block  ml-3"><a href="artist.php?id=<?php echo $post["user_id"];?>"><?php echo $post["fullname"];?></a> Post a message</div>
        
        <p class="mt-1"><?php echo $post["message"];?>s</p>
        </div>

    <?php }?>
    <!---msg end--->

    
    <?php } ?>
    </div>
    <div class="col-12 col-md-3 ">
      <img src="11.jpg" class="col-md-12 col-10  border mx-auto" width="100%" height="400px" alt="">
    </div>
    
    </div>
   </div>
</body>