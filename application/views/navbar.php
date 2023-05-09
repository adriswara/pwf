<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)"> <h1>CATSHOP 088</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <!-- <a class="nav-link" href="">Home </a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url() ?>">Home & Cat List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=site_url('Categori/')?>">Categories</a>
        </li>
        <?php if($this->session->userdata('usertype')=='Manager') {?>
            <li class="nav-item"><a class="nav-link" href="<?=site_url('users/list')?>">Manage Users</a></li>
            <li class="nav-item"><a class="nav-link" href="<?=site_url('cats/sales')?>">Sales Report</a></li>
             <?php } ?> 
        <li class="nav-item">
            <li><a class="nav-link" href="<?=site_url('auth/changepass')?>">Change Password</a></li>
            <li><a class="nav-link" href="<?=site_url('auth/logout')?>">Logout</a></li>
        </li>
      <li class="nav-item">
          <li> <a class="nav-link"> <?=$this->session->userdata('fullname')?>, you are login as <?=$this->session->userdata('usertype')?> </a>       </li>
      </li>
        
      </ul>
      <form class="d-flex">


      <button  class="btn btn-warning" type="button"><a href="<?=site_url('auth/changephoto')?>">Photo</a></button>
      <img  src="<?= base_url('uploads/users/'.$this->session->userdata('photo')) ?>" alt="Trulli" width="50" height="40">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
    </div>
  </div>
</nav>