<div id="loader-wrapper">
  <div class="d-flex justify-content-center loading-circle position-absolute top-50 start-50 translate-middle">
    <div class="spinner-border" role="status">
    </div>
  </div>
</div>

<?php foreach($akses_menu as $akses_menu){
if(isset($_GET['alert'])){
  if($_GET['alert']=="add_success" || $_GET['alert']=="edit_success"){
?>
<div class="alert alert-success alert-dismissible fade show justify-content-center" role="alert">
  <strong>Success!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}else if($_GET['alert']=="del_success"){
?>
<div class="alert alert-success alert-dismissible fade show justify-content-center" role="alert">
  <strong>Delete Work Order Success!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}else{
?>
<div class="alert alert-danger alert-dismissible fade show justify-content-center" role="alert">
  <strong>Add Work Order Failed!</strong> Please Contact Administator.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
}
?>
<!-- Page content-->
<div class="container-fluid cont">
    <h1 class="mt-4">Work Order</h1>
    <?php if($akses_menu->add_level=="Y"){?>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add"><i class="bi bi-plus-lg"></i></button>
    <?php
    }
    ?>
    <button class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#filter"><i class="bi bi-funnel"></i></button>

    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Work Order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?=base_url()?>data/add_wo" method="post">
          <div class="modal-body">
            <div class="row g-3">
            <h6>WO Information</h6>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Wo Number</label>
                <input type="text" class="form-control" id="inputAddress" name="wo_number" required>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Case ID</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="case_id" required>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">WO Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="wo_desc" required></textarea>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Product Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="prod_desc" required></textarea>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Asset Serial</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="asset_serial" required>
              </div>
            <h6>Account Information</h6>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="inputAddress" name="company_name" required>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Address</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" required></textarea>
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">City</label>
                <select class="form-select" name="city">
                    <?php foreach($kota as $kota1) { ?>
                      <option value="<?=$kota1->kb_id?>"><?=$kota1->kb_kab_kot?> </option> 
                    <?php } ?> 
                </select>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="inputAddress" name="customer_name" required>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Contact Phone</label>
                <input type="number" class="form-control" id="inputAddress" placeholder="" name="contact_phone" required>
              </div>
            <h6>Date</h6>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Request Date</label>
                <input type="date" class="form-control" id="inputAddress" placeholder="" name="request_date" required>
              </div>
            <h6>Order Information</h6>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Part Number</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="part_number" required>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">Part Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="part_desc" required></textarea>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">IGSO Number</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="igso_number" required>
              </div>
              <h6>Asginee</h6>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Assign to</label>
                <select class="form-select" name="freelancer">
                  <?php foreach($freelancer as $flancer1) { ?>
                    <option value="<?=$flancer1->ud_id?>"><?=$flancer1->ud_fullname?> </option> 
                  <?php } ?> 
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
    
    <!-- Modal -->
    <div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form>
          <div class="modal-body">
            <div class="row g-3">
            <h6>Created Date</h6>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">From</label>
                <input type="date" class="form-control" id="inputAddress" name="create_from">
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">To</label>
                <input type="date" class="form-control" id="inputAddress" name="create_to">
              </div>
            <h6>Request Date</h6>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">From</label>
                <input type="date" class="form-control" id="inputAddress" name="req_from">
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">To</label>
                <input type="date" class="form-control" id="inputAddress" name="req_to">
              </div>
            <h6>Booking Status</h6>
              <div class="col-12">
                  <?php foreach($booking_status as $bstatus1) { ?>    
                  <div class="cat action">
                     <label>
                        <input type="checkbox" name="book_status[]" value="<?=$bstatus1->mgp_code_id?>"><span><?=$bstatus1->mgp_desc?></span>
                     </label>
                  </div>
                  <?php } ?>
              </div>

            <h6>Part Status</h6>
              <div class="col-12">
                  <?php foreach($part_status as $pstatus) { ?>    
                  <div class="cat action">
                     <label>
                        <input type="checkbox" name="part_status[]" value="<?=$pstatus->mgp_code_id?>"><span><?=$pstatus->parts_status?></span>
                     </label>
                  </div>
                  <?php } ?>
              </div>

            <h6>Freelancer</h6>
              <div class="col-12">
                  <?php foreach($freelancer as $flancer1) { ?>  
                  <div class="cat action">
                     <label>
                        <input type="checkbox" name="freelancer[]" value="<?=$flancer1->ud_id?>"><span><?=$flancer1->ud_fullname?></span>
                     </label>
                  </div>
                  <?php } ?>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Filter</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="shadow-sm mb-5 p-3 bg-white rounded box-data">
      <table id="example" class="table table-responsive table-hover" style="width:100%">
        <thead>
            <tr>
                <th>WO Number</th>
                <th>Case Id</th>
                <th>Asset Serial</th>
                <th>WO Description</th>
                <th>Company Name</th>
                <th>Create Date</th>
                <th>Requested Date</th>
                <th>Finish Date</th>
                <th>Booking Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workorder as $workorder) {?>
            <tr>
                <td><?=$workorder->wo_number?></td>
                <td><?=$workorder->case_id?></td>
                <td><?=$workorder->asset_serial?></td>
                <td><?=$workorder->wo_desc?></td>
                <td><?=$workorder->company_name?></td>
                <td><?=$workorder->created_date?></td>
                <td><?=$workorder->requested_date?></td>
                <td><?=$workorder->finish_date?></td>
                <td><?=$workorder->booking_status?></td>
                <td>
                  <?php if($akses_menu->view_level=="Y"){?>
                    <i class="bi bi-eye btn-action" data-bs-toggle="modal" data-bs-target="#view" id="getwo" data-id="<?=$workorder->wo_id?>"></i>
                  <?php
                  }
                  if($akses_menu->delete_level=="Y"){
                  ?>
                    <i class="bi bi-trash btn-action" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center">
                            <i class='bx bx-help-circle icon-modal-delete'></i>
                            <h3>Are You Sure?</h3>
                            <p>Do you really want to delete these records? This process cannot be undone.</p>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-danger" onclick="window.location='<?=base_url()?>data/delete_data?id=<?=$workorder->wo_id?>'">Yes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  if($akses_menu->edit_level=="Y"){
                  ?>
                  <i class="bi bi-pencil-square btn-action" onclick="location.href='<?=base_url()?>data/edit_wo?id_wo=<?=$workorder->wo_id_sha1?>'"></i>
                  <?php
                  }
                  ?>
                </td>
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

<div class="modal fade modal_kanban" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Work Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="loader" style="display: none; text-align: center;">
          <img src="<?=base_url()?>assets/img/ajax-loader.gif"> 
        </div> 
        <div class="row g-3" id="datawo"> 
        <div class="col-md-6">
          <label for="inputState" class="form-label">Assigned to</label>
          <select id="freelancer" class="form-select form-select-freelancer" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
            <?php foreach($freelancer as $flancer1) { ?>
              <option value="<?=$flancer1->ud_id?>"><?=$flancer1->ud_fullname?> </option> 
            <?php } ?>
          </select>
        </div>
        <div class="col-md-6">
          <label for="inputState" class="form-label">Booking Status</label>
          <select id="booking_status" class="form-select form-select-book-status" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
            <?php foreach($booking_status as $bstatus) { ?>
              <option value="<?=$bstatus->mgp_code_id?>"><?=$bstatus->mgp_desc?> </option> 
            <?php } ?>
          </select>
        </div>
        <div class="col-md-6">
          <label for="inputState" class="form-label">Part Status</label>
          <select id="update_status" class="form-select form-select-status" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
            <?php foreach($part_status as $pstatus) { ?>
              <option value="<?=$pstatus->mgp_code_id?>"><?=$pstatus->parts_status?> </option> 
            <?php } ?>
          </select>
        </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Other Information
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="inputState" class="form-label">Failure</label>
                    <p id="failure_code"></p>
                  </div>
                  <div class="col-md-6">
                    <label for="inputState" class="form-label">Delay Code</label>
                    <p id="delay_code"></p>
                  </div>
                  <div class="col-md-6">
                    <label for="inputState" class="form-label">Visit</label>
                    <p id="visit"></p>
                  </div>

                  <div class="col-md-6">
                    <label for="inputState" class="form-label">Link HP SubK Partner</label>
                    <p id="link"></p>
                  </div>

                  <div class="col-md-6">
                    <label for="inputState" class="form-label">Comment</label>
                    <p id="comment"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h6>WO Information</h6>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Wo Number</label>
            <p id="wo_number"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Case ID</label>
            <p id="case_id"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">WO Description</label>
            <p id="wo_desc"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Product Description</label>
            <p id="product_desc"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Asset Serial</label>
            <p id="asset_serial"></p>
          </div>
        <h6>Account Information</h6>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Company Name</label>
            <p id="company_name"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Address</label>
            <p id="address"></p>
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">City</label>
            <p id="city"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Customer Name</label>
            <p id="contact_name"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Contact Phone</label>
            <p id="contact_phone"></p>
          </div>
        <h6>Date</h6>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Request Date</label>
            <p id="requested_date"></p>
          </div>
        <h6>Order Information</h6>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Part Number</label>
            <p id="part_number"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Part Description</label>
            <p id="part_desc"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">IGSO Number</label>
            <p id="igso_number"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>