<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Home Page</h1>
      
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Our Home Page</h6>
        </div>
        <div class="card-body">

          <?php if (session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('success') ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif ?>

          <a href="<?= url_to('register-view') ?>" class="btn btn-primary">Register</a>
          <a href="<?= url_to('login-view') ?>" class="btn btn-success">Login</a>
          <a href="<?= url_to('user-view') ?>" class="btn btn-info">User</a>

        </div>
      </div>
      
  </div>
  <!-- /.container-fluid -->
<?= $this->endSection() ?>