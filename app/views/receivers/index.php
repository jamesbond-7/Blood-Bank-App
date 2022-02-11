<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="profile">
    <div class="table-responsive">
        <table class="table table-hover table-borderless text-center">
            <thead>
                <button class="btn btn-danger"  onclick="window.location.href = '<?php echo URLROOT;?>/receivers/edit'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; CREDENTIALS</button>
            </thead>
            <tbody>
                <tr>
                <th>RECEIVER NAME</th>
                <td><?php echo $data['receiver']->name;?></td>
                </tr>
                <tr>
                <th>RECEIVER EMAIL</th>
                <td><?php echo $data['receiver']->email;?></td>
                </tr>
                <th>PHONE NUMBER</th>
                <td><?php echo $data['receiver']->phone_no;?></td>
                </tr>
                <tr>
                <tr>
                <th>BLOOD GROUP</th>
                <td><?php echo $data['receiver']->blood_group;?></td>
                </tr>
    
            </tbody>
        </table>
        
    </div>

    <?php if(!empty($data['show_requests'])): ?>
    
        <div class="table-responsive-sm">
            <table class="table table-hover table-borderless text-center">
                <thead>
                    <button class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; REQUEST STATUS</button>
                </thead>
                <tbody class="mt-3">
                    <tr>
                        <th>HOSPITAL NAME</th>
                        <th>CONTACT NUMBER</th>
                        <th>EMAIL</th>
                        <th>BG REQUEST</th>
                        <th>STATUS</th>
                    </tr>
                    <?php foreach($data['show_requests'] as $request):?>
                        <tr>
                            <td><?php echo $request->hname; ?></td>
                            <td><?php echo $request->contact_no; ?></td>
                            <td><?php echo $request->hemail; ?></td>
                            <td><?php echo $request->rbg;?></td>
                            <td class="text-danger"><?php echo strtoupper($request->request) ;?></td>                
                        <tr>
                    <?php endforeach;?>
                </tbody>
            </table>  
        </div>
        
    <?php endif;?>

</div>





<?php require APPROOT.'/views/inc/footer.php'; ?>
