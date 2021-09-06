<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Sidebar - Start Bootstrap Template</title>
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
                  $('#datawo').show();
                  $('#wo_number').html(data.wo_number);
                  $('#case_id').html(data.case_id);
                  $('#wo_desc').html(data.wo_desc);
                  $('#product_desc').html(data.product_desc);
                  $('#asset_serial').html(data.asset_serial);
                  $('#company_name').html(data.company_name);
                  $('#address').html(data.address);
                  $('#city').html(data.kb_kab_kot);
                  $('#zip').html(data.zip);
                  $('#contact_name').html(data.contact_name);
                  $('#contact_phone').html(data.contact_phone);
                  $('#requested_date').html(data.requested_date);
                  $('#part_number').html(data.part_number);
                  $('#part_desc').html(data.part_desc);
                  $('#igso_number').html(data.igso_number);
                  $('#freelancer').html(data.freelancer_name);
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
              $('#zip').html(data_card.zip);
              $('#contact_name').html(data_card.contact_name);
              $('#contact_phone').html(data_card.contact_phone);
              $('#requested_date').html(data_card.requested_date);
              $('#part_number').html(data_card.part_number);
              $('#part_desc').html(data_card.part_desc);
              $('#igso_number').html(data_card.igso_number);
              $('#assigned').html(data_card.freelancer);
              $('#loader_card').hide();
         })
         .fail(function(){
              $('#datcard').html('Error, Please try again...');
              $('#loader_card').hide();
         });
        }); 
    });
        </script>
    </head>
    <body>
        <div class="d-flex bg-light" id="wrapper">