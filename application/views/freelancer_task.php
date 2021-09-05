<?php foreach($akses_menu as $akses_menu){?>
<div class="container-kanban">
    <h1 class="mt-4 h1-kanban">Freelancer Task</h1>
    <div class="table-responsive">
      <table class="table table-kanban">
        <tr>
          <th>
            <div class="card mb-3 heading-card-kanban" id="waiting_part" >
              <?php foreach($cnt_waitpart as $cnt_waitpart) { ?>
              <div class="card-header heading-card-title sticky-top text-white" style="background:#d35400">Waiting Part <span class="badge"><?=$cnt_waitpart->cnt?></span></div>
              <?php } ?>
              <div class="card-body text-success">
                <?php foreach($waitpart as $waitpart){?>
                <div class="card mb-3 border-0 card-kanban card-modal" data-bs-toggle="modal" data-bs-target="#waitpart<?=$waitpart->wo_id?>">
                  <div class="card-body text-success">
                    <div class="btn-group">
                      <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="img-thumbnail-assignee rounded-circle">
                          <img class="img-fluid" src="https://cberry.net/assets/website/img/img-user.png">
                        </div>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-disabled" href="#">Move to</a></li>
                        <li><a class="dropdown-item" href="#">Part Pickup By Freelancer</a></li>
                        <li><a class="dropdown-item" href="#">Escalation</a></li>
                        <li><a class="dropdown-item" href="#">Success card title</a></li>
                      </ul>
                    </div>
                    <h5 class="card-title">- Break Fix - <?=$waitpart->wo_number?></h5>
                    
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade modal_kanban" id="waitpart<?=$waitpart->wo_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-dark">
                        <h4 class="title-detail-card">- Break Fix - <?=$waitpart->wo_number?></h4>
                        <form class="row g-3">
                          <div class="col-md-6">
                            <label class="form-label">Assigned to</label>
                            <select id="update_freelancer" class="form-select form-select-freelancer" data-id="<?=$waitpart->wo_id?>" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
                              <?php foreach($freelancer as $flancer1) { ?>
                                <option value="<?=$flancer1->ud_id?>" <?php if($flancer1->ud_id == $waitpart->freelancer){echo "selected";} ?>><?=$flancer1->ud_fullname?> </option> 
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select id="update" class="form-select form-select-status" data-id="<?=$waitpart->wo_id?>" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
                              <?php foreach ($part_status as $status_part){?>
                              <option value="<?=$status_part->mgp_code_id?>" <?php echo ($waitpart->part_status == $status_part->mgp_code_id? 'selected ': '') ?>><?=$status_part->parts_status?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Case ID</label>
                            <p><?=$waitpart->case_id?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">WO Description</label>
                            <p><?=$waitpart->wo_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Product Description</label>
                            <p><?=$waitpart->product_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Asset Serial</label>
                            <p><?=$waitpart->asset_serial?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Company Name</label>
                            <p><?=$waitpart->company_name?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Customer Name</label>
                            <p><?=$waitpart->contact_name?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Customer Address</label>
                            <p><?=$waitpart->address?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Part Description</label>
                            <p><?=$waitpart->part_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Part Number</label>
                            <p><?=$waitpart->part_number?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">SO Number</label>
                            <p><?=$waitpart->igso_number?></p>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </th>
          <th>
            <div class="card mb-3 heading-card-kanban">
              <?php foreach($cnt_partpickup as $cnt_partpickup) { ?>
              <div class="card-header heading-card-title sticky-top text-white" style="background:#2980b9">Part Pickup By Freelancer <span class="badge"><?=$cnt_partpickup->cnt?></span></div>
              <?php } ?>
              <div class="card-body text-success">
                <?php foreach($partpickup as $partpickup){?>
                <div class="card mb-3 border-0 card-kanban" data-bs-toggle="modal" data-bs-target="#partpickup<?=$partpickup->wo_id?>">
                  <div class="card-body text-success">
                    <div class="btn-group">
                      <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="img-thumbnail-assignee rounded-circle">
                          <img class="img-fluid" src="https://cberry.net/assets/website/img/img-user.png">
                        </div>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-disabled" href="#">Move to</a></li>
                        <li><a class="dropdown-item" href="#">Part Pickup By Freelancer</a></li>
                        <li><a class="dropdown-item" href="#">Escalation</a></li>
                        <li><a class="dropdown-item" href="#">Success card title</a></li>
                      </ul>
                    </div>
                    <h5 class="card-title">- Break Fix - <?=$partpickup->wo_number?></h5>
                    
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade modal_kanban" id="partpickup<?=$partpickup->wo_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-dark">
                        <h4 class="title-detail-card">- Break Fix - <?=$partpickup->wo_number?></h4>
                        <form class="row g-3">
                          <div class="col-md-6">
                            <label class="form-label">Assigned to</label>
                            <select id="inputState" class="form-select" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
                              <?php foreach($freelancer as $flancer2) { ?>
                                <option value="<?=$flancer2->ud_id?>" <?php if($flancer2->ud_id = $partpickup->freelancer){echo "selected";} ?>><?=$flancer2->ud_fullname?> </option> 
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select id="update2" class="form-select form-select-status" data-id="<?=$partpickup->wo_id?>" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
                              <?php foreach ($part_status as $status_part2){?>
                              <option value="<?=$status_part2->mgp_code_id?>" <?php echo ($partpickup->part_status == $status_part2->mgp_code_id? 'selected ': '') ?>><?=$status_part2->parts_status?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Case ID</label>
                            <p><?=$partpickup->case_id?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">WO Description</label>
                            <p><?=$partpickup->wo_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Product Description</label>
                            <p><?=$partpickup->product_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Asset Serial</label>
                            <p><?=$partpickup->asset_serial?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Company Name</label>
                            <p><?=$partpickup->company_name?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Customer Name</label>
                            <p><?=$partpickup->contact_name?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Customer Address</label>
                            <p><?=$partpickup->address?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Part Description</label>
                            <p><?=$partpickup->part_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Part Number</label>
                            <p><?=$partpickup->part_number?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">SO Number</label>
                            <p><?=$partpickup->igso_number?></p>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </th>
          <th>
            <div class="card mb-3 heading-card-kanban">
              <?php foreach($cnt_escalation as $cnt_escalation) { ?>
              <div class="card-header heading-card-title sticky-top text-white" style="background:#2c3e50">Escalation <span class="badge"><?=$cnt_escalation->cnt?></span></div>
              <?php } ?>
              <div class="card-body text-success">
                <?php foreach($escalation as $escalation){?>
                <div class="card mb-3 border-0 card-kanban" data-bs-toggle="modal" data-bs-target="#escalation<?=$escalation->wo_id?>">
                  <div class="card-body text-success">
                    <div class="btn-group">
                      <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="img-thumbnail-assignee rounded-circle">
                          <img class="img-fluid" src="https://cberry.net/assets/website/img/img-user.png">
                        </div>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-disabled" href="#">Move to</a></li>
                        <li><a class="dropdown-item" href="#">Part Pickup By Freelancer</a></li>
                        <li><a class="dropdown-item" href="#">Escalation</a></li>
                        <li><a class="dropdown-item" href="#">Success card title</a></li>
                      </ul>
                    </div>
                    <h5 class="card-title">- Break Fix - <?=$escalation->wo_number?></h5>
                    
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade modal_kanban" id="escalation<?=$escalation->wo_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-dark">
                        <h4 class="title-detail-card">- Break Fix - <?=$escalation->wo_number?></h4>
                        <form class="row g-3">
                          <div class="col-md-6">
                            <label class="form-label">Assigned to</label>
                            <select id="inputState" class="form-select" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
                              <?php foreach($freelancer as $flancer3) { ?>
                                <option value="<?=$flancer3->ud_id?>" <?php if($flancer3->ud_id = $escalation->freelancer){echo "selected";} ?>><?=$flancer3->ud_fullname?> </option> 
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select id="update3" class="form-select form-select-status" data-id="<?=$escalation->wo_id?>" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
                              <?php foreach ($part_status as $status_part3){?>
                              <option value="<?=$status_part3->mgp_code_id?>" <?php echo ($escalation->part_status == $status_part3->mgp_code_id? 'selected ': '') ?>><?=$status_part3->parts_status?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Case ID</label>
                            <p><?=$escalation->case_id?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">WO Description</label>
                            <p><?=$escalation->wo_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Product Description</label>
                            <p><?=$escalation->product_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Asset Serial</label>
                            <p><?=$escalation->asset_serial?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Company Name</label>
                            <p><?=$escalation->company_name?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Customer Name</label>
                            <p><?=$escalation->contact_name?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Customer Address</label>
                            <p><?=$escalation->address?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Part Description</label>
                            <p><?=$escalation->part_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Part Number</label>
                            <p><?=$escalation->part_number?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">SO Number</label>
                            <p><?=$escalation->igso_number?></p>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </th>
          <th>
            <div class="card mb-3 heading-card-kanban">
              <?php foreach($cnt_partreturn as $cnt_partreturn) { ?>
              <div class="card-header heading-card-title sticky-top text-white" style="background:#27ae60">Part Return By Freelancer <span class="badge"><?=$cnt_partreturn->cnt?></span></div>
              <?php } ?>
              <div class="card-body text-success">
                <?php foreach($partreturn as $partreturn){?>
                <div class="card mb-3 border-0 card-kanban" data-bs-toggle="modal" data-bs-target="#partreturn<?=$partreturn->wo_id?>">
                  <div class="card-body text-success">
                    <div class="btn-group">
                      <button class="elipsis-card-kanban" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="img-thumbnail-assignee rounded-circle">
                          <img class="img-fluid" src="https://cberry.net/assets/website/img/img-user.png">
                        </div>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-disabled" href="#">Move to</a></li>
                        <li><a class="dropdown-item" href="#">Part Pickup By Freelancer</a></li>
                        <li><a class="dropdown-item" href="#">Escalation</a></li>
                        <li><a class="dropdown-item" href="#">Success card title</a></li>
                      </ul>
                    </div>
                    <h5 class="card-title">- Break Fix - <?=$partreturn->wo_number?></h5>
                    
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade modal_kanban" id="partreturn<?=$partreturn->wo_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-dark">
                        <h4 class="title-detail-card">- Break Fix - <?=$partreturn->wo_number?></h4>
                        <form class="row g-3">
                          <div class="col-md-6">
                            <label class="form-label">Assigned to</label>
                            <select id="inputState" class="form-select" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
                              <?php foreach($freelancer as $flancer4) { ?>
                                <option value="<?=$flancer4->ud_id?>" <?php if($flancer4->ud_id = $partreturn->freelancer){echo "selected";} ?>><?=$flancer4->ud_fullname?> </option> 
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select id="update4" class="form-select form-select-status" data-id="<?=$partreturn->wo_id?>" <?php if($akses_menu->edit_level=="N"){echo 'disabled';}?>>
                              <?php foreach ($part_status as $status_part4){?>
                              <option value="<?=$status_part4->mgp_code_id?>" <?php echo ($partreturn->part_status == $status_part4->mgp_code_id? 'selected ': '') ?>><?=$status_part4->parts_status?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Case ID</label>
                            <p><?=$partreturn->case_id?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">WO Description</label>
                            <p><?=$partreturn->wo_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Product Description</label>
                            <p><?=$partreturn->product_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Asset Serial</label>
                            <p><?=$partreturn->asset_serial?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Company Name</label>
                            <p><?=$partreturn->company_name?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Customer Name</label>
                            <p><?=$partreturn->contact_name?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Customer Address</label>
                            <p><?=$partreturn->address?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Part Description</label>
                            <p><?=$partreturn->part_desc?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">Part Number</label>
                            <p><?=$partreturn->part_number?></p>
                          </div>
                          <div class="col-12">
                            <label class="form-label">SO Number</label>
                            <p><?=$partreturn->igso_number?></p>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
            </div>
          </th>
        </tr>
       </table>
    </div>
</div>
<?php
}
?>