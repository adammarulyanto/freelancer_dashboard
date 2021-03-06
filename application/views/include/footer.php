</div>
</div>
<p align="center" class="bg-light footer">©2021 Copyrights | Freelancer Onsite Service</p>

<script async defer src="//maps.googleapis.com/maps/api/js?key=AIzaSyDnVnACZJ7MCozMoc8U2VghqNMfUJ7hjYE&callback=directionMap"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>


<script type="text/javascript">
  ClassicEditor
  .create( document.querySelector( '#editor' ) )
  .catch( error => {
    console.error( error );
  } );
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#reset_file').on('click', function() {
      $('#gallery-photo-add').css({"display":"block"});
      $('#gallery-photo-add').val('');
      $('.img-preview-atc').remove();
      $('.input_upload').css({"display":"block"});
      $('.i-add').css({"display":"block"});
      $('.btn-upload-attachment').css({"display":"none"});
      $('.btn-upload-atc').css({"display":"none"});
    });

    $(".add-tutor").click(function(){
      $(".box-add-tutor").toggleClass("displayblock");
    });
});

$(".del-vac1").change(function() {
  $('.vac1').prop('disabled', function(i, v) { return !v; });
});
$(".del-vac2").change(function() {
  $('.vac2').prop('disabled', function(i, v) { return !v; });
});
$(".del-vacpp").change(function() {
  $('.vacpp').prop('disabled', function(i, v) { return !v; });
});
$(".del-bgc").change(function() {
  $('.bgc').prop('disabled', function(i, v) { return !v; });
});                  
</script>
<script>
$(".heatmap").each(function(){
  var value_data = $(this).text();
  var max_value = $(this).data('id');

  var persen = value_data/max_value*100;
  var satu = "#e5f2e5";
  var dua = "#b2d8b2";
  var tiga = "#7fbf7f";
  var empat = "#4ca64c";
  var lima = "#198c19";

  if(persen>0 && persen<=20){
    $(this).css({"background-color": satu});
  }else if(persen>20 && persen<=40){
    $(this).css({"background-color": dua});
  }else if(persen>40 && persen<=60){
    $(this).css({"background-color": tiga});
  }else if(persen>60 && persen<=80){
    $(this).css({"background-color": empat});
  }else if(persen>80 && persen<=100){
    $(this).css({"background-color": lima});
  }else{
    $(this).css({"background-color": "rgba(0,0,0,0)"});
  }
});
</script>
        <script type="text/javascript">
            $(document).ready(function(){
              $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
              });
              $(".parent-menu").click(function(){
                $(".child-menu").toggleClass("active-submenu");
              });
            });
            $(document).ready(function(){
                $("#form-filter").submit(function(){
                    $("input").each(function(index, obj){
                        if($(obj).val() == "") {
                            $(obj).remove();
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#example').DataTable({
                  "lengthMenu": [[25, 50, 100,-1], [25, 50, 100,"All"]],
                  "scrollX": true,
                  language: { search: "",searchPlaceholder: "Search" },
                  dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'li><'col-sm-12 col-md-7 mt-1'p>>",
                  buttons: [
                      {
                          extend: 'excel',
                          text: '<i class="bi bi-file-earmark-excel-fill"></i>',
                          className: 'btn-excel',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          title: null,
                          filename: '<?php echo "Data-".date('Ymdhis');?>'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="bi bi-file-earmark-pdf-fill"></i>',
                          title: '<?php echo "Data-".date('Ymdhis');?>',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          className: 'btn-pdf'
                      },
                      {
                          extend: 'print',
                          text: '<i class="bi bi-printer-fill"></i>',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          title: '<?php echo "Data-".date('Ymdhis');?>',
                          className: 'btn-print'
                      }
                  //     ,{
                  //         extend: 'colvis',
                  //         columns: 'th:nth-child(n+2)'
                  //     }
                  ]
                });
                $('#example2').DataTable({
                  "scrollX": true,
                  language: { search: "",searchPlaceholder: "Search" },
                  dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'li><'col-sm-12 col-md-7 mt-1'p>>",
                  buttons: [
                      {
                          extend: 'excel',
                          text: '<i class="bi bi-file-earmark-excel-fill"></i>',
                          className: 'btn-excel',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          title: null,
                          filename: '<?php echo "Data-".date('Ymdhis');?>'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="bi bi-file-earmark-pdf-fill"></i>',
                          title: '<?php echo "Data-".date('Ymdhis');?>',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          className: 'btn-pdf'
                      },
                      {
                          extend: 'print',
                          text: '<i class="bi bi-printer-fill"></i>',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          title: '<?php echo "Data-".date('Ymdhis');?>',
                          className: 'btn-print'
                      }
                  ]
                });
                $('#tbl-teams').DataTable({
                  "scrollX": true,
                  language: { search: "",searchPlaceholder: "Search" },
                  dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'li><'col-sm-12 col-md-7 mt-1'p>>",
                  buttons: [
                      {
                          extend: 'excel',
                          text: '<i class="bi bi-file-earmark-excel-fill"></i>',
                          className: 'btn-excel',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          title: null,
                          filename: '<?php echo "Data-".date('Ymdhis');?>'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="bi bi-file-earmark-pdf-fill"></i>',
                          title: '<?php echo "Data-".date('Ymdhis');?>',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          className: 'btn-pdf'
                      },
                      {
                          extend: 'print',
                          text: '<i class="bi bi-printer-fill"></i>',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          title: '<?php echo "Data-".date('Ymdhis');?>',
                          className: 'btn-print'
                      }
                  //     ,{
                  //         extend: 'colvis',
                  //         columns: 'th:nth-child(n+2)'
                  //     }
                  ]
                });
                $('#work_order').DataTable({
                  "lengthMenu": [[25, 50, 100,-1], [25, 50, 100,"All"]],
                  "scrollX": true,
                  language: { search: "",searchPlaceholder: "Search" },
                  dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'li><'col-sm-12 col-md-7 mt-1'p>>",
                  buttons: [
                      {
                          extend: 'excel',
                          text: '<i class="bi bi-file-earmark-excel-fill"></i>',
                          className: 'btn-excel',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          title: null,
                          filename: '<?php echo "Work Order - ".date('Ymdhis');?>'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="bi bi-file-earmark-pdf-fill"></i>',
                          title: '<?php echo "Work Order - ".date('Ymdhis');?>',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          className: 'btn-pdf'
                      },
                      {
                          extend: 'print',
                          text: '<i class="bi bi-printer-fill"></i>',
                          exportOptions: {
                              columns: ':not(:last-child)'
                          },
                          title: '<?php echo "Work Order - ".date('Ymdhis');?>',
                          className: 'btn-print'
                      }
                  //     ,{
                  //         extend: 'colvis',
                  //         columns: 'th:nth-child(n+2)'
                  //     }
                  ]
                });
                $('.modal_kanban').on('hidden.bs.modal', function () {
                  document.getElementById("loader-wrapper").style.display = "block";
                  location.reload();
                })
                 $(".form-select-status").on('change', function(){
                      var value = $(this).val();
                      var id = $(this).data('id');
                      $.ajax({
                          url:'<?=base_url()?>fl_task/update_status',
                          method:'POST',
                          data: {value_data:value,id_data:id}
                      });
                  });
                 $(".form-select-freelancer").on('change', function(){
                      var value = $(this).val();
                      var id = $(this).data('id');
                      $.ajax({
                          url:'<?=base_url()?>fl_task/update_freelancer',
                          method:'POST',
                          data: {value_data:value,id_data:id}
                      });
                  });
                   $(".form-select-book-status").change(function (){
                      var value = $(this).val();
                      var id = $(this).data('id');
                      $.ajax({
                          url:'<?=base_url()?>data/update_book_status',
                          method:'POST',
                          data: {value_data:value,id_data:id}
                      });
                  });
                   $(".form-select-failure").change(function (){
                      var value = $(this).val();
                      var id = $(this).data('id');
                      $.ajax({
                          url:'<?=base_url()?>data/update_failure_code',
                          method:'POST',
                          data: {value_data:value,id_data:id}
                      });
                  });
                   $(".form-select-delay").change(function (){
                      var value = $(this).val();
                      var id = $(this).data('id');
                      $.ajax({
                          url:'<?=base_url()?>data/update_delay_code',
                          method:'POST',
                          data: {value_data:value,id_data:id}
                      });
                  });
                   $(".update_akses").change(function (){
                      var value = $(this).is(':checked');
                      var id = $(this).data('id');
                      var type = $(this).data('type');
                      $.ajax({
                          url:'<?=base_url()?>user_level/update_akses',
                          method:'POST',
                          data: {value_data:value,id_data:id,type_data:type}
                      });
                  });
                   $(".update_aktif_user").change(function (){
                      var value = $(this).is(':checked');
                      var id = $(this).data('id');
                      $.ajax({
                          url:'<?=base_url()?>user_data/update_aktif_user',
                          method:'POST',
                          data: {value_data:value,id_data:id}
                      });
                  });
                   $(".update_city").change(function (){
                      var value = $(this).is(':checked');
                      var id = $(this).data('id');
                      $.ajax({
                          url:'<?=base_url()?>settings/update_aktif_city',
                          method:'POST',
                          data: {value_data:value,id_data:id}
                      });
                  });
                   $(".update_finish_date").change(function (){
                      var value = $(this).val();
                      var id = $(this).data('id');
                      $.ajax({
                          url:'<?=base_url()?>fl_task/update_finish_date',
                          method:'POST',
                          data: {value_data:value,id_data:id}
                      });
                  });
                   $(".update_visit").change(function (){
                      var value = $(this).val();
                      var id = $(this).data('id');
                      $.ajax({
                          url:'<?=base_url()?>fl_task/update_visit',
                          method:'POST',
                          data: {value_data:value,id_data:id}
                      });
                  });
            } );
        </script>





<script>
let sidebar = document.querySelector(".menu-samping");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
 }
}
</script>


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?=base_url()?>assets/js/scripts.js"></script>
    </body>
</html>
