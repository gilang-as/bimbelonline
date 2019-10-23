<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="css/style.css">

<html>
  <head>
    <?php
      session_start();
    if(@$_SESSION['user']){
          ?>
     <script language="javascript">
      document.location="home.php";
      </script>
    <?php
    }else{

     
    
    }
    ?>
  <title>Login Admin</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading text-center" style="margin-top: 20px;">Login Form Admin GIS Bimbel Online</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Admin Login</h2>
   <p>Masukkan Username dan Password</p>
   </div>
    <form method="POST" action="proseslogin.php">

        <div class="form-group">


            <input type="text" class="form-control" name="username" placeholder="Username" required>

        </div>

        <div class="form-group">

            <input type="password" class="form-control" name="password" placeholder="Password" required>

        </div>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
    </div>
<p class="botto-text"> Designed by Agus Susilo</p>
</div></div></div>
</body>
</html>
