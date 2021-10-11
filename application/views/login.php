<style type="text/css">
  body{
    background-color: #f8f9fa;
  }
  @media (max-width: 450px) {
    body{
      padding: 0 20px;
    }
  }
  .footer{
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
  }
</style>
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
    <div class="col-12 position-absolute top-50 start-50 translate-middle box-login shadow" style="width: 400px;">
    <!-- <h5 align="center"><strong>Sign in with your account</strong></h5> -->
      <h6 class="title-connecting" align="left">You are connecting to :</h6>
      <h4 align="left" class="fos-title"><strong>Freelancer Onsite Service</strong></h4>
      <br>
      <form action="<?=base_url()?>login/login_act" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="username" class="form-control" name="username" value="<?php if(isset($_COOKIE["user_name"])) { echo $_COOKIE["user_name"]; } ?>">
          <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" value="<?php if(isset($_COOKIE["user_pwd"])) { echo $_COOKIE["user_pwd"]; } ?>">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme">
          <label class="form-check-label" for="exampleCheck1">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary btn-login">Login</button>
      </form>
    </div>
  </div>
</div>