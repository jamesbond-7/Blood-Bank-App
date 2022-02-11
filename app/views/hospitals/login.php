
<?php require APPROOT.'/views/inc/header.php'; ?>


<div class="login text-center">

  <form class="form" action="<?php echo URLROOT?>/hospitals/login" method="POST">
    <img class="mb-4" src="<?php echo URLROOT ?>/public/img/bloodbank.png" alt="" width="80" height="80">
    <h1 class="h3 mb-3 text-danger font-weight-normal"><i class="fa fa-sign-in"></i> Login </h1>
    

    <label for="inputHospitalEmail" class="sr-only">Hospital Email address</label>
    <input type="text" name="hemail" id="inputHospitalEmail" class="form-control <?php echo (!empty($data['hemail_err'])) ? 'is-invalid' : '';?>" placeholder="Hospital Email address" value="<?php echo $data['hemail']?>" autofocus>
    <span class="invalid-feedback text-left mb-2"><?php echo $data['hemail_err'];?></span>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';?>" placeholder="Password" >
    <span class="invalid-feedback text-left mb-2"><?php echo $data['password_err'];?></span>

    <button class="btn btn-lg btn-danger btn-block" type="submit">Login</button>
  </form>

</div>


<?php require APPROOT.'/views/inc/footer.php'; ?>
