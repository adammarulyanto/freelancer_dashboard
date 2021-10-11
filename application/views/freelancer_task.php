<div id="loader-wrapper">
  <div class="d-flex justify-content-center loading-circle position-absolute top-50 start-50 translate-middle">
    <div class="spinner-border" role="status">
    </div>
  </div>
</div>
<?php foreach($akses_menu as $akses_menu){?>
  <div class="container-fluid cont">
    <h1 class="mt-4">Freelancer Task</h1>
    <form method="get">
    <span class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#filter"><i class="bi bi-funnel"></i></span>
    <?php
    if(isset($_GET['filter'])){
    ?>
    <button class="btn btn-default mb-3" type="submit">Clear Filter</button>
    <?php
    }
    ?>
    </form>
<!-- Modal -->
    <div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="form-filter">
          <div class="modal-body">
            <div class="row g-3">
            <h6>WO Number</h6>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">WO Number</label>
              <input type="text" class="form-control" id="inputAddress" name="wo_number">
            </div>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">Case ID</label>
              <input type="text" class="form-control" id="inputAddress" name="case_id">
            </div>
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

              <div class="col-md-6">
                <label for="inputAddress" class="form-label"><strong>Booking Status</strong></label><br>
                <div class="btn-group">
                <button class="form-select btn-filter-book-status" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  Booking Status
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                  <?php foreach($booking_status as $bstatus1) { ?>    
                  <li>
                     <label class="dropdown-item">
                        <input type="checkbox" class="form-check-input dropdown_book_status" name="book_status[]" value="<?=$bstatus1->mgp_code_id?>"> <span style="margin-left:10px"><?=$bstatus1->mgp_desc?></span>
                     </label>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              </div>

              <div class="col-md-6">
                <label for="inputAddress" class="form-label"><strong>Part Status</strong></label><br>
                <div class="btn-group">
                <button class="form-select" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  Part Status
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                  <?php foreach($part_status as $pstatus) { ?>    
                  <li>
                     <label class="dropdown-item">
                        <input type="checkbox" class="form-check-input" name="part_status[]" value="<?=$pstatus->mgp_code_id?>"> <span style="margin-left:10px"><?=$pstatus->parts_status?></span>
                     </label>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              </div>

              <div class="col-md-6">
                <label for="inputAddress" class="form-label"><strong>Freelancer</strong></label><br>
                <div class="btn-group">
                <button class="form-select dropdown-filter" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  Technician
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                  <?php foreach($freelancer as $flancer1) { ?>    
                  <li>
                     <label class="dropdown-item">
                        <input type="checkbox" class="form-check-input" name="freelancer[]" value="<?=$flancer1->ud_id?>"> <span style="margin-left:10px"><?=$flancer1->ud_fullname?></span>
                     </label>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              </div>

              <div class="col-md-6">
                <label for="inputAddress" class="form-label"><strong>City</strong></label><br>
                <div class="btn-group">
                <button class="form-select dropdown-filter" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  City
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                  <?php foreach($city_filter as $ct1) { ?>    
                  <li>
                     <label class="dropdown-item">
                        <input type="checkbox" class="form-check-input" name="city_filter[]" value="<?=$ct1->kb_id?>"> <span style="margin-left:10px"><?=$ct1->kb_kab_kot?></span>
                     </label>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              </div>

              <div class="col-md-6">
                <label for="inputAddress" class="form-label"><strong>Country</strong></label><br>
                <div class="btn-group">
                <button class="form-select dropdown-filter" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  Country
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                  <?php foreach($country as $con1) { ?>    
                  <li>
                     <label class="dropdown-item">
                        <input type="checkbox" class="form-check-input" name="country[]" value="<?=$con1->mrc_id?>"> <span style="margin-left:10px"><?=$con1->mrc_country?></span>
                     </label>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="filter" value="on">Filter</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="table-responsive" style="overflow-x: scroll;">
    <div class="row box-row-kanban">
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 box-kanban">
        <div class="card mb-3 heading-card-kanban" id="waiting_part" >
          <?php foreach($cnt_wopwaitingfse as $cnt_wopwaitfse) { ?>
          <div class="card-header heading-card-title sticky-top text-white" style="background:#d35400">WOP Waiting on FSE <span class="badge"><?=$cnt_wopwaitfse->cnt?></span></div>
          <?php } ?>
          <div class="card-body text-success">
            <?php foreach($wop_waitingfse as $wopwaitfse){?>
            <div class="card mb-3 border-0 card-kanban card-modal" data-bs-toggle="modal" data-bs-target="#detail_card" data-id="<?=$wopwaitfse->wo_id?>" id="detailcard">
              <div class="card-body text-success">
                <div class="btn-group img-card">
                  <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img-thumbnail-assignee rounded-circle">
                      <img class="img-fluid" src="<?=base_url()?>assets/img/avatar_user/<?=$wopwaitfse->ud_picture?>">
                    </div>
                  </button>
                </div>
                <h5 class="card-title">- Break Fix - <?=$wopwaitfse->wo_number?></h5>
                
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 box-kanban">
        <div class="card mb-3 heading-card-kanban" id="waiting_part" >
          <?php foreach($cnt_wowaitingfse as $cnt_wowaitfse) { ?>
          <div class="card-header heading-card-title sticky-top text-white" style="background:#d35400">WO Waiting on FSE <span class="badge"><?=$cnt_wowaitfse->cnt?></span></div>
          <?php } ?>
          <div class="card-body text-success">
            <?php foreach($wo_waitingfse as $wowaitfse){?>
            <div class="card mb-3 border-0 card-kanban card-modal" data-bs-toggle="modal" data-bs-target="#detail_card" data-id="<?=$wowaitfse->wo_id?>" id="detailcard">
              <div class="card-body text-success">
                <div class="btn-group img-card">
                  <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img-thumbnail-assignee rounded-circle">
                      <img class="img-fluid" src="<?=base_url()?>assets/img/avatar_user/<?=$wowaitfse->ud_picture?>">
                    </div>
                  </button>
                </div>
                <h5 class="card-title">- Break Fix - <?=$wowaitfse->wo_number?></h5>
                
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 box-kanban">
        <div class="card mb-3 heading-card-kanban" id="waiting_part" >
          <?php foreach($cnt_waitpart as $cnt_waitpart) { ?>
          <div class="card-header heading-card-title sticky-top text-white" style="background:#d35400">Waiting On Parts <span class="badge"><?=$cnt_waitpart->cnt?></span></div>
          <?php } ?>
          <div class="card-body text-success">
            <?php foreach($waitpart as $waitpart){?>
            <div class="card mb-3 border-0 card-kanban card-modal" data-bs-toggle="modal" data-bs-target="#detail_card" data-id="<?=$waitpart->wo_id?>" id="detailcard">
              <div class="card-body text-success">
                <div class="btn-group img-card">
                  <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img-thumbnail-assignee rounded-circle">
                      <img class="img-fluid" src="<?=base_url()?>assets/img/avatar_user/<?=$waitpart->ud_picture?>">
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
          <?php foreach($cnt_inprogress as $cnt_inprogress) { ?>
          <div class="card-header heading-card-title sticky-top text-white" style="background:#2980b9">In Progress <span class="badge"><?=$cnt_inprogress->cnt?></span></div>
          <?php } ?>
          <div class="card-body text-success">
            <?php foreach($in_progress as $inprogress){?>
            <div class="card mb-3 border-0 card-kanban" data-bs-toggle="modal" data-bs-target="#detail_card" data-id="<?=$inprogress->wo_id?>" id="detailcard">
              <div class="card-body text-success">
                <div class="btn-group img-card">
                  <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img-thumbnail-assignee rounded-circle">
                      <img class="img-fluid" src="<?=base_url()?>assets/img/avatar_user/<?=$inprogress->ud_picture?>">
                    </div>
                  </button>
                </div>
                <h5 class="card-title">- Break Fix - <?=$inprogress->wo_number?></h5>
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
                      <img class="img-fluid" src="<?=base_url()?>assets/img/avatar_user/<?=$escalation->ud_picture?>">
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
        <div class="card mb-3 heading-card-kanban" id="waiting_part" >
          <?php foreach($cnt_wocompleted as $cnt_wocompleted) { ?>
          <div class="card-header heading-card-title sticky-top text-white" style="background:#d35400">WO Completed <span class="badge"><?=$cnt_wocompleted->cnt?></span></div>
          <?php } ?>
          <div class="card-body text-success">
            <?php foreach($wo_completed as $wo_completed){?>
            <div class="card mb-3 border-0 card-kanban card-modal" data-bs-toggle="modal" data-bs-target="#detail_card" data-id="<?=$wo_completed->wo_id?>" id="detailcard">
              <div class="card-body text-success">
                <div class="btn-group img-card">
                  <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="img-thumbnail-assignee rounded-circle">
                      <img class="img-fluid" src="<?=base_url()?>assets/img/avatar_user/<?=$wo_completed->ud_picture?>">
                    </div>
                  </button>
                </div>
                <h5 class="card-title">- Break Fix - <?=$wo_completed->wo_number?></h5>
                
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
                      <img class="img-fluid" src="<?=base_url()?>assets/img/avatar_user/<?=$partreturn->ud_picture?>">
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
            <label class="form-label">Finish Date</label>
            <input type="date" class="form-control update_finish_date" id="update_finish_date" name="finish_date">
          </div>
          <div class="col-md-6">
            <label class="form-label">Visit</label>
            <input type="number" class="form-control update_visit" id="update_visit" name="visit">
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
            <label for="inputAddress" class="form-label">Contact Phone</label>
            <p id="contact_phone"></p>
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
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Link Freelancer Platform</label>
              <a id="a-link-freelancer"><p id="link_freelancer" style="word-wrap: break-word;"></p></a>
          </div>
        <h6>Attachment</h6>
          <div class="col-12">
            <form action="<?=base_url()?>fl_task/upload_attachment" method="post" enctype="multipart/form-data">
              
              <div class="div-attachment">
                <input type="hidden" name="id_wo" id="id_wo">
                <input type="file" id="gallery-photo-add" name="attachment[]" accept="image/*" multiple>
                <div class='gallery'></div>
                <i class="bi bi-plus-lg i-add" id="icon-add-attachment"> Add Attachment (Maximum file : 2 MB)</i>
                <div class="btn-upload-reset">
                  <button type="submit" class="btn-upload-atc"><i class="bi bi-upload rounded-circle btn-upload-attachment"></i></button>
            </form>
                  <i class="bi bi-x-lg rounded-circle btn-upload-attachment" id='reset_file'></i>
                </div>
              </div>
          </div>
          <div class="col-12">
            <div class="row div-box-list-attachment" id="tit">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>