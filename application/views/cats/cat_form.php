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
    <!-- <form action="" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="" id=""></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><select name="" id="">
                    <option value="">Choose type</option>
                    <option value="">Domestic</option>
                    <option value="">Angora</option>
                    <option value="">Persia</option>
                </select></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="" id="">Male<input type="radio" name="" id="">Female</td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="" id=""></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SAVE"></td>
            </tr>
        </table>
    </form> -->

    <?php 
      $name='';
      $type='';
      $gender='';
      $age='';
      $price='';
    if (isset($cat)) {
      $name=$cat->name;
      $type=$cat->type;
      $gender=$cat->gender;
      $age=$cat->age;
      $price=$cat->price;
      
    }

    ?>

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('')?>">Cancel</a>

<form action="" method="post">
  <div class="mb-3 mt-3 ms-3">
    <label for="name" class="form-label">Nama:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $name ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <select name="type" id="" required>
      <option value="">Choose Type</option>
      <?php foreach($categori as $cate) { ?>
        <option value="<?= $cate->cate_name; ?>" <?= set_select('type',$cate->cate_name,$type==$cate->cate_name?TRUE:FALSE)?>> <?= $cate->cate_name; ?> </option>
      <?php } ?>
     
    </select>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="gender" class="form-label">Gender:</label>
    <input type="radio" class="form-radio" id="gender" name="gender" value="male" <?=$gender=='male'?'checked':''?> required>Male
    <input type="radio" class="form-radio" id="gender" name="gender" value="female" <?=$gender=='female'?'checked':''?> required>Female
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="age" class="form-label">Age:</label>
    <input type="number" class="form-control" id="age" placeholder="Enter age" name="age" value="<?= $age ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="price" class="form-label">Price:</label>
    <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" value="<?= $price ?>" required>
  </div>
  <button type="submit" class="btn btn-primary ms-3" value="save" name="submit">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
