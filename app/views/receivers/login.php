
<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="login text-center">

  <form class="form" action="<?php echo URLROOT?>/receivers/login" method="POST">
    <img class="mb-4" src="<?php echo URLROOT ?>/public/img/main.jpg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 text-danger font-weight-normal"><i class="fa fa-sign-in"></i> Login</h1>
    

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" name="email" id="inputEmail" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '';?>" placeholder="Email address" value="<?php echo $data['email']?>" autofocus>
    <span class="invalid-feedback text-left mb-2"><?php echo $data['email_err'];?></span>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';?>" placeholder="Password" >
    <span class="invalid-feedback text-left mb-2"><?php echo $data['password_err'];?></span>

    <button class="btn btn-lg btn-danger btn-block" type="submit">Login</button>
  </form>

</div>


<?php require APPROOT.'/views/inc/footer.php'; ?>
