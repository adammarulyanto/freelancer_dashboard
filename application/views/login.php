<?php
if(isset($_GET['alert'])){
  if($_GET['alert']=="inactive"){
?>
<div class="alert alert-warning alert-dismissible fade show justify-content-center" role="alert">
  <strong>Your Account is Inactive!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}else{
?>
<div class="alert alert-danger alert-dismissible fade show justify-content-center" role="alert">
  <strong>Wrong Username or Password</strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
}
?>
<div class="container">
  <div class="row">
    <div class="col-12 position-absolute top-50 start-50 translate-middle" style="width: 400px;">
      <h1 align="center"><img src="https://iconape.com/wp-content/files/hx/58721/svg/freelancer-1.svg" class="img-fluid" style="max-width: 100px; transform: translateY(-100px); margin: 0;"></h1>
      <h1><strong>Login</strong></h1>
      <form action="<?=base_url()?>login/login_act" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="username" class="form-control" name="username">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary btn-login">Login</button>
      </form>
    </div>
  </div>
</div>