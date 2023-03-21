<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>



<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Daftar Kucing</h1>
  <p>Berikut daftar kucing yang tersedia</p>
</div>
    <!-- <hr>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>type</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Price($)</th>
            <th>Action</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </table> -->
    <a class="btn btn-light mt-4" href="<?=site_url('Welcome/add')?>">Add new cat</a>
    <div class="row">
    <!-- <div class="col-sm-3 mt-5 ms-3">
        <div class="card bg-dark text-white" style="width:400px">
          <div class="card-body">
            <h4 class="card-title">1.Kucing Ipsum</h4>
            <p class="card-text">Kucing Ipsum adalah Type a dengan Gender b yang sudah berumur c.</p>
            <a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Delete</a>
          </div>
          <img class="card-img-bottom" src="assets\img-cat1.png" alt="Card image" style="width:100%">
        </div>
    </div> -->
    <?php $i=1; foreach($cats as $cat) { ?>
    <div class="col-sm-3 mt-5 ms-3">
        <div class="card bg-dark text-white" style="width:400px">
          <div class="card-body">
            <h4 class="card-title"><?= $i++ ?>. <?= $cat->name ?>, $<?= $cat->price ?></h4>
            <p class="card-text"> <?= $cat->name ?> adalah kucing Type <?= $cat->type ?> dengan Gender <?= $cat->gender ?> yang sudah berumur <?= $cat->age ?>.</p>
            <a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Delete</a>
          </div>
          <img class="card-img-bottom" src="assets\img-cat1.png" alt="Card image" style="width:100%">
        </div>
    </div>
    <?php } ?>
  </div>
  
<?php $this->load->view('footer'); ?>