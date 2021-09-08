
                <!-- Page content-->
                <div class="container-fluid cont">
                    <h1 class="mt-4">Dashboard</h1>
                    <button class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#filter"><i class="bi bi-funnel"></i></button>
                    <?php foreach($booking_status as $booking_status){?>
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
                        <div class="col-12 col-md-2 col-sm-6">
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
                        </div>
                        <div class="col-12 col-md-2 col-sm-6">
                            <div class="card mb-3" style="max-width: 540px;">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Onsite</h5>
                                    <h4 class="card-text"><?=$booking_status->onsite?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 col-sm-6">
                            <div class="card mb-3" style="max-width: 540px;">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Canceled</h5>
                                    <h4 class="card-text"><?=$booking_status->canceled?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 col-sm-6">
                            <div class="card mb-3" style="max-width: 540px;">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Reassign</h5>
                                    <h4 class="card-text"><?=$booking_status->reassign?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 col-sm-6">
                            <div class="card mb-3" style="max-width: 540px;">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Completed</h5>
                                    <h4 class="card-text"><?=$booking_status->completed?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 col-sm-6">
                            <div class="card mb-3" style="max-width: 540px;">
                              <div class="row g-0">
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Total Ticket</h5>
                                    <h4 class="card-text"><?=$booking_status->total_tiket?></h4>
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
                                    <div class="card">
                                      <div class="card-body p-0">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13599981.5849072!2d100.61660562519218!3d8.24953275897812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1631076401751!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-12 box-dashboard">
                                    <div class="card">
                                      <div class="card-body p-0">
                                        <table class="table table-responsive">
                                          <thead>
                                            <tr>
                                              <th width="15%">Country</th>
                                              <th width="15%">City</th>
                                              <th style="text-align: right;">Achivement</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                              foreach ($cityachovement as $ca1){
                                              ?>
                                              <tr>
                                                <td><?=$ca1->country?></td>
                                                <td><?=$ca1->city?></td>
                                                <td style="text-align: right;"><?=$ca1->achivement?></td>
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
                                    <div class="card">
                                      <h5 class="card-header">City/Part Status</h5>
                                      <div class="card-body px-2">
                                        <table class="table table-responsive">
                                          <thead>
                                            <tr>
                                              <th>Part Status</th>
                                              <?php
                                              foreach ($city as $col_city){
                                              ?>
                                                <th><?=$col_city->city?></th>
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
                                                <td><?=$cp1->status_part?></td>
                                                <td><?=$cp1->value_data?></td>
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
                                    <div class="card">
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
          <form>
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
            <h6>Booking Status</h6>
              <div class="col-12">
                  <?php foreach($book_status as $bstatus1) { ?>    
                  <div class="cat action">
                     <label>
                        <input type="checkbox" name="book_status[]" value="<?=$bstatus1->mgp_code_id?>"><span><?=$bstatus1->mgp_desc?></span>
                     </label>
                  </div>
                  <?php } ?>
              </div>

            <h6>Technician</h6>
              <div class="col-12">
                  <?php foreach($freelancer as $flancer1) { ?>  
                  <div class="cat action">
                     <label>
                        <input type="checkbox" name="freelancer[]" value="<?=$flancer1->ud_id?>"><span><?=$flancer1->ud_fullname?></span>
                     </label>
                  </div>
                  <?php } ?>
              </div>

            <h6>City</h6>
              <div class="col-12">
                  <?php foreach($part_status as $pstatus) { ?>    
                  <div class="cat action">
                     <label>
                        <input type="checkbox" name="part_status[]" value="<?=$pstatus->mgp_code_id?>"><span><?=$pstatus->parts_status?></span>
                     </label>
                  </div>
                  <?php } ?>
              </div>

            <h6>Country </h6>
              <div class="col-12">
                  <?php foreach($part_status as $pstatus) { ?>    
                  <div class="cat action">
                     <label>
                        <input type="checkbox" name="part_status[]" value="<?=$pstatus->mgp_code_id?>"><span><?=$pstatus->parts_status?></span>
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