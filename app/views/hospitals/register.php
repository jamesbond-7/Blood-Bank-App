<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="register text-center">

  <form class="form" action="<?php echo URLROOT?>/hospitals/register" method="POST">
    <img class="mb-4" src="<?php echo URLROOT ?>/public/img/bloodbank.png" alt="" width="80" height="80">
    <h1 class="h3 mb-3 text-danger font-weight-normal"><i class="fa fa-ambulance"></i> Register</h1>
    <label for="inputHospitalName" class="sr-only">Hospital Name</label>
    <input type="text" name="hname" id="inputHospitalName" class="form-control <?php echo (!empty($data['hname_err'])) ? 'is-invalid' : '';?>" placeholder="Hospital Name" value = "<?php echo $data['hname'] ?>"  autofocus>
    <span class="invalid-feedback text-left mb-2"><?php echo $data['hname_err'];?></span>

    <label for="inputHospitalAddress" class="sr-only">Hospital Address</label>
    <input type="text" name="haddress" id="inputHospitalAddress" class="form-control <?php echo (!empty($data['haddress_err'])) ? 'is-invalid' : '';?>" placeholder="Hospital Address" value = "<?php echo $data['haddress'] ?>">
    <span class="invalid-feedback text-left mb-2"><?php echo $data['haddress_err'];?></span>

    <label for="inputContactNumber" class="sr-only">Contact Number</label>
    <input type="text" name="contact_no" id="inputContactNumber" class="form-control <?php echo (!empty($data['contact_no_err'])) ? 'is-invalid' : '';?>" placeholder="Contact Number" maxlength="10" onkeypress="return isNumberKey(event)" value = "<?php echo $data['contact_no']?>">
    <span class="invalid-feedback text-left mb-2"><?php echo $data['contact_no_err'];?></span>

    <label for="inputHospitalEmail" class="sr-only">Hospital Email address</label>
    <input type="text" name="hemail" id="inputHospitalEmail" class="form-control <?php echo (!empty($data['hemail_err'])) ? 'is-invalid' : '';?>" placeholder="Hospital Email address" value = "<?php echo $data['hemail'] ?>">
    <span class="invalid-feedback text-left mb-2"><?php echo $data['hemail_err'];?></span>

    
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';?>" placeholder="Password" value = "<?php echo $data['password']?>">
    <span class="invalid-feedback text-left mb-2"><?php echo $data['password_err'];?></span>

    <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
    <input type="password" name="confirm_password" id="inputConfirmPassword" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : '';?>" placeholder="Confirm Password" value="<?php echo $data['confirm_password']?>">
    <span class="invalid-feedback text-left mb-2"><?php echo $data['confirm_password_err'];?></span>

    <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="agreement" value="yes" class="form-check-input <?php echo (!empty($data['agreement_err'])) ? 'is-invalid' : '';?>"> 
          <span class="font-weight-light">By checking you agree with all the credentials provided by you are valid</span>
          <span class="invalid-feedback text-left mb-2"><?php echo $data['agreement_err'];?></span>
        </label>  
    </div>
    <button class="btn btn-lg btn-danger btn-block" type="submit">Register</button>
  </form>

</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>
