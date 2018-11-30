function myMap() {
	
	    var myCenter =  new google.maps.LatLng(-1.2549189,36.6935728);
	 	var mapCanvas = document.getElementById("footerMap");
	  	var mapOptions = {center: myCenter, zoom: 15};
	  	var map = new google.maps.Map(mapCanvas, mapOptions);
	  	var marker = new google.maps.Marker({position:myCenter});
	  	marker.setMap(map);
	
}