<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="register text-center">

  <form class="form" action="<?php echo URLROOT?>/hospitals/edit" method="POST">
    <h1 class="h3 mb-3 text-danger font-weight-normal"><span><i class="fa fa-pencil-square-o"></i></span> Credentials</h1>
    <label for="inputHospitalName" class="sr-only">Hospital Name</label>
    <input type="text" name="hname" id="inputHospitalName" class="form-control" placeholder="Hospital Name" value = "<?php echo $data['hospital']->hname; ?>"  autofocus>
    
    <label for="inputHospitalAddress" class="sr-only">Hospital Address</label>
    <input type="text" name="haddress" id="inputHospitalAddress" class="form-control" placeholder="Hospital Address" value = "<?php echo $data['hospital']->haddress; ?>">
    

    <label for="inputContactNumber" class="sr-only">Contact Number</label>
    <input type="text" name="contact_no" id="inputContactNumber" class="form-control" placeholder="Contact Number" maxlength="10" onkeypress="return isNumberKey(event)" value = "<?php echo $data['hospital']->contact_no;?>">
    

    <label for="inputHospitalEmail" class="sr-only">Hospital Email address</label>
    <input type="text" name="hemail" id="inputHospitalEmail" class="form-control" placeholder="Hospital Email address" value = "<?php echo $data['hospital']->hemail; ?>" disabled>
    
    <button class="btn btn-lg btn-danger" type="submit">Save Changes</button>
    <button class="btn btn-lg btn-light" onclick="window.location.href = '<?php echo URLROOT;?>/hospitals/index'">Go Back</button>
  </form>

</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>
