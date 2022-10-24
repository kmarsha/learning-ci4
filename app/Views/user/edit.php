<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
  <div class="container-fluid">
    
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">User Page</h1>

      <div class="card shadow mb-4">
        <div class="card-body">   
          <h1 class="h4 mb-4 text-gray-800 text-center">Form Edit User</h1>
          <form action="<?= base_url() ?>/user/<?= $user->user_id ?>" method="post">
            <div class="mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $user->firstName ?>" placeholder="Type First Name . . . ">
            </div>
            <div class="mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $user->lastName ?>" placeholder="Type Last Name . . . ">
            </div>
            <div class="text-right">
              <button class="btn btn-success" type="submit">Update</button>
            </div>
          </form>
        </div>
      </div>

  </div>
<?= $this->endSection() ?>