<?php include "config.php";?>
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

<link rel="stylesheet" href="">
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
<script>
     secuser=0;
        $.ajax({
				url: 'secupdate.php',
				type: 'post',
				data: {
					'me': 1,
					
				},
				success: function(response){
                    var data=JSON.parse(response);
                    
					
                      
                    for (let i = 0; i < data.length; i++) {
                       $("#icon").append("<div class='inbox mb-3' id="+data[i].id+" data-name="+data[i].fullname+"><div class='row'> <div class='col-4'> <img src="+data[i].image+" alt='' width='100%' height='80px' ></div><div class='col-8' id='text' >"+data[i].msg+"</div></div></div>");
                    }
				}
			});
    $(document).ready(function(){
       

      $(".inbox").on("click",function(){
        $(".inbox").css({"border":"none","opacity":"1"});
        $(this).css({"border":"2px solid black","opacity":"1"});
        secpam=$(this).attr("id");
        
        if(secuser!=secpam){
         secuser=$(this).attr("id");
         name=$(this).attr("data-name");
        
         	// when getting msg
           
			$.ajax({
				url: 'usermsg.php',
				type: 'post',
				data: {
					'me': 1,
					'him': secuser
				},
				success: function(response){
                    $("#msghead").text(name);
                    var data=JSON.parse(response);
                            
					if(data[0].fromm !=""){
                        
                     $("#bodymsg").empty();
                    for (let i = 0; i < data.length; i++) {
                        
                       $("#bodymsg").append("<div> <div class='row mt-2'><div class='col-4 col-md-2'> <img src="+data[i].image+" alt='' width='100%' height='50px' class=''> </div><div class=' col-8 col-md-10'> <span class='float-left'></span>"+data[i].fullname+"<span class='float-right'><small>"+data[i].date+"</small></span> <div style='clear:both;'> <small>"+data[i].msg+" </small></div> </div> <hr> </div> <hr> ");
                    }
                      
                    }else{
                        $post.removeClass("likec");
                        $post.children("span").text(r.nums);
                    }
				}
			});
		//sending msg
        }
      })
	
            $("#btn").click(function(){
                var str = $("#input").val();
                if(str!=""){
                    $.ajax({
				url: 'bkmsg.php',
				type: 'post',
				data: {
					'me': 1,
					'him': secuser,
                    'message':str
                    
				},
				success: function(response){
                    alert(response);
                 } 
			    });
                }
                else{
                    alert("message can't be empty");
                }
                
                });
        //end msg
        //updater
        setInterval(() => {
            $.ajax({
				url: 'msgupdate.php',
                cache: false,
				type: 'post',
				data: {
					'me': 1,
					'him':secuser
				},
				success: function(response){
                    var data=JSON.parse(response);
                    
					if(data[0].fromm !=""){
                       $("#msghead").text(data[0].fullname)
                      
                    for (let i = 0; i < data.length; i++) {
                        
                       $("#bodymsg").append("<div> <div class='row mt-2'><div class='col-4 col-md-2'> <img src="+data[i].image+" alt='' width='100%' height='50px' class=''> </div><div class=' col-8 col-md-10'> <span class='float-left'></span>"+data[i].fullname+"<span class='float-right'><small>"+data[i].date+"</small></span> <div style='clear:both;'><small>"+data[i].msg+"</small></div> </div> <hr> </div> <hr> ");
                    }
                      
                    }
				}
			});
        }, 2000);



        
           
       
        });
      
</script>
<body>

<div class="container shadow">
    <h4 class="mb-4 mt-3"><span class="fa fa-envelope-o"></span>Inbox</h4>
    <div class="row ">
    <div class="col-12 col-md-4" id="icon">
        
            <div class="inbox mb-3" id="2" data-name="abubakar">
            <div class="row">
            <div class="col-4">
            <img src="11.jpg" alt="" width="100%" height="80px" class="">
            </div>
            <div class="col-8" id="text" ><p</div>
            </div>
            </div>


           <div class='inbox mb-3' id="3" data-name="abubakar02">
            <div class="row">
            <div class="col-4">
            <img src="11.jpg" alt="" width="100%" height="80px" class="">
            </div>
            <div class="col-8">hr   ffv   jk f  c nb dhb dhd d dbd djbf dfh dfdfb  vdjd dd  d</div>
            </div>
            </div>

        
    </div>

    <div class="col-12 col-md-8 border" id="">
        <h4 class="text-center" id="msghead" >Abubakar</h4>
        <div class="" id="bodymsg">
        <hr>
       <?php $sql="select * from messages where too=3 and fromm=1 ";
       $me=$connect->query($sql);
       while($message=$me->fetch_assoc()){

       
        ?>
        <hr>
        <div>
            <?php $image=$connect->query("select image,fullname from user where id =".$message["fromm"])->fetch_assoc();?>
            <div class="row mt-2">
            <div class="col-4 col-md-2">
            <img src="<?php echo $image["image"];?>" alt="" width="100%" height="50px" class="">
            </div>
            <div class=" col-8 col-md-10">
            <span class="float-left"></span><?php echo $image["fullname"];?><span class="float-right"><small><?php echo $message["date"];?></small></span>
            <div style="clear:both;"> <small><?php echo $message["msg"];?></small> 
          </div>
         </div> 
            <hr>
        </div>
        <hr>
       
       <?php } ?>
       </div>
       </div>
    </div>

    


        <textarea name=""  cols="15" rows="10" id="input" class="col-12 form-control"></textarea>
        <input type="button" id="btn" class="btn-info btn  col-12 col-md-2 mt-2" value="send">
    </div>
  </div>
</div>



<!--jj-->