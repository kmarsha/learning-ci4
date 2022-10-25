<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
  <div class="container-fluid">
    
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Register Page</h1>

      <div class="card shadow mb-4">
        <div class="card-body">   
          <h1 class="h4 mb-4 text-gray-800 text-center">Form Register</h1>
          <form action="<?= url_to('register') ?>" method="post">
            <div class="mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Type First Name . . . " required>
            </div>
            <div class="mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Type Last Name . . . " required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Type Username . . . " required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Type Password . . . " required>
            </div>
            <div class="text-right">
              <button class="btn btn-success" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>

  </div>
<?= $this->endSection() ?>