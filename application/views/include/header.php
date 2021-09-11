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
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
                  $('#datawo').show();                  $('#wo_number').html(data.wo_number);
                  $('#case_id').html(data.case_id);
                  $('#wo_desc').html(data.wo_desc);
                  $('#product_desc').html(data.product_desc);
                  $('#asset_serial').html(data.asset_serial);
                  $('#company_name').html(data.company_name);
                  $('#address').html(data.address);
                  $('#city').html(data.kb_kab_kot);
                  $('#contact_name').html(data.contact_name);
                  $('#contact_phone').html(data.contact_phone);
                  $('#requested_date').html(data.requested_date);
                  $('#part_number').html(data.part_number);
                  $('#part_desc').html(data.part_desc);
                  $('#igso_number').html(data.igso_number);
                  $('#visit').html(data.visit);
                  $('#link').html(data.link);
                  $('#comment').html(data.comment);
                  $('#failure_code').html(data.failure_code);
                  $('#delay_code').html(data.delay_code_name);
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
              $('#requested_date').html(data_card.requested_date);
              $('#part_number').html(data_card.part_number);
              $('#part_desc').html(data_card.part_desc);
              $('#igso_number').html(data_card.igso_number);
              $('#id_wo').val(data_card.wo_id);
              var wo_id = data_card.wo_id;
              var assigned = data_card.freelancer;
              var part_stat = data_card.part_status;
              document.getElementById('update_freelancer').value=assigned;
              $('#update_freelancer').attr('data-id' , wo_id);
              document.getElementById('update_status').value=part_stat;
              $('#update_status').attr('data-id' , wo_id);
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


          <script>
            var loadFile = function(event) {
              var dataid = $("#update_status").data('id');
              var output = document.getElementById('output');
              output.src = URL.createObjectURL(event.target.files[0]);
              output.onload = function() {
                URL.revokeObjectURL(output.src); // free memory
                $('.i-add').css({"display":"none"});
                $('.btn-upload-attachment').css({"display":"block"});
                $('#output').css({"display":"block"});
                $('.input_upload').css({"display":"none"});
                $('.btn-upload-atc').css({"display":"block"});
                $('#div-attachment').reload();
              };
            };
          </script>
    </head>
    <body>
        <div class="d-flex bg-light" id="wrapper">