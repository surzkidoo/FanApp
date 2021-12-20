<?php include "cofig.php";
$id=$_GET["id"];

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
<link rel="stylesheet" href="adminpost.css">
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
<body>
<div class="container-fluid ">
    <div class="col-8 col-md-5 mx-auto">

        <a href="user.php?type=1 & id=<?php echo $id;?>" class="btn btn-outline-danger col-12 p-2 mt-4"><span class="font-weight-bold">Artist</span></a>
        <a href="user.php?type=2 & id=<?php echo $id;?>" class="btn btn-outline-danger col-12 p-2 mt-4"><span class="font-weight-bold">Music professional</span></a>
        <a href="user.php?type=3 & id=<?php echo $id;?>" class="btn btn-outline-danger col-12 p-2 mt-4"><span class="font-weight-bold">Contributor</span></a>
        <a href="user.php?type=4 & id=<?php echo $id;?>" class="btn btn-outline-danger col-12 p-2 mt-4"><span class="font-weight-bold">Music fan</span></a>
    </div>
</div>
</body>