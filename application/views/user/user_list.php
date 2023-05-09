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
      <img src="assets\img-cat1.png" alt="Avatar" class="image" style="width:100%">
      <div class="middle">
        <!-- <div class="text">John Doe</div> -->
        <button id="masuk" class="btn btn-primary">List Kucing</button>
      </div>
    </div>
    <!--  -->
    <div class="col-sm-3 mt-5 ms-3 container">
      <img src="assets\img-cat1.png" alt="Avatar" class="image" style="width:100%">
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
 <!-- <= $this->session->flashdata('msg'); > -->
  <p>Berikut daftar kucing yang tersedia</p>
</div>
   
<div class="">
  <br>
  <br>
  <a href="<?=site_url('users/add')?>"><button type="button" class="btn btn-primary mb-4">Add New User</button></a>
  <br>
  <br>
  <table class="table table-stripedtable-hover">
    <thead  class="table-light">
      <tr>
            <th>No</th>
            <th>Username</th>
            <th>Usertype</th>
            <th>Fullname</th>
            <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach($users as $user) { ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?=$user->username?></td>
            <td><?=$user->usertype?></td>
            <td><?=$user->fullname?></td>
            <td><a class="btn btn-warning" href="<?=site_url('users/edit/'.$user->userid)?>">Edit</a></td>
            <td><a class="btn btn-danger" href="<?=site_url('users/delete/'.$user->userid)?>" onclick="return confirm('Are you sure?')">Delete</a></td>
            <td><a class="btn btn-success" href="<?=site_url('users/reset/'.$user->userid)?>">Reset Password</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
  
<?php $this->load->view('footer'); ?>