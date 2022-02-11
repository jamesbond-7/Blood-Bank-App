<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="profile">

<?php if(!empty($data['requests'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">S.NO.</th>
            <th scope="col">RECEIVER NAME</th>
            <th scope="col">RECEIVER EMAIL</th>
            <th scope="col">RECEIVER PHONE NUMBER</th>
            <th scope="col">RECEIVER BLOOD GROUP</th>
            <th scope="col">REQUESTED BLOOD GROUP</th>            
            <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count = 1;
            foreach($data['requests'] as $request): ?>
                <tr>
                <th scope="row"><?php echo $count;?></th>
                <td><?php echo $request->name;?></td>
                <td><?php echo $request->email;?></td>
                <td><?php echo $request->phone_no;;?></td>
                <td><?php echo $request->receiver_blood_group;?></td>
                <td><?php echo $request->requested_blood_group;?></td>
                        <td>
                            <button class="btn btn-md btn-dark text-white" onclick="if(confirm('Are you Sure??')){
                                window.location.href = '<?php echo URLROOT?>/hospitals/response_request/<?php echo $request->rid?>/<?php echo $request->blood_info_id?>';
                            }">
                            GRANT REQUEST
                            </button>
                        </td>
                </tr>
                
            <?php 
            $count ++;
            endforeach;?>   
        </tbody>
        </table>

    </div>
<?php else:?>
        <p class="text-danger font-weight-normal display-4 text-center">NO REQUEST AVAILABLE</p>
<?php endif;?>


</div>



<?php require APPROOT.'/views/inc/footer.php'; ?>































