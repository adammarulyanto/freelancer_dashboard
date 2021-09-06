
<div class="container-fluid cont">
    <h1 class="mt-4">User Data</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add"><i class="bi bi-plus-lg"></i></button>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?=base_url()?>user_data/add_user" method="post">
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-12">
                <label for="inputAddress" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="fullname" required>
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
                <th>Fullname</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $users) {?>
            <tr>
                <td><?=$users->ud_fullname?></td>
                <td><?=$users->ud_username?></td>
                <td></td>
                <td><?=$users->nama_level?></td>
                <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input update_aktif_user" type="checkbox" data-id="<?=$users->ud_id?>" data-type="view_level" <?php if($users->ud_is_active=="Y"){ echo"checked";}?>>
                    </div>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</div>
