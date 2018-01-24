<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Page</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap/bootstrap.css' ?>" rel="stylesheet">
    <style>

        a{
          font-weight: bold;
          margin-right: 0;
        }
        a:hover{
           text-decoration: none;
        }
      
    </style>

  </head>

  <body>

    <div class="container"><br><br><br>
         
        
      <form class="form-signin" method="POST">
        <?php if (isset($_SESSION['success'])) {?>

        <div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
          
        <?php } ?>
        <h2 class="form-signin-heading">Please Fill Data</h2>
         <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
        <input for="username" id="username" name="username" type="text" class="form-control" placeholder="Username"  autofocus><br>
        <input for="password" id="password" name="password" type="password" class="form-control" placeholder="Password" ><br>
         <input for="passconf" id="passconf" name="passconf" type="password" class="form-control" placeholder="Confirmation Password" ><br>
         <input for="name" id="name" name="name" type="text" class="form-control" placeholder="Name"><br>
          <input for="email" id="email" name="email" type="email" class="form-control" placeholder="E-Mail"><br>
           <input for="phone" id="phone" name="phone" type="text" class="form-control" placeholder="Phone Number"><br>

        <button for="register" class="btn btn-lg btn-primary btn-block" name="register" type="submit" value="register">register</button>  
        </form>
        <label class="pull-right"><a href="<?php echo base_url().'admin/login' ?>" title="">login</a></label>
    
     
    </div> <!-- /container -->
  </body>
</html>
