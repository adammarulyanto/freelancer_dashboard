<?php
$link = ($this->uri->segment(1) == NULL) ? 'Dashboard' : $this->uri->segment(1);
$menu = $this->db->query("SELECT nama_menu from tbl_menu where link = '$link'")->result();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php foreach($menu as $menu){ echo $menu->nama_menu;}?> Dashboard</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/img/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=base_url()?>assets/css/styles.css" rel="stylesheet" />
        <link href="<?=base_url()?>assets/css/css.css" rel="stylesheet" />
        <link href="<?=base_url()?>assets/css/sidebar.css" rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

        <script type="text/javascript">
          $(document).ready(function(){   
           $(document).on('click', '#getwo', function(e){  
             e.preventDefault();  
             var id_data_wo = $(this).data('id');    
            $('#datawo').hide();
             $('#loader').show();  
             $.ajax({
                  url: '<?=base_url()?>data/get_data',
                  type: 'POST',
                  data: 'id_data='+id_data_wo,
                  dataType: 'json',
              cache: false
             })
             .done(function(data){
                  console.log(data.wo_number); 
                  $('#datawo').hide();
                  $('#datawo').show();                  
                  $('#wo_number').html(data.wo_number);
                  $('#case_id').html(data.case_id);
                  $('#wo_desc').html(data.wo_desc);
                  $('#product_desc').html(data.product_desc);
                  $('#asset_serial').html(data.asset_serial);
                  $('#company_name').html(data.company_name);
                  $('#address').html(data.address);
                  $('#city').html(data.kb_kab_kot);
                  $('#contact_name').html(data.contact_name);
                  $('#contact_phone').html(data.contact_phone);
                  $('#created_date').html(data.created_date);
                  $('#requested_date').html(data.requested_date);
                  $('#finish_date').html(data.finish_date);
                  $('#part_number').html(data.part_number);
                  $('#part_desc').html(data.part_desc);
                  $('#igso_number').html(data.igso_number);
                  $('#visit').html(data.visit);
                  $('#link').html(data.link);
                  $('#comment').html(data.comment);
                  $('#failure_code').html(data.failure_code);
                  $('#delay_code').html(data.delay_code_name);
                  $('#link_freelancer').html(data.link_freelancer);
                  var wo_id = data.wo_id;
                  var assigned = data.freelancer;
                  var book_stat1 = data.book_status_id;
                  var part_stat1 = data.part_status_id;
                  var f_code1 = data.failure_code_id;
                  var d_code1 = data.delay_code;
                  document.getElementById('freelancer').value=assigned;
                  $('#freelancer').attr('data-id' , wo_id);
                  document.getElementById('booking_status').value=book_stat1;
                  $('#booking_status').attr('data-id' , wo_id);
                  document.getElementById('update_status').value=part_stat1;
                  $('#update_status').attr('data-id' , wo_id);

                  $('#loader').hide();
             })
             .fail(function(){
                  $('#datawo').html('Error, Please try again...');
                  $('#loader').hide();
             });
            });  
       $(document).on('click', '#detailcard', function(e){  
         e.preventDefault();  
         var id_data_card = $(this).data('id');    
         $('#datcard').hide();
         $('#loader_card').show();  
         $.ajax({
              url: '<?=base_url()?>fl_task/get_data',
              type: 'POST',
              data: 'id_data_card='+id_data_card,
              dataType: 'json',
              cache: false
         })
         .done(function(data_card){
              console.log(data_card.wo_number); 
              $('#datcard').hide();
              $('#datcard').show();
              $('#wo_number').html(data_card.wo_number);
              $('#case_id').html(data_card.case_id);
              $('#wo_desc').html(data_card.wo_desc);
              $('#product_desc').html(data_card.product_desc);
              $('#asset_serial').html(data_card.asset_serial);
              $('#company_name').html(data_card.company_name);
              $('#address').html(data_card.address);
              $('#city').html(data_card.kb_kab_kot);
              $('#contact_name').html(data_card.contact_name);
              $('#contact_phone').html(data_card.contact_phone);
              $('#created_date').html(data_card.created_date);
              $('#requested_date').html(data_card.requested_date);
              $('#finish_date').html(data_card.finish_date);
              $('#part_number').html(data_card.part_number);
              $('#part_desc').html(data_card.part_desc);
              $('#igso_number').html(data_card.igso_number);
              $('#id_wo').val(data_card.wo_id);
              $('#link_freelancer').html(data_card.link_freelancer);
              $('#a-link-freelancer').attr("href", data_card.link_freelancer);
              var wo_id = data_card.wo_id;
              var assigned = data_card.freelancer;
              var part_stat = data_card.part_status;
              document.getElementById('update_freelancer').value=assigned;
              $('#update_freelancer').attr('data-id' , wo_id);
              document.getElementById('update_status').value=part_stat;
              $('#update_status').attr('data-id' , wo_id);
              $('#update_finish_date').val(data_card.finish_date);
              $('#update_finish_date').attr('data-id' , wo_id);
              $('#update_visit').val(data_card.visit);
              $('#update_visit').attr('data-id' , wo_id);
            var str = data_card.attachment;
            var str_array = str.split(',');
            var str2 = data_card.attachment_id;
            var str_array2 = str2.split(',');

            if(str!='EMPTY'){
                for(var i = 0; i < str_array2.length; i++) {
                   // Trim the excess whitespace.
                   str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
                   var html = '<div class="col-4 col-md-3 box-list-attachment"> <a href="<?=base_url()?>assets/img/attachment/'+str_array[i]+'" target="_blank"> <img loading="lazy" src="<?=base_url()?>assets/img/attachment/'+str_array[i]+'" class="img-fluid"> </a> <a href="<?=base_url()?>fl_task/delete_attachment?id='+str_array2[i]+'" class="btn-del-atc rounded-circle"><i class="bi bi-trash"></i></a></div>';
                    $("#tit").append(html);
                }
            }else{
                $('#tit').css({"display":"none"});
            }

              $('#loader_card').hide();
         })
         .fail(function(){
              $('#datcard').html('Error, Please try again...');
              $('#loader_card').hide();
         });
        }); 
    });
        </script>


          <script type="text/javascript">
              $(function() {
                  // Multiple images preview in browser
                  var imagesPreview = function(input, placeToInsertImagePreview) {

                      if (input.files) {
                          var filesAmount = input.files.length;

                          for (i = 0; i < filesAmount; i++) {
                              var reader = new FileReader();

                              reader.onload = function(event) {
                                  $($.parseHTML('<img class="img-preview-atc">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                              }

                              reader.readAsDataURL(input.files[i]);
                          }
                      }

                  };

                  $('#gallery-photo-add').on('change', function() {
                      imagesPreview(this, 'div.gallery');
                      $('#gallery-photo-add').css({"display":"none"});
                      $('.i-add').css({"display":"none"});
                      $('.gallery').css({"display":"block"});
                      $('.btn-upload-attachment').css({"display":"block"});
                      $('.input_upload').css({"display":"none"});
                      $('.btn-upload-atc').css({"display":"block"});
                      $('#div-attachment').reload();
                  });
              });
            </script>

          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnVnACZJ7MCozMoc8U2VghqNMfUJ7hjYE&callback=directionMap"></script>
            <script>
            var markers = [
                <?php
                foreach ($cityachivement as $ca){
                ?>
                    ['<strong><?=$ca->city?></strong> <br> Achivement : <?=$ca->achivement?>', <?=$ca->kb_lat?> , <?=$ca->kb_long?>],
                <?php
                }
                ?>
            ];
         
              function initialize() {
                var mapCanvas = document.getElementById('map-canvas-mark');
                var mapOptions = {
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                }     
                var map = new google.maps.Map(mapCanvas, mapOptions)
         
            var infowindow = new google.maps.InfoWindow(), marker, i;
            var bounds = new google.maps.LatLngBounds(); // diluar looping
            for (i = 0; i < markers.length; i++) {  
            pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(pos); // di dalam looping
            marker = new google.maps.Marker({
                position: pos,
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(markers[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
            map.fitBounds(bounds); // setelah looping
            }
         
              }
         
         
              google.maps.event.addDomListener(window, 'load', initialize);
            </script>
            
      <script>
      var wh = [
          <?php
          foreach ($wh as $wh){
          ?>
              ['<strong><?=$wh->wh_address?></strong>', <?=$wh->wh_lat?> , <?=$ca->wh_long?>],
          <?php
          }
          ?>
      ];
   
        function initialize() {
          var mapCanvas = document.getElementById('map-wh');
          var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }     
          var map = new google.maps.Map(mapCanvas, mapOptions)
   
      var infowindow = new google.maps.InfoWindow(), marker, i;
      var bounds = new google.maps.LatLngBounds(); // diluar looping
      for (i = 0; i < wh.length; i++) {  
      pos = new google.maps.LatLng(wh[i][1], wh[i][2]);
      bounds.extend(pos); // di dalam looping
      marker = new google.maps.Marker({
          position: pos,
          map: map
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
              infowindow.setContent(wh[i][0]);
              infowindow.open(map, marker);
          }
      })(marker, i));
      map.fitBounds(bounds); // setelah looping
      }
   
        }
   
   
        google.maps.event.addDomListener(window, 'load', initialize);
      </script>
      <!-- <script type="text/javascript">
      function directionMap() {

      var directionsService = new google.maps.DirectionsService();
      var map;

      var mapCenter = new google.maps.LatLng(46.499729, 26.647089);
      // var mapOrigin1 = new google.maps.LatLng(46.596652, 26.812765);
      // var mapDestination1 = new google.maps.LatLng(46.4674824, 26.4513263);
      var mapOrigin1 = 'Jl. Bratasena V';
      var mapDestination1 = 'Jakarta';

      var mapOptions = {
        zoom: 14,
        center: mapCenter
      }

      map = new google.maps.Map(document.getElementById('map-wh2'), mapOptions);

      function calculateRoute(mapOrigin, mapDestination) {

        var directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        });
        
        var request = {
          origin: mapOrigin,
          destination: mapDestination,
          travelMode: 'DRIVING'
        };
        
        directionsService.route(request, function(result, status) {
          if (status == "OK") {
            directionsDisplay.setDirections(result);
          }
        });
      }

      calculateRoute(mapOrigin1, mapDestination1);
      }
      </script> -->
    </head>
    <body>
        <div class="d-flex bg-light" id="wrapper">