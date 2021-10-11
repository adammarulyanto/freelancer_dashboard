
                <!-- Page content-->
                <div class="container-fluid cont">
                    <h1 class="mt-4">Dashboard</h1>
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
                    <?php
                    foreach($booking_status as $booking_status){?>
                    <div class="row show-grid summary-dashboard">
                        <!-- <div class="col-sm-6 col-md-1-5 col-lg-1-5">
                            <div class="card mb-3" style="max-width: 540px;">
                              <div class="row g-0">
                                <div class="col-md-12">
                                  <div class="card-body">
                                    <h5 class="card-title">Acknowledge</h5>
                                    <h4 class="card-text"><?=$booking_status->acknowledge?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div> -->
                        <div class="col-6 col-md-4 col-lg-2 col-sm-6">
                            <div class="card mb-3 card-dashboard" style="background:#e84393">
                              <div class="row g-0">
                                <div class="col-md-12">
                                  <div class="card-body">
                                    <h5 class="card-title">Acknowledge</h5>
                                    <h4 class="card-text"><?=$booking_status->acknowledge?></h4>
                                    <i class="bx bx-bulb icon-card-dashboard"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 col-sm-6">
                            <div class="card mb-3 card-dashboard" style="background:#0984e3">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Onsite</h5>
                                    <h4 class="card-text"><?=$booking_status->onsite?></h4>
                                    <i class="bx bx-current-location icon-card-dashboard"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 col-sm-6">
                            <div class="card mb-3 card-dashboard" style="background:#e17055">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Canceled</h5>
                                    <h4 class="card-text"><?=$booking_status->canceled?></h4>
                                    <i class="bx bx-x-circle icon-card-dashboard"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 col-sm-6">
                            <div class="card mb-3 card-dashboard" style="background:#6c5ce7">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Reassign</h5>
                                    <h4 class="card-text"><?=$booking_status->reassign?></h4>
                                    <i class="bx bx-user-check icon-card-dashboard"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 col-sm-6">
                            <div class="card mb-3 card-dashboard" style="background:#00b894">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Completed</h5>
                                    <h4 class="card-text"><?=$booking_status->completed?></h4>
                                    <i class="bx bx-check-circle icon-card-dashboard"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 col-sm-6">
                            <div class="card mb-3 card-dashboard" style="background:#636e72">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Total Ticket</h5>
                                    <h4 class="card-text"><?=$booking_status->total_tiket?></h4>
                                    <i class="bx bx-task icon-card-dashboard"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">    
                        <div class="col-12 col-md-6">
                              <div class="row">
                                <div class="col-12 box-dashboard">
                                    <div class="card box-card-dashboard">
                                      <div class="card-body p-0">
                                        <div id="map-canvas-mark"></div>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-12 box-dashboard">
                                    <div class="card box-card-dashboard">
                                      <div class="card-body p-0 table-responsive table-fse-city">
                                        <table class="table table-borderless table-citypart table-striped" id="js-datatable" style="min-width:700px">
                                          <thead>
                                            <tr>
                                              <th style="padding-left: 15px;">FSE</th>
                                              <th style="padding-left: 15px;">City</th>
                                              <?php
                                              foreach ($fse_book_status as $fse_book_status){
                                              ?>
                                                <th style='text-align:center'><?=$fse_book_status->mgp_desc?></th>
                                              <?php
                                              }
                                              ?>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                              foreach ($fse_city as $fse_city){
                                              ?>
                                              <tr>
                                                <td style="padding-left: 15px;"><?=$fse_city->ud_fullname?></td>
                                                <td style="padding-left: 15px;"><?=$fse_city->kb_kab_kot?></td>
                                                <?=$fse_city->value_data?>
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
                        <div class="col-12 col-md-6">
                              <div class="row">
                                <div class="col-12 box-dashboard">
                                    <h5 class="title-card-dashboard">City/Part Status</h5>
                                    <div class="card box-card-dashboard">
                                      <div class="card-body p-0 table-responsive">
                                        <table class="table table-borderless table-citypart table-striped" id="js-datatable" style="min-width:1300px">
                                          <thead>
                                            <tr>
                                              <th style="padding-left: 15px; width: 300px;">Part Status</th>
                                              <?php
                                              foreach ($city as $col_city){
                                              ?>
                                                <th style='text-align:center'><?=$col_city->city?></th>
                                              <?php
                                              }
                                              ?>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                              foreach ($citypartstatus as $cp1){
                                              ?>
                                              <tr>
                                                <td style="padding-left: 15px; width: 300px;"><?=$cp1->status_part?></td>
                                                <?=$cp1->value_data?>
                                              </tr>
                                              <?php
                                              }
                                              ?>
                                          </tbody>
                                          </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 box-dashboard">
                                    <div class="card box-card-dashboard">
                                      <div class="card-body p-4">
                                        <canvas id="line-chart"></canvas>
                                        <script>
                                        var dynamicColors = function() {
                                            var r = Math.floor(Math.random() * 255);
                                            var g = Math.floor(Math.random() * 255);
                                            var b = Math.floor(Math.random() * 255);
                                            return "rgb(" + r + "," + g + "," + b + ")";
                                        }  
                                        new Chart(document.getElementById("line-chart"), {
                                          type: 'line',
                                          data: {
                                            labels: [<?php foreach($untilthismonth as $untilthismonth1){echo '"'.$untilthismonth1->bulan.'",';}?>],
                                            datasets: [
                                            <?php foreach($countryachovement as $con1){?>
                                              { 
                                                data: [<?=$con1->achivement?>],
                                                label: "<?=$con1->country?>",
                                                borderColor: dynamicColors(),
                                                fill: false
                                              },
                                              <?php } ?>
                                            ]
                                          },
                                          options: {
                                            scales: {
                                              x: {
                                                grid: {
                                                  display: false
                                                }
                                              },
                                            },
                                            title: {
                                              display: true,
                                              text: 'World population per region (in millions)'
                                            }
                                          }
                                        });
                                        </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
          <form id="form-filter">
          <div class="modal-body">
            <div class="row g-3">
            <h6>Range Date</h6>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">From</label>
                <input type="date" class="form-control" id="inputAddress" name="create_from">
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="form-label">To</label>
                <input type="date" class="form-control" id="inputAddress" name="create_to">
              </div>

              <div class="col-md-6">
                <label for="inputAddress" class="form-label"><strong>Booking Status</strong></label>
                <div class="btn-group">
                <button class="form-select btn-filter-book-status" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  Booking Status
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                  <?php foreach($book_status as $bstatus1) { ?>    
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
                <label for="inputAddress" class="form-label"><strong>Technician</strong></label><br>
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


