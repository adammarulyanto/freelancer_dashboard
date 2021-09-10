<div id="loader-wrapper">
  <div class="d-flex justify-content-center loading-circle position-absolute top-50 start-50 translate-middle">
    <div class="spinner-border" role="status">
    </div>
  </div>
</div>
<?php foreach($akses_menu as $akses_menu){?>
  <div class="container-fluid cont">
    <h1 class="mt-4">Freelancer Task</h1>
    <button class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#filter"><i class="bi bi-funnel"></i></button>
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
    <div class="row table-responsive">
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 box-kanban">
        <div class="card mb-3 heading-card-kanban" id="waiting_part" >
          <?php foreach($cnt_waitpart as $cnt_waitpart) { ?>
          <div class="card-header heading-card-title sticky-top text-white" style="background:#d35400">Waiting The Parts <span class="badge"><?=$cnt_waitpart->cnt?></span></div>
          <?php } ?>
          <div class="card-body text-success">
            <?php foreach($waitpart as $waitpart){?>
            <div class="card mb-3 border-0 card-kanban card-modal" data-bs-toggle="modal" data-bs-target="#detail_card" data-id="<?=$waitpart->wo_id?>" id="detailcard">
              <div class="card-body text-success">
                <div class="btn-group img-card">
                  <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img-thumbnail-assignee rounded-circle">
                      <img class="img-fluid" src="https://cberry.net/assets/website/img/img-user.png">
                    </div>
                  </button>
                </div>
                <h5 class="card-title">- Break Fix - <?=$waitpart->wo_number?></h5>
                
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 box-kanban">
        <div class="card mb-3 heading-card-kanban">
          <?php foreach($cnt_partpickup as $cnt_partpickup) { ?>
          <div class="card-header heading-card-title sticky-top text-white" style="background:#2980b9">Pickup Parts <span class="badge"><?=$cnt_partpickup->cnt?></span></div>
          <?php } ?>
          <div class="card-body text-success">
            <?php foreach($partpickup as $partpickup){?>
            <div class="card mb-3 border-0 card-kanban" data-bs-toggle="modal" data-bs-target="#detail_card" data-id="<?=$partpickup->wo_id?>" id="detailcard">
              <div class="card-body text-success">
                <div class="btn-group img-card">
                  <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img-thumbnail-assignee rounded-circle">
                      <img class="img-fluid" src="https://cberry.net/assets/website/img/img-user.png">
                    </div>
                  </button>
                </div>
                <h5 class="card-title">- Break Fix - <?=$partpickup->wo_number?></h5>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 box-kanban">
        <div class="card mb-3 heading-card-kanban">
          <?php foreach($cnt_escalation as $cnt_escalation) { ?>
          <div class="card-header heading-card-title sticky-top text-white" style="background:#2c3e50">Escalated <span class="badge"><?=$cnt_escalation->cnt?></span></div>
          <?php } ?>
          <div class="card-body text-success">
            <?php foreach($escalation as $escalation){?>
            <div class="card mb-3 border-0 card-kanban" data-bs-toggle="modal" data-bs-target="#detail_card" data-id="<?=$escalation->wo_id?>" id="detailcard">
              <div class="card-body text-success">
                <div class="btn-group img-card">
                  <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img-thumbnail-assignee rounded-circle">
                      <img class="img-fluid" src="https://cberry.net/assets/website/img/img-user.png">
                    </div>
                  </button>
                </div>
                <h5 class="card-title">- Break Fix - <?=$escalation->wo_number?></h5>
                
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 box-kanban">
        <div class="card mb-3 heading-card-kanban">
          <?php foreach($cnt_partreturn as $cnt_partreturn) { ?>
          <div class="card-header heading-card-title sticky-top text-white" style="background:#27ae60">Return Parts <span class="badge"><?=$cnt_partreturn->cnt?></span></div>
          <?php } ?>
          <div class="card-body text-success">
            <?php foreach($partreturn as $partreturn){?>
            <div class="card mb-3 border-0 card-kanban" data-bs-toggle="modal" data-bs-target="#detail_card" data-id="<?=$partreturn->wo_id?>" id="detailcard">
              <div class="card-body text-success">
                <div class="btn-group img-card">
                  <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img-thumbnail-assignee rounded-circle">
                      <img class="img-fluid" src="https://cberry.net/assets/website/img/img-user.png">
                    </div>
                  </button>
                </div>
                <h5 class="card-title">- Break Fix - <?=$partreturn->wo_number?></h5>
                
              </div>
            </div>
            <?php } ?>
        </div>
      </div>
    </div>
</div>
<?php
}
?>


<div class="modal fade modal_kanban" id="detail_card" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
        <div id="loader_card" style="display: none; text-align: center;">
          <img src="<?=base_url()?>assets/img/ajax-loader.gif"> 
        </div> 
        <div class="row g-3" id="datcard">
        <h4 class="title-detail-card">- Break Fix - <span id="wo_number"></span></h4>
          <div class="col-md-6">
            <label class="form-label">Assigned to</label>

            <select id="update_freelancer" class="form-select form-select-freelancer" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
              <?php foreach($freelancer as $flancer1) { ?>
                <option value="<?=$flancer1->ud_id?>"><?=$flancer1->ud_fullname?> </option> 
              <?php } ?>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select id="update_status" class="form-select form-select-status" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
              <?php foreach ($part_status as $status_part){?>
              <option value="<?=$status_part->mgp_code_id?>"><?=$status_part->parts_status?></option>
              <?php } ?>
            </select>
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
            <label for="inputAddress" class="form-label">Customer Name</label>
            <p id="contact_name"></p>
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Customer Address</label>
            <p id="address"></p>
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
            <label for="inputAddress" class="form-label">SO Number</label>
            <p id="igso_number"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>