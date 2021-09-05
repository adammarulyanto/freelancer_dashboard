
                <!-- Page content-->
                <div class="container-fluid cont">
                    <h1 class="mt-4">Dashboard</h1>
                    <?php foreach($booking_status as $booking_status){?>
                    <div class="row show-grid summary-dashboard">
                        <div class="col-sm-6 col-md-1-5 col-lg-1-5">
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
                        <div class="col-sm-6 col-md-1-5 col-lg-1-5">
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
                        <div class="col-sm-6 col-md-1-5 col-lg-1-5">
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
                        <div class="col-sm-6 col-md-1-5 col-lg-1-5">
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
                        <div class="col-sm-6 col-md-1-5 col-lg-1-5">
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
                    </div>
                    <?php } ?>
                    <div class="row">    
                        <div class="col-12 col-md-9">
                        <div class="row">
                                <div class="col-12 col-sm-6 box-dashboard">
                                    <div class="card">
                                      <h5 class="card-header">Monthly Achivement</h5>
                                      <div class="card-body">
                                        <canvas id="line-chart"></canvas>
                                        <script>
                                        new Chart(document.getElementById("line-chart"), {
                                          type: 'line',
                                          data: {
                                            labels: [<?php foreach($untilthismonth as $untilthismonth1){echo '"'.$untilthismonth1->bulan.'",';}?>],
                                            datasets: [
                                            <?php foreach($monthly_achive as $monthly_achive){?>
                                              { 
                                                data: [<?=$monthly_achive->jml?>],
                                                label: "<?=$monthly_achive->mgp_desc?>",
                                                borderColor: "<?=$monthly_achive->border_color  ?>",
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
                                <div class="col-12 col-sm-6 box-dashboard">
                                    <div class="card">
                                      <h5 class="card-header">CE Achivement</h5>
                                      <div class="card-body">
                                        <canvas id="bar-chart-grouped"></canvas>
                                        <script>
                                        var dynamicColors = function() {
                                            var r = Math.floor(Math.random() * 255);
                                            var g = Math.floor(Math.random() * 255);
                                            var b = Math.floor(Math.random() * 255);
                                            return "rgb(" + r + "," + g + "," + b + ")";
                                        }  
                                        new Chart(document.getElementById("bar-chart-grouped"), {
                                            type: 'bar',
                                            data: {
                                              labels: [<?php foreach($untilthismonth as $untilthismonth2){echo '"'.$untilthismonth2->bulan.'",';}?>],
                                              datasets: [
                                              <?php foreach($ce_achivement as $ce_achivement){?>
                                                {
                                                  label: "<?=$ce_achivement->freelancer?>",
                                                  backgroundColor: dynamicColors(),
                                                  data: [<?=$ce_achivement->jml?>]
                                                },
                                              <?php } ?>
                                              ]
                                            },
                                            options: {
                                              title: {
                                                display: true,
                                                text: 'Population growth (millions)'
                                              }
                                            }
                                        });
                                        </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 box-dashboard">
                                    <div class="card">
                                      <h5 class="card-header">Delay Code</h5>
                                      <div class="card-body">
                                        <canvas id="bar-chart-grouped2"></canvas>
                                        <script>
                                        var dynamicColors = function() {
                                            var r = Math.floor(Math.random() * 255);
                                            var g = Math.floor(Math.random() * 255);
                                            var b = Math.floor(Math.random() * 255);
                                            return "rgb(" + r + "," + g + "," + b + ")";
                                        }  
                                        new Chart(document.getElementById("bar-chart-grouped2"), {
                                            type: 'bar',
                                            data: {
                                              labels: [<?php foreach($untilthismonth as $untilthismonth3){echo '"'.$untilthismonth3->bulan.'",';}?>],
                                              datasets: [
                                              <?php foreach($delay_code as $delay_code){?>
                                                {
                                                  label: "<?=$delay_code->mgp_desc?>",
                                                  backgroundColor: dynamicColors(),
                                                  data: [<?=$delay_code->jml?>]
                                                },
                                              <?php } ?>
                                              ]
                                            },
                                            options: {
                                              legend: {
                                                position: 'bottom'
                                              }
                                            }
                                        });
                                        </script>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 box-dashboard">
                              <div class="card mb-3">
                                <h5 class="card-header">HP Coverage Area</h5>
                                <div class="card-body card-donat">
                                  <canvas id="myChart2"></canvas>
                                  <script>
                                  var ctx = document.getElementById('myChart2').getContext('2d');
                                  var myChart2 = new Chart(ctx, {
                                      type: 'doughnut',
                                      data: {
                                          labels: [<?php foreach($coverage_area as $kota){echo '"'.$kota->kb_kab_kot.'",';}?>],
                                        datasets: [{
                                          label: 'My First Dataset',
                                          data: [<?php foreach($coverage_area as $jml){echo '"'.$jml->jml.'",';}?>],
                                          backgroundColor: [
                                            'rgb(234, 234, 87)',
                                            'rgb(87, 234, 160)',
                                            'rgb(87, 160, 234)',
                                            'rgb(160, 87, 234)',
                                            'rgb(234, 87, 160)',
                                            'rgb(234, 160, 87)',
                                            'rgb(160, 234, 87)',
                                            'rgb(12, 58, 104)',
                                            'rgb(87, 160, 234)',
                                            'rgb(58, 104, 12)'
                                          ],
                                          hoverOffset: 4
                                        }]
                                      },
                                      options: {
                                      }
                                  });
                                  </script>
                              </div>
                            </div>
                            <h5>Parts Status</h5>
                            <div class="row row-parts-status">
                              <?php foreach($parts_status as $parts_status){?>
                              <div class="col-md-6 py-2">
                                <div class="col-md-12 card" style="max-width: 540px;">
                                  <div class="row">
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h6 class="card-title-parts">Waiting For Parts</h6>
                                        <h4 class="card-text"><?=$parts_status->waitpart?></h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 py-2">
                                <div class="col-md-12 card" style="max-width: 540px;">
                                  <div class="row g-0">
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h6 class="card-title-parts">Pick Up Spare Parts</h6>
                                        <h4 class="card-text"><?=$parts_status->pickup?></h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 py-2">
                                <div class="col-md-12 card" style="max-width: 540px;">
                                  <div class="row g-0">
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h6 class="card-title-parts">Escalation</h6>
                                        <h4 class="card-text"><?=$parts_status->escalation?></h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 py-2">
                                <div class="col-md-12 card" style="max-width: 540px;">
                                  <div class="row g-0">
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h6 class="card-title-parts">Additional Parts Required</h6>
                                        <h4 class="card-text"><?=$parts_status->additionalpart?></h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 py-2">
                                <div class="col-md-12 card" style="max-width: 540px;">
                                  <div class="row g-0">
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h6 class="card-title-parts">Return Spare Parts</h6>
                                        <h4 class="card-text"><?=$parts_status->return_part?></h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 py-2">
                                <div class="col-md-12 card" style="max-width: 540px;">
                                  <div class="row g-0">
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h6 class="card-title-parts">Completed</h6>
                                        <h4 class="card-text"><?=$parts_status->completed?></h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        