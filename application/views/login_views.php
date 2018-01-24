<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

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
       
      
      <form class="form-signin" action="<?php echo base_url().'admin/login/login_action' ?>" method="POST">
        <h2 class="form-signin-heading">Login</h2>
        <?php echo $this->session->flashdata('gagal');  ?>
       <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
        <label class="sr-only">Username</label>
        <input for="username" id="username" name="username" type="text" id="username" class="form-control" placeholder="Username"  autofocus><br>
        <label class="sr-only">Password</label>
        <input for="password" id="password" name="password" type="password" id="inputPassword" class="form-control" placeholder="Password"><br>
      <button for="register" class="btn btn-lg btn-primary btn-block" name="register" type="submit" value="register">register</button>      
        <label class="pull-left">Haven't account yet <a href="<?php echo base_url().'admin/login/register' ?>"> Register</a></label>
      </form>
    </div> <!-- /container -->
  </body>
</html>

