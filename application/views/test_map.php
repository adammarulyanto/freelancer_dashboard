<script src="maps.googleapis.com/maps/api/js?key=AIzaSyDmsGNc2722v_fgjpE22anQwNCdidgvKLk"
    type="text/javascript"></script>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Maribelajarcoding.com</a>
      </div>      
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
       
        <form class="form-horizontal" id="formRute" autocomplete="off">
          <div class="form-group">
            <label class="control-label col-sm-2" >Asal:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="asal" name="asal">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" >Tujuan:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="tujuan" name="tujuan">
            </div>
          </div>         
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Rute</button>
            </div>
          </div>
        </form>
        
        <!-- tempat meletakan panel keterangan -->
        <div id="panel"></div>

      </div>

      <div class="col-md-8">
        <div id="map" style="height: 500px;"></div>
      </div>
    </div>
  </div>
     
 <script type="text/javascript">
   $(document).ready(function() { 

    $("#formRute").submit(function(e) {

        e.preventDefault();
        //ambil value dari form input asal
        var asal=$("#asal").val();
        //ambil value dari form input tujuan
        var tujuan=$("#tujuan").val();
         //cek apakah asal dan tujuan kosong
         if (asal=="") {
          alert("Tempat asal tidak boleh kosong!");
         }else if (tujuan=="") {
          alert("Tempat tujuan tidak boleh kosong!");
         }else{

            var directionsService = new google.maps.DirectionsService();
            var directionsDisplay = new google.maps.DirectionsRenderer();
            var mapOptions = {
              zoom:12,
            }

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);              
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('panel'));

            var start = asal;
            var end = tujuan;
            var request = {
              origin: start,
              destination: end,
              travelMode: 'DRIVING'
            };
            directionsService.route(request, function(result, status) {
              if (status == 'OK') {
                directionsDisplay.setDirections(result);
              }
            });

         }

      });

   });

</script>