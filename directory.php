<?php include "config.php";

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
<link rel="stylesheet" href="music.css">
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
<body>

     <div class="white fcontainer">
     <form class="contact" method="get" action="<?php echo$_SERVER["PHP_SELF"]?>">
            <?php 
            $sql="select * from artist_and_industry where id=".$_GET["dir"];
            $indus=$connect->query($sql)->fetch_assoc();

            ?>
            <p class="label"><?php echo $indus["name"];?></p>
            <hr>
            <select name="country"  class="form-control col-12 col-md-6" id="" required>
			
			   <?php 
				 $csql="select country_id,name from country";
				 $row=$connect->query($csql);
				 while($country=$row->fetch_assoc()){
			   ?>

				<option value="<?php echo $country["country_id"];?>" ><?php echo $country["name"];?></option>
				 <?php }?>
            </select>
            <input type="hidden" name="dir" value="<?php echo $_GET["dir"];?>">
            <input type="submit" class="btn btn-primary mt-2" name="search" value="search">
          
        </form>
    <div class="row">
    <div class="col-12 col-md-9">
     <?php  
     
     
    
        $sqlt="select * from user join  country on user.country_id=country.country_id join sub_cat on  user.artist_type =sub_cat.sub_cat_id where artist_and_industry_id=".$_GET["dir"];
     if(isset($_GET["search"])){
        $sqlt="select * from user join  country on user.country_id=country.country_id join sub_cat on  user.artist_type =sub_cat.sub_cat_id where artist_and_industry_id=".$_GET["dir"]." and user.country_id=".$_GET["country"];
     }
	 $sr=$connect->query($sqlt);
	 while($sponsor=$sr->fetch_assoc()){
	?>
	<div class="outcon">
    <div class="imagecon">
        <a class="up" href="#">
           <?php echo $sponsor["fullname"] ?>
        </a>
        <div>
            <img src="<?php echo $sponsor["image_link"]; ?>" class="countryimage" width="30px" alt="">

        </div>
       
        <img src="<?php echo $sponsor["image"]?>" width="100%" height="80%" alt="">
        <a href="#" class="down mb-4"><?php echo substr($sponsor["sub_cat_name"],0,14).".";?></a>
        
    </div>
    <?php 
    $sqlm="select * from music where user_id=".$sponsor["id"];
    $m=$connect->query($sqlm);
    $ms=$m->fetch_assoc();
    $i=rand();
    ?>
<button class=" btn-secondary btn fellow follow mx-auto mt-2 px-4 btn-light active " data-id="<?php echo $sponsor["id"];?>"  ><span class="fa-user-plus text-dark  font-weight-bold fa"> Follow</span> </button> 
<?php if($m->num_rows>0) { ?>
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
   <iframe src="<?php echo $ms["audiomark"]; ?>"  scrolling="no" width=100%  scrollbars="no" frameborder="0"></iframe>
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
<?php }  ?>
<!--sponsor-->
<span class="label   text-danger">
				<hr class="mt-5">
				Sponsored
				
			</span> <span class="float-right"><a href="#" class="text-danger">Take up this space</a></span><br>
	<?php
	 
	 $sqlt="select * from user join  country on user.country_id=country.country_id join sub_cat on  user.artist_type =sub_cat.sub_cat_id ";
	 $sr=$connect->query($sqlt);
	 while($sponsor=$sr->fetch_assoc()){
	?>
	<div class="outcon">
    <div class="imagecon">
        <a class="up" href="#">
           <?php echo $sponsor["fullname"] ?>
        </a>
        <div>
            <img src="<?php echo $sponsor["image_link"]; ?>" class="countryimage" width="30px" alt="">

        </div>
       
        <img src="<?php echo $sponsor["image"]?>" width="100%" height="80%" alt="">
        <a href="#" class="down mb-4"><?php echo substr($sponsor["sub_cat_name"],0,14).".";?></a>
        
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
   <iframe src="<?php echo $ms["audiomark"]; ?>" autoplay=on scrolling=\"no\" width=100% height= scrollbars=\"no\" frameborder=\"0\"></iframe>
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
<?php }?>

</div>
<!--enofsec-->
<div class="col-md-3 col-12">
      <img src="images/post/12.jpg" class=" border " width="100%" height="500px" alt="">
</div>
</div>
</div>
</body>
