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

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('')?>">Cancel</a>

<form action="">
  <div class="mb-3 mt-3 ms-3">
    <label for="nama" class="form-label">nama:</label>
    <input type="nama" class="form-control" id="nama" placeholder="Enter nama" name="nama">
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="nama" class="form-label">nama:</label>
    <input type="nama" class="form-control" id="nama" placeholder="Enter nama" name="nama">
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="nama" class="form-label">nama:</label>
    <input type="nama" class="form-control" id="nama" placeholder="Enter nama" name="nama">
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="nama" class="form-label">nama:</label>
    <input type="nama" class="form-control" id="nama" placeholder="Enter nama" name="nama">
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="nama" class="form-label">nama:</label>
    <input type="nama" class="form-control" id="nama" placeholder="Enter nama" name="nama">
  </div>
  <button type="submit" class="btn btn-primary ms-3">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
