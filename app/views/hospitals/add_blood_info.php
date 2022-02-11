<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="register text-center">

  <form class="form" action="<?php echo URLROOT?>/hospitals/add_blood_info" method="POST">
    <img class="mb-4" src="<?php echo URLROOT ?>/public/img/bloodbank.png" alt="" width="80" height="80">
    <h1 class="h3 mb-3 text-danger font-weight-normal"><i class="fa fa-info-circle"></i> Blood</h1>
    
    <label for="inputBloodGroup" class="sr-only">Blood Group</label>
    <input type="text" name="blood_group" id="inputBloodGroup" class="form-control <?php echo (!empty($data['blood_group'])) ? 'is-invalid' : '';?>" placeholder="Blood Group" autofocus>

    <label for="inputTransBag" class="sr-only">Number Of Transfusion Bags</label>
    <input type="text" name="num_trans_bag" id="inputTransBag" class="form-control" onkeypress="return isNumberKey(event)" placeholder="Number Of Transfusion Bags" maxlength="10">

    <div class="input_fields_wrap form-group">
        <button class="add_field_button btn btn-info pull-left"><i class="fa fa-plus"></i> FIELD</button>
        
        <br>
    </div>
    <br>
    <button class="btn btn-lg btn-danger" type="submit">ADD INFO</button>
    <a class="btn btn-lg btn-light" onclick="window.location.href = '<?php echo URLROOT;?>/hospitals/index'">Go Back</a>
  </form>

</div>




<?php require APPROOT.'/views/inc/footer.php'; ?>
