<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="profile">
        <div class="table-responsive">
            <table class="table table-hover table-borderless text-center">
                <thead>
                    
                <button class="btn btn-danger btn-md" onclick="window.location.href = '<?php echo URLROOT;?>/hospitals/edit'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; CREDENTIALS</button>

                </thead>
                <tbody class="mt-3">

                    <tr>
                    <th>HOSPITAL NAME</th>

                    <td><?php echo $data['hospital']->hname;?></td>

                    </tr>
                    <tr>
                    <th>HOSPITAL EMAIL</th>

                    <td><?php echo $data['hospital']->hemail;?></td>

                    </tr>
                    <th>CONTACT NUMBER</th>

                    <td><?php echo $data['hospital']->contact_no;?></td>

                    </tr>

                    <tr>
                    <th>HOSPITAL ADDRESS</th>

                    <td><?php echo $data['hospital']->haddress;?></td>
                    
                    </tr>

                </tbody>
            </table>
        </div>
        

        <?php if(!empty($data['bloodInfo'])): ?>
          <div class="table-responsive-sm">
            <table class="table table-hover table-borderless text-center">
                <thead>

                    <button class="btn btn-danger"><span><i class="fa fa-eye"></i></span>&nbsp;&nbsp;BLOOD INFO</button>

                </thead>
                <tbody class="mt-3">
                    <tr>
                        <th>BLOOD GROUP</th>
                        <th>TRASFUSION BAGS</th>
                        <th>ACTION</th>
                    </tr>

                    <?php foreach($data['bloodInfo'] as $bloodInfo):?>
                        <tr>
                            <th><?php echo $bloodInfo->blood_group;?></th>
                            <td><?php echo $bloodInfo->num_trans_bag; ?></td>
                            <td><span><a href="<?php echo URLROOT?>/hospitals/edit_blood_info/<?php echo $bloodInfo->id?>" class="btn btn-danger btn-md"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;<button class="btn btn-danger btn-md" onclick="if(confirm('Are you Sure??')){
                                window.location.href = '<?php echo URLROOT?>/hospitals/delete_blood_info/<?php echo $bloodInfo->id?>';
                            }"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
          </div>  
        <?php endif;?>

        <?php if(!empty($data['show_response'])): ?>
          <div class="table-responsive-sm">
            <table class="table table-hover table-borderless text-center">
                <thead>

                    <button class="btn btn-danger"><span><i class="fa fa-eye"></i></span>&nbsp;&nbsp;RESPONSE STATUS</button>

                </thead>
                <tbody class="mt-3">
                    <tr>
                        <th>NAME</th>
                        <th>PHONE NUMBER</th>
                        <th>EMAIL</th>
                        <th>BLOOD GROUP</th>
                        <th>BG REQUEST</th>
                        <th>STATUS</th>
                    </tr>

                    <?php foreach($data['show_response'] as $response):?>
                        <tr>
                            <td><?php echo $response->name;?></td>
                            <td><?php echo $response->phone_no;?></td>
                            <td><?php echo $response->email;?></td>
                            <td><?php echo $response->bg; ?></td>
                            <td><?php echo $response->rbg?></td>
                            <td class='text-danger'><?php echo strtoupper($response->request) ?></td>
                            
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
          </div>  
        <?php endif;?>
</div>


<?php require APPROOT.'/views/inc/footer.php'; ?>