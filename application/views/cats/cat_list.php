<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>


<style>
 /* The Modal (background) */
 .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
} 
/*  */
.container {
  position: relative;
  width: 30%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #04AA6D;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
/*  */
</style>


<body>

 <!-- Trigger/Open The Modal -->
 <button id="myBtn" hidden>Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal" style="display:block">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" hidden>&times;</span>
    <div class="mt-0 p-5 bg-primary text-white">
      <h1>Selamat Datang di catshop 088</h1>
      <!--  -->
      <p>Pilihlah menu berikut</p>
    </div>
    <div class="row">
    <!--  -->
    <div class="col-sm-3 mt-5 ms-3 container">
      <img  src="<?= base_url('assets/img-cat1.png'); ?>" alt="Avatar" class="image" style="width:100%">
      <div class="middle">
        <!-- <div class="text">John Doe</div> -->
        <button id="masuk" class="btn btn-primary">List Kucing</button>
      </div>
    </div>
    <!--  -->
    <div class="col-sm-3 mt-5 ms-3 container">
      <img  src="<?= base_url('assets/img-cat1.png'); ?>" alt="Avatar" class="image" style="width:100%">
      <div class="middle">
        <!-- <div class="text">John Doe</div> -->
        <a id="masuk" class="btn btn-primary" href="<?=site_url('Categori/')?>">List Categori</a>
      </div>
    </div>
    <!--  -->
    </div>
  </div>
</div> 
<!--  -->

<div class="mt-0 p-5 bg-primary text-white">
  <h1>Daftar Kucing</h1>
  <?= $this->session->flashdata('msg'); ?>
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
    <a class="btn btn-dark mt-4 ms-3" href="<?=site_url('Welcome/add')?>">Add new cat</a>
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
    <?php foreach($cats as $cat) { ?>
    <div class="col-sm-3 mt-5 ms-3">
        <div class="card bg-dark text-white" style="width:400px">
          <div class="card-body">
            <h4 class="card-title"><?= $i++ ?>. <?= $cat->name ?>, $<?= $cat->price ?></h4>
            <p class="card-text"> <?= $cat->name ?> adalah kucing Type <?= $cat->type ?> dengan Gender <?= $cat->gender ?> yang sudah berumur <?= $cat->age ?>.</p>
            <a href="<?=site_url('Welcome/edit/'.$cat->id)?>" class="btn btn-primary">Edit</a> 
            <a href="<?=site_url('Welcome/changephoto/'.$cat->id)?>" class="btn btn-primary">Change Photo</a> 
            <a href="<?=site_url('Welcome/delete/'.$cat->id)?>" class="btn btn-danger" onclick="return confirm('Confurm Delete?')" >Delete</a>
    <?php if($cat->sold==1) echo 'SOLD' ;else{ ?><a href="<?=site_url('Welcome/sale/'.$cat->id)?>" class="btn btn-warning" onclick="return confirm('Confurm Sale?')" >Sale</a> <?php } ?>
          </div>
          <img class="card-img-bottom"   src="<?= base_url('uploads/cats/'.$cat->photo) ?>" alt="Card image" style="width:100%">
        </div>
    </div>
    <?php } ?>
  </div>
  <p><?=$this->pagination->create_links();?></p>
  
<?php $this->load->view('footer'); ?>