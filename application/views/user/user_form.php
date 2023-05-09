<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 

<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>




<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Form Input Kucing</h1>
  <p>Isi form untuk input kucing pada halaman berikut</p>
</div>
<a class="btn btn-danger mt-4 ms-3" href="<?=site_url('')?>">Cancel</a>
  
<div class="container">
<table>
  <?php
  $username='';
  $usertype='';
  $fullname='';
  $password='';
  if(isset($user)){
    $username = $user->username;
    $usertype = $user->usertype;
    $fullname = $user->fullname;
    $password = $user->password;
  }
  ?>
    <form action="" method="post">
          <div class="row mb-3">
            <label for="username">Username <span class="text-danger">*</span></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="username" id="username" value="<?=$username?>" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="usertype">Usertype <span class="text-danger">*</span></label>
            <div class="col-sm-5">
                <select name="usertype" class="form-control" required>
                    <option value="">Choose</option>
                    <option value="Manager"<?=$usertype=='Manager'?'selected':''?>>Manager</option>
                    <option value="Cashier"<?=$usertype=='Cashier'?'selected':''?>>Cashier</option>
                </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="fullname">Fullname <span class="text-danger">*</span></label>
            <div class="col-sm-5">
                <input type="text" name="fullname" class="form-control" id="fullname" value="<?=$fullname?>">
            </div>
          </div>
        <div class="d-grid gap-2 col-6 mx-auto">
          <a href="<?=site_url('users/list')?>" class="btn btn-secondary btn-lg">Close</a>
          <input type="submit" value="Submit" name="submit" class="btn btn-lg btn-primary">
        </div>
    </form>
</table>
</div>

    <?php $this->load->view('footer'); ?>
