<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">User Page</h1>

      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
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

            <div class="mx-2 mb-4 text-right">
              <a href="<?= base_url() ?>/user/new">
                <button class="btn btn-primary">+ Add User</button>
              </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      <?php foreach ($users as $key => $user) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->firstName . " " . $user->lastName ?></td>
                        <td><?= $user->firstName ?></td>
                        <td><?= $user->lastName ?></td>
                        <td>
                          <a href="<?= base_url() ?>/user/<?= $user->user_id ?>/edit" class="btn btn-warning">Edit</a>
                          <a href="<?= base_url() ?>/user/<?= $user->user_id ?>/delete" onclick="return confirm('Are u sure to delete this user?')" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
  </div>
  <!-- /.container-fluid -->
<?= $this->endSection() ?>