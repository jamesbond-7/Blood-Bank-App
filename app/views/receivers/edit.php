<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="register text-center">

  <form class="form" action="<?php echo URLROOT?>/receivers/edit" method="POST">
    <h1 class="h3 mb-3 text-danger font-weight-normal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Credentials</h1>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" value = "<?php echo $data['receiver']->name; ?>"  autofocus>
    
    <label for="inputPhoneNumber" class="sr-only">Phone Number</label>
    <input type="text" name="phone_no" id="inputPhoneNumber" class="form-control" maxlength="10" placeholder="Phone Number" onkeypress="return isNumberKey(event)" value = "<?php echo $data['receiver']->phone_no; ?>">
    

    <label for="inputBloodGroup" class="sr-only">Blood Group</label>
    <input type="text" name="blood_group" id="inputBloodGroup" class="form-control" placeholder="Blood Group" value = "<?php echo $data['receiver']->blood_group;?>">
    

    <label for="inputEmail" class="sr-only"> Email address</label>
    <input type="text" name="email" id="inputEmail" class="form-control" placeholder=" Email address" value = "<?php echo $data['receiver']->email; ?>" disabled>
    
    <button class="btn btn-lg btn-danger" type="submit">Save Changes</button>
    <button class="btn btn-lg btn-light" onclick="window.location.href = '<?php echo URLROOT;?>/receivers/index'">Go Back</button>
  </form>

</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>
