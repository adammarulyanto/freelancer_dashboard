<?php foreach($akses_menu as $akses_menu){
if(isset($_GET['alert'])){
  if($_GET['alert']=="add_success"){
?>
<div class="alert alert-success alert-dismissible fade show justify-content-center" role="alert">
  <strong>Add User Data Success!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}else if($_GET['alert']=="update_success"){
?>
<div class="alert alert-success alert-dismissible fade show justify-content-center" role="alert">
  <strong>Update User Data Success!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}else{
?>
<div class="alert alert-danger alert-dismissible fade show justify-content-center" role="alert">
  <strong>Action Failed!</strong> Please Contact Administator.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
}
?>
<div class="container-fluid cont">
    <h1 class="mt-4">User Data</h1>
    <?php if($akses_menu->add_level=="Y"){?>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add"><i class="bi bi-plus-lg"></i></button>
    <?php
    }
    ?>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?=base_url()?>user_data/add_user" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="fullname" required>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="inputAddress" placeholder="" name="email" required>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="username" required>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputAddress" placeholder="" name="password" required>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Level</label>
                <select class="form-select" name="level">
                  <?php foreach($level as $level1) { ?>
                    <option value="<?=$level1->id_level?>"><?=$level1->nama_level?> </option> 
                  <?php } ?> 
                </select>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Active</label>
                <select class="form-select" name="is_active">
                    <option value="Y">Yes</option>  
                    <option value="N">No</option>  
                </select>
              </div>
              <div class="col-md-12">
                <label for="formFileSm" class="form-label">Avatar</label>
                <input class="form-control" id="formFileSm" type="file" name="avatar">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="shadow-sm mb-5 p-3 bg-white rounded box-data">
      <table id="example" class="table table-responsive table-hover" style="width:100%">
        <thead>
            <tr>
                <th width="50px"></th>
                <th>Fullname</th>
                <th>Email Address</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Active</th>
                <?php if($akses_menu->edit_level=="Y"){echo '<th>Action</th>';}?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $users) {?>
            <tr>
                <td align="center"><img src="<?=base_url()?>assets/img/avatar_user/<?=$users->ava?>" alt="profileImg" class="img-thumbnail img-table"></td>
                <td><?=$users->ud_fullname?></td>
                <td><?=$users->ud_email_address?></td>
                <td><?=$users->ud_username?></td>
                <td></td>
                <td><?=$users->nama_level?></td>
                <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input update_aktif_user" type="checkbox" data-id="<?=$users->ud_id?>" data-type="view_level" <?php if($users->ud_is_active=="Y"){ echo"checked";}?> <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
                    </div>
                </td>
                <?php if($akses_menu->edit_level=="Y"){?>
                <td>
                  <i class="bi bi-pencil-square btn-action" data-bs-toggle="modal" data-bs-target="#editlevel<?=$users->ud_id?>"></i>
                  <div class="modal fade" id="editlevel<?=$users->ud_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit User Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?=base_url()?>user_data/update_data" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="row g-3" id="datawo">
                            <input type="hidden" class="form-control" id="inputAddress" placeholder="" name="id_user" value="<?=$users->ud_id?>" required>
                            <div class="col-md-6">
                              <label for="inputState" class="form-label">Fullname</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="" name="fullname" value="<?=$users->ud_fullname?>" required>
                            </div>
                            <div class="col-md-6">
                              <label for="inputState" class="form-label">Email</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="" name="email" value="<?=$users->ud_email_address?>" required>
                            </div>
                            <div class="col-md-6">
                              <label for="inputState" class="form-label">Username</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="" name="username" value="<?=$users->ud_username?>" required>
                            </div>
                            <div class="col-md-6">
                              <label for="inputState" class="form-label">Password</label>
                              <input type="password" class="form-control" id="inputAddress" name="password" placeholder="Insert New Password">
                              <div id="emailHelp" class="form-text">Leave it blank if you don't want to change the password.</div>
                            </div>
                            <div class="col-md-6">
                              <label for="inputState" class="form-label">Level</label>
                              <select class="form-select" name="level">
                                <?php foreach($level as $level2) { ?>
                                  <option value="<?=$level2->id_level?>" <?php if($users->ud_id_level == $level2->id_level){ echo "selected";}?> ><?=$level2->nama_level?> </option> 
                                <?php } ?> 
                              </select>
                            </div>
                            <div class="col-md-6">
                              <label for="inputState" class="form-label">Active</label>
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" data-type="view_level" <?php if($users->ud_is_active=="Y"){ echo"checked";}?> style="width:45px; height: 25px;">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="formFileSm" class="form-label">Avatar</label>
                              <input class="form-control" id="formFileSm" type="file" name="avatar">
                              <div id="emailHelp" class="form-text">Leave it blank if you don't want to change the avatar.</div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
                <?php
                }
                ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</div>
<?php
}
?>
