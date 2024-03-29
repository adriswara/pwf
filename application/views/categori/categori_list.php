<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>



<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Daftar Kategori</h1>
  <p>Berikut daftar kategori yang tersedia</p>
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
    <a class="btn btn-dark mt-4 ms-3" href="<?=site_url('Categori/add')?>">Add new Categori</a>
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
    <?php $i=1; foreach($categories as $categori) { ?>
    <div class="col-sm-3 mt-5 ms-3">
        <div class="card bg-dark text-white" style="width:400px">
          <div class="card-body">
            <h4 class="card-title"><?= $i++ ?>. <?= $categori->cate_name ?>,</h4>
            <p class="card-text"> <?= $categori->cate_name ?>, <?= $categori->description ?>.</p>
            <a href="<?=site_url('Categori/edit/'.$categori->id)?>" class="btn btn-primary">Edit</a> 
            <a href="<?=site_url('Categori/delete/'.$categori->id)?>" class="btn btn-danger" onclick="return confirm('Confurm Delete?')" >Delete</a>
          </div>
          <img class="card-img-bottom" src="assets\img-cat1.png" alt="Card image" style="width:100%">
        </div>
    </div>
    <?php } ?>
  </div>
  
<?php $this->load->view('footer'); ?>