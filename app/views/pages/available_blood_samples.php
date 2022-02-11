<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="profile">

<?php if(!empty($data['hospitalsDetail'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">S.NO.</th>
            <th scope="col">HOSPITAL NAME</th>
            <th scope="col">HOSPITAL EMAIL</th>
            <th scope="col">HOSPITAL CONTACT NUMBER</th>
            <th scope="col">HOSPITAL ADDRESS</th>
            <th scope="col">BLOOD GROUP</th>
            <?php if(isLoggedIn() && $_SESSION['type'] == 'receiver' || !isset($_SESSION['type'])): ?>
            <th scope="col">ACTION</th>
            <?php endif;?>
            
            </tr>
        </thead>
        <tbody>
        <?php 
        $count = 1;
        foreach($data['hospitalsDetail'] as $hospitalDetail): ?>
            <tr>
            <th scope="row"><?php echo $count;?></th>
            <td><?php echo $hospitalDetail->hname;?></td>
            <td><?php echo $hospitalDetail->hemail;?></td>
            <td><?php echo $hospitalDetail->contact_no;?></td>
            <td><?php echo $hospitalDetail->haddress;?></td>
            <td><?php echo $hospitalDetail->blood_group;?></td>
            <?php if(isLoggedIn()):?>
                <?php if($_SESSION['type'] == 'receiver'):?>
                    <td>
                        <button class="btn btn-md btn-dark text-white" onclick="if(confirm('Are you Sure??')){
                            window.location.href = '<?php echo URLROOT?>/receivers/request/<?php echo $hospitalDetail->hid?>/<?php echo $hospitalDetail->bid?>';
                        }">
                            Request Sample
                        </button>
                    </td>
                <?php else:?>
                    <?php if($_SESSION['type'] == 'hospital') :?>
                    <?php endif;?>
                <?php endif;?>
            <?php else:?>
                    <td><button class="btn btn-md btn-danger" onclick="window.location.href = '<?php echo URLROOT?>/receivers/login'">Request Sample</button></td>
            <?php endif;?>
            </tr>
            
        <?php 
        $count ++;
        endforeach;?>   
        </tbody>
        </table>

    </div>
<?php else:?>
    <p class="text-danger font-weight-normal display-4 text-center">NO BLOOD SAMPLES AVAILABLE YET..</p>
<?php endif;?>

</div>



<?php require APPROOT.'/views/inc/footer.php'; ?>































