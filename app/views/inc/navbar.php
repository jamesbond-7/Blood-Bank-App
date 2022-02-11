 
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <a class="navbar-brand mr-5" href="/bbw/"><img src="<?php echo URLROOT?>/public/img/blood_logo.png" alt="" width="72" height="72"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample09">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active mr-5">
          <a class="nav-link" href="<?php echo URLROOT?>/pages/donate_blood_why">Donate Blood, why ? <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item mr-5">
          <a class="nav-link" href="<?php echo URLROOT?>/pages/need_blood_who">Needs Blood, who?</a>
        </li>

        <?php if(isLoggedIn()):?>
            <?php if($_SESSION['type'] == 'receiver'):?>
              <li class="nav-item dropdown mr-5">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Receivers</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                  <a class="dropdown-item" href="<?php echo URLROOT?>/receivers/index">HOME</a>
                  <a class="dropdown-item" href="<?php echo URLROOT?>/receivers/logout">LOGOUT</a>
                </div>
              </li>
            <?php else : ?>
              <?php if(isset($_SESSION['type']) && $_SESSION['type'] !== 'hospital'): ?>
                <li class="nav-item dropdown mr-5">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Receivers</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="<?php echo URLROOT?>/receivers/register">REGISTER</a>
                    <a class="dropdown-item" href="<?php echo URLROOT?>/receviers/login">LOGIN</a>
                  </div>
                </li>
              <?php endif;?>

            <?php endif;?>
            <?php if($_SESSION['type'] == 'hospital'):?>
              <li class="nav-item dropdown mr-5">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hospitals</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                  <a class="dropdown-item" href="<?php echo URLROOT?>/hospitals/index">HOME</a>
                  <a class="dropdown-item" href="<?php echo URLROOT?>/hospitals/add_blood_info">ADD BLOOD INFO</a>
                  <a class="dropdown-item" href="<?php echo URLROOT?>/hospitals/view_requests_page">VIEW REQUESTS PAGE</a>
                  <a class="dropdown-item" href="<?php echo URLROOT?>/hospitals/logout">LOGOUT</a>
                </div>
              </li>
            <?php else : ?>
              <?php if(isset($_SESSION['type']) && $_SESSION['type'] !== 'receiver'): ?>
                <li class="nav-item dropdown mr-5">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hospitals</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="<?php echo URLROOT?>/hospitals/register">REGISTER</a>
                    <a class="dropdown-item" href="<?php echo URLROOT?>/hospitals/login">LOGIN</a>
                  </div>
                </li>
              <?php endif;?>
            <?php endif;?>
        <?php else:?>
            <li class="nav-item dropdown mr-5">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Receivers</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="<?php echo URLROOT?>/receivers/register">REGISTER</a>
                <a class="dropdown-item" href="<?php echo URLROOT?>/receivers/login">LOGIN</a>
              </div>
            </li>
            <li class="nav-item dropdown mr-5">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hospitals</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="<?php echo URLROOT?>/hospitals/register">REGISTER</a>
                <a class="dropdown-item" href="<?php echo URLROOT?>/hospitals/login">LOGIN</a>
              </div>
            </li>
        <?php endif;?>
          
        <li class="nav-item">
          <a class="nav-link" href=" <?php echo URLROOT?>/pages/available_blood_samples">Available Blood Samples</a>
        </li>
      </ul>
    </div>
</nav>




