<!-- NHP Option Global -->
<?php global $NHP_Options; ?>
  

<!-- Footer -->
<footer>
<div class="container-full">

<div class="section row nomargin">
<div class="col three tablet-full mobile-full">
<!-- Logo -->
<div class="logo section"><a href="<?php echo home_url(); ?>">
    <img src="<?php $NHP_Options->show('logo'); ?>" />
</a></div>
<!-- End Logo -->
</div>


<!-- Ghost Column -->
<div class="col one tablet-full mobile-full"></div>
<!-- End Ghost Column -->

<div class="col eight tablet-full mobile-full">
<nav class="menu" role="navigation">

   <?php wp_nav_menu( array( 
           'theme_location'  => 'footer-nav',
          'container'       => false, 
          'container_class' => 'menu-{menu slug}-container', 
          'menu_class'      => 'menu',
          ) ); ?>

</nav>
</div>
</div>

<!-- Social Networks -->
<div class="section row nomargin social-networks">

<div class="col twelve tablet-full mobile-full">


<?php $options = get_option('exhibition'); ?>

<ul id="social-networking">
  <!-- Twitter -->
    <?php if ( $options['twitter'] ) {
    echo '<li class="twitter"><a href="' . $options['twitter'] . '"></a></li>';
    } else {
    echo '';
    } ?>
    <!-- Facebook -->
    <?php if ( $options['facebook'] ) {
    echo '<li class="facebook"><a href="' . $options['facebook'] . '"></a></li>';
    } else {
    echo '';
    } ?>
    <!-- Google + -->
    <?php if ( $options['google'] ) {
    echo '<li class="google"><a href="' . $options['google'] . '"></a></li>';
    } else {
    echo '';
    } ?>
    <!-- Linkedin -->
    <?php if ( $options['linkedin'] ) {
    echo '<li class="linkedin"><a href="' . $options['linkedin'] . '"></a></li>';
    } else {
    echo '';
    } ?>
     <!-- Email -->
    <?php if ( $options['contact'] ) {
    echo '<li class="contact"><a href="mailto:' . $options['contact'] . '"></a></li>';
    } else {
    echo '';
    } ?>
</ul> 

</div>
<!-- End SN -->


</div>
</footer>
<!-- End Footer -->



<script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var marker;
var map;
// Your Destination Here
var destinationName = '<?php $NHP_Options->show('address'); ?>';

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
      zoom: 14,
      scrollwheel: false,
      draggable: true,
      center: true,
        center: new google.maps.LatLng(jQuery("#map").data("lat"), jQuery("#map").data("long")),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map(document.getElementById('map'), mapOptions);

      // Estilos del mapa
       var styles = [
              {
                "stylers": [
                  { "saturation": -100 },
                ]
              }
            ];
  
       map.setOptions({styles: styles});

    
        var PolylineOptions = {
          strokeColor: '#e31937', // Route Stroke Color 
          strokeOpacity: .8, 
          strokeWeight: 3,
       }

       // Create a renderer for directions and bind it to the map.
       var rendererOptions = {
        map: map,
        polylineOptions: PolylineOptions,
        draggable: true,
         }
       directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

      marker = new google.maps.Marker({
        map:map,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(jQuery("#map").data("lat"), jQuery("#map").data("long")),
      });
    google.maps.event.addListener(marker, 'click', toggleBounce);
    directionsDisplay.setMap(map);

}

function calcRoute() {
  
    var selectedMode = document.getElementById('mode').value;
    
    if(navigator.geolocation) {
    
    navigator.geolocation.getCurrentPosition(function(position) {
      
      var visitante = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      
      // Retrieve the start and end locations and create
      // a DirectionsRequest using DRIVING directions.
      
      var start = visitante;
      var end = destinationName;
      var request = {
                origin: start,
                destination: end,
                //travelMode: google.maps.DirectionsTravelMode.DRIVING
                travelMode: google.maps.TravelMode[selectedMode]
      };
      
      directionsService.route(request, function(response, status) {
      
        if (status == google.maps.DirectionsStatus.OK) {        
          directionsDisplay.setDirections(response);       
          var leg = response.routes[ 0 ].legs[ 0 ];
           var distancetext = leg.distance.text;
            var start_point = leg.start_location;
            jQuery('#distance').html(distancetext);
            jQuery('#you_are').html('you are at');

             makeMarker( leg.start_location, icons.start, "start" );
             makeMarker( leg.end_location, icons.end, 'end' );
        }

         function makeMarker( position, icon, title ) {
               new google.maps.Marker({
                position: position,
                map: map,
                icon: icon,
                title: title,
                optimized: false,
                animation: google.maps.Animation.DROP,
               });
              }

      });
      
    }, function() {
          handleNoGeolocation(true);
        });
      
    } else { handleNoGeolocation(false); /* Browser doesn't support Geolocation */  }
  }


function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    zoom: 8,
    position: new google.maps.LatLng(51.508742, -0.087891),
    content: content
  };
  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		
	<!-- analytics -->
	<script>
		var _gaq=[['_setAccount',' <?php $NHP_Options->show('ga'); ?>'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)})(document,'script');
	</script>
    <!--[if lt IE 7]>
    <script src='//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js'></script>
    <script>
      window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})});
    </script>
    <![endif]-->
    <?php wp_footer(); ?>
  </body>
</html>
