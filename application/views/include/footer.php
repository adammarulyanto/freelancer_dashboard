<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
              $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
              });
              $(".parent-menu").click(function(){
                $(".child-menu").toggleClass("active-submenu");
              });
            });

            $(document).ready(function() {
                $('#example').DataTable({
                  "scrollX": true,
                  language: { search: "",searchPlaceholder: "Search" },
                  dom: 'Bfrtip',
                  buttons: [
                      {
                          extend: 'excel',
                          text: '<i class="bi bi-file-earmark-excel-fill"></i>',
                          className: 'btn-excel',
                          title: null,
                          filename: '<?php echo "Data-".date('Ymdhis');?>'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="bi bi-file-earmark-pdf-fill"></i>',
                          title: '<?php echo "Data-".date('Ymdhis');?>',
                          className: 'btn-pdf'
                      },
                      {
                          extend: 'print',
                          text: '<i class="bi bi-printer-fill"></i>',
                          title: '<?php echo "Data-".date('Ymdhis');?>',
                          className: 'btn-print'
                      }
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
