<!-- Page content-->
<div class="container-fluid cont">
    <h1 class="mt-4">User Level</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add"><i class="bi bi-plus-lg"></i></button>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Level</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?=base_url()?>user_level/add_level" method="post">
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-12">
                <label for="inputAddress" class="form-label">Level Name</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="nama_level" required>
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
                <th>Level</th>
                <th>Access</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userlevel as $userlevel) {
              $id = $userlevel->id_level;
              ?>
            <tr>
                <td><?=$userlevel->nama_level?></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#akseslevel<?=$userlevel->id_level?>">
                      Update Access
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="akseslevel<?=$userlevel->id_level?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?=$userlevel->nama_level?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="min-width: 500px;">
                                  <thead>
                                    <tr>
                                      <th scope="col">Menu</th>
                                      <th scope="col">View</th>
                                      <th scope="col">Add</th>
                                      <th scope="col">Edit</th>
                                      <th scope="col">Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $akseslevel = $this->db->query("SELECT tam.id,tam.id_level,nama_level,tam.id_menu,nama_menu,is_active,view_level,add_level,edit_level,delete_level from tbl_akses_menu tam left join tbl_menu tm on tm.id_menu = tam.id_menu left join tbl_userlevel tu on tu.id_level = tam.id_level where tam.id_level=$id")->result();
                                    foreach ($akseslevel as $akseslevel){
                                    ?>
                                    <tr>
                                      <td><?=$akseslevel->nama_menu?></td>
                                      <td>
                                        <div class="form-check form-switch">
                                          <input class="form-check-input update_akses" type="checkbox" data-id="<?=$akseslevel->id?>" data-type="view_level" <?php if($akseslevel->view_level=="Y"){ echo"checked";}?>>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="form-check form-switch">
                                          <input class="form-check-input update_akses" type="checkbox" data-id="<?=$akseslevel->id?>" data-type="add_level" <?php if($akseslevel->add_level=="Y"){ echo"checked";}?>>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="form-check form-switch">
                                          <input class="form-check-input update_akses" type="checkbox" data-id="<?=$akseslevel->id?>" data-type="edit_level" <?php if($akseslevel->edit_level=="Y"){ echo"checked";}?>>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="form-check form-switch">
                                          <input class="form-check-input update_akses" type="checkbox" data-id="<?=$akseslevel->id?>" data-type="delete_level" <?php if($akseslevel->delete_level=="Y"){ echo"checked";}?>>
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
                        </div>
                      </div>
                    </div>
                </td>
                <td></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</div>
