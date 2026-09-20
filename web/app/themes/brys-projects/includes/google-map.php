<?php

/*-----------------------------------------------------------------------------------*/
/* Google Maps JS */
/*-----------------------------------------------------------------------------------*/
function google_map() {
    if( is_page(9) ){
        echo'
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3WvbGhGu6pkYWVwBYIAt7J2hn-Hbowjo&sensor=false">
    </script>
    <script type="text/javascript">
      function gmaps_init() {

     	var latlng = new google.maps.LatLng(51.028857, 4.144716);

      	var myOptions = {

	        scrollwheel: false,
	        navigationControl: true,
	        mapTypeControl: true,
	        scaleControl: true,
	        draggable: true,

	        zoom: 11,
	        center: latlng,
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
	        disableDefaultUI: false,
    	};

    	var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

    	var icon = {
	        url: "'. get_template_directory_uri() .'/assets/build/images/marker@2x.png",
	        size: new google.maps.Size(172, 149),
            scaledSize: new google.maps.Size(86, 75),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(30, 75)
	    };

	    var marker = new google.maps.Marker({
	        position: latlng,
	        map: map,
	        icon: icon
	        animation: google.maps.Animation.DROP,
	    });

      	var marker = new google.maps.Marker({
    		position: latlng,
    		map: map
    	});
    }

    google.maps.event.addDomListener(window, "load", gmaps_init);

    </script>

    ';
    }
}
add_action('wp_head', 'google_map');
