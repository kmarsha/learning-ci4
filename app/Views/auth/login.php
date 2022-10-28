<?= $this->extend('layouts/app') ?>

<?= $this->section('css') ?>
<style>
  .error {
    font-size: 1rem;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Login Page</h1>

  <div class="card shadow mb-4">
    <div class="card-body">

      <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('error') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>

      <h1 class="h4 mb-4 text-gray-800 text-center">Form Login</h1>
      <form action="<?= url_to('login') ?>" method="post" name="login-form" id="login-form">
        <div class="form-group mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" value="<?= old('username') ?>" placeholder="Type Username . . . " autocomplete="off">
        </div>
        <div class="form-group mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" value="<?= old('password') ?>" placeholder="Type Password . . . " autocomplete="off">
        </div>
        <div class="text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
  $(document).ready(function() {
    $("#login-form").validate({
      rules: {
        username: {
          required: true,
          alphanumeric: true,
          minlength: 3,
        },
        password: {
          required: true,
          alphanumeric: true,
          minlength: 4,
        },
      },
      messages: {
        username: {
          required: 'You should fill your username',
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('text-danger');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },
    })
  })
</script>
<?= $this->endSection() ?>