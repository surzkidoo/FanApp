
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jobgetter | Register page</title>
<link rel="stylesheet" href="https://
cdnjs.cloudflare.com/ajax/libs/font-
awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel ="stylesheet" href ="https://
maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/
bootstrap.min.css">
<link rel="stylesheet" href="style.css">
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
<body>

<div class="container-fluid mt-5">
<div class="col-md-4 col-12 mx-auto">
    
    <form class="form" role="form" action="registerscript.php" method="post">
    <div class="form-group">
            <label for="fname" class="col-md-12">Full-name</label>
            <div class="col-md-12">
                <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter your full name">
            </div>
        </div>
    <div class="form-group">
        <label for="username" class="col-md-12">Username</label>
        <div class="col-md-12">
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
        </div>
    </div>
    <div class="form-group">
        
        <label for="username" class="col-md-12">password</label>
        <div class="col-md-12">
            <input type="password" name="password" class="form-control" id="password" placeholder="Set your password">
        </div>
    </div>
    <div class="form-group">
        
        <label for="tel" class="col-md-12">Phone</label>
        <div class="col-md-12">
            <input type="tel" name="phone" class="form-control" id="tel" placeholder="mobile number">
        </div>
    </div>
    <div class="form-group">
        
        <label for="email" class="col-md-2">Email</label>
        <div class="col-md-12">
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
    </div>
    <input type="hidden" name="role" value="111">
        <p class="col-md-12">already have an account <a href="login.php">Login here</a></p>
    <div class="col-md-12">
    <input type="submit" value="Register" class="col-12 btn btn-outline-danger">
    </div>
    </form>
    </div>
    
</div>

</body>