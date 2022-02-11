<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="register text-center">

  <form class="form" action="<?php echo URLROOT?>/receivers/register" method="POST">
    <img class="mb-4" src="<?php echo URLROOT ?>/public/img/main.jpg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 text-danger font-weight-normal"><i class="fa fa-user-plus"></i> Register</h1>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" name="name" id="inputName" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '';?>" placeholder="Name" value = "<?php echo $data['name'] ?>"  autofocus>
    <span class="invalid-feedback text-left mb-2"><?php echo $data['name_err'];?></span>

    <label for="inputPhoneNumber" class="sr-only">Phone Number</label>
    <input type="text" name="phone_no" id="inputPhoneNumber" class="form-control <?php echo (!empty($data['phone_no_err'])) ? 'is-invalid' : '';?>" placeholder="Phone Number" maxlength="10" onkeypress="return isNumberKey(event)" value = "<?php echo $data['phone_no']?>">
    <span class="invalid-feedback text-left mb-2"><?php echo $data['phone_no_err'];?></span>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" name="email" id="inputEmail" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '';?>" placeholder="Email address" value = "<?php echo $data['email'] ?>">
    <span class="invalid-feedback text-left mb-2"><?php echo $data['email_err'];?></span>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';?>" placeholder="Password" value = "<?php echo $data['password']?>">
    <span class="invalid-feedback text-left mb-2"><?php echo $data['password_err'];?></span>

    <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
    <input type="password" name="confirm_password" id="inputConfirmPassword" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : '';?>" placeholder="Confirm Password" value="<?php echo $data['confirm_password']?>">
    <span class="invalid-feedback text-left mb-2"><?php echo $data['confirm_password_err'];?></span>

    <label for="inputBloodGroup" class="sr-only">Blood Group</label>
    <select name="blood_group" class="form-control <?php echo (!empty($data['blood_group_err'])) ? 'is-invalid' : '';?>" id="inputBloodGroup">
      <option value=''>Select Blood Group</option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
      <option value="A1+">A1+</option>
      <option value="A1-">A1-</option>
      <option value="A2+">A2+</option>
      <option value="A2-">A2-</option>
      <option value="A1B+">A1B+</option>
      <option value="A1B-">A1B-</option>
      <option value="A2B+">A2B+</option>
      <option value="A2B-">A2B-</option>
    </select>
    <span class="invalid-feedback text-left mb-2"><?php echo $data['blood_group_err'];?></span>

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
