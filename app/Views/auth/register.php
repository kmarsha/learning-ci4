<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Register Page</h1>

  <div class="card shadow mb-4">
    <div class="card-body">
      <h1 class="h4 mb-4 text-gray-800 text-center">Form Register</h1>
      <form action="<?= url_to('register') ?>" method="post">
        <div class="form-group mb-3">
          <label for="first_name" class="form-label">First Name</label>
          <input type="text" class="form-control <?= (service('validation')->hasError('first_name')) ? 'is-invalid' : '' ?>" name="first_name" id="first_name" value="<?= old('first_name') ?>" placeholder="Type First Name . . . ">
          <div class="row justify-content-start m-1">
            <?php if (service('validation')->hasError('first_name')) : ?>
              <span class="text-danger" role="alert">
                <small><?= service('validation')->getError('first_name') ?></small>
              </span>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="last_name" class="form-label">Last Name</label>
          <input type="text" class="form-control <?= (service('validation')->hasError('last_name')) ? 'is-invalid' : '' ?>" name="last_name" id="last_name" value="<?= old('last_name') ?>" placeholder="Type Last Name . . . ">
          <div class="row justify-content-start m-1">
            <?php if (service('validation')->hasError('last_name')) : ?>
              <span class="text-danger" role="alert">
                <small><?= service('validation')->getError('last_name') ?></small>
              </span>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control <?= (service('validation')->hasError('username')) ? 'is-invalid' : '' ?>" name="username" id="username" value="<?= old('username') ?>" placeholder="Type Username . . . ">
          <div class="row justify-content-start m-1">
            <?php if (service('validation')->hasError('username')) : ?>
              <span class="text-danger" role="alert">
                <small><?= service('validation')->getError('username') ?></small>
              </span>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control <?= (service('validation')->hasError('password')) ? 'is-invalid' : '' ?>" name="password" id="password" value="<?= old('password') ?>" placeholder="Type Password . . . ">
          <div class="row justify-content-start m-1">
            <?php if (service('validation')->hasError('password')) : ?>
              <span class="text-danger" role="alert">
                <small><?= service('validation')->getError('password') ?></small>
              </span>
            <?php endif ?>
          </div>
        </div>
        <div class="text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

</div>
<?= $this->endSection() ?>