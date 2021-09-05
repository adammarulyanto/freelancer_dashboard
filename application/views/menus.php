<!-- Page content-->
<div class="container-fluid cont">
    <h1 class="mt-4">Menu</h1>
    <!-- <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add"><i class="bi bi-plus-lg"></i></button> -->

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Link</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label">Icon</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                <i>Get icon in <a href="https://boxicons.com/">https://boxicons.com/</a></i>
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label">Urutan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label">Active</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="shadow-sm mb-5 p-3 bg-white rounded box-data">
      <table id="example" class="table table-responsive table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Link</th>
                <th>Icon</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menus as $menus) {?>
            <tr>
                <td><?=$menus->nama_menu?></td>
                <td><?=$menus->link?></td>
                <td><i class="<?=$menus->icon?>"></i></td>
                <td><?=$menus->is_active?></td>
                <td></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</div>
