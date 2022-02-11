<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="register text-center">


  <form class="form" action="<?php echo URLROOT ?>/hospitals/edit_blood_info/<?php echo $data['bloodInfo']->id ?>" method="POST">
    <h1 class="h3 mb-3 text-danger font-weight-normal"><span><i class="fa fa-pencil-square-o"></i></span> Blood</h1>
    <label for="inputBloodGroup" class="sr-only">Hospital Name</label>
    <input type="text" name="blood_group" id="inputBloodGroup" class="form-control" value = "<?php echo $data['bloodInfo']->blood_group; ?>"  autofocus>
    
    <label for="inputNumTransBag" class="sr-only">Hospital Address</label>
    <input type="text" name="num_trans_bag" id="inputNumTransBag" class="form-control" value = "<?php echo $data['bloodInfo']->num_trans_bag; ?>">
    
    <button class="btn btn-lg btn-danger" type="submit">Save Changes</button>
    <a class="btn btn-lg btn-light" href="<?php echo URLROOT;?>/hospitals/index">Go Back</a>
  </form>

</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>
