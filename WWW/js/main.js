
function initialize() {
		var centerLatLng = new google.maps.LatLng(-41.275399, 174.780644);

		var mapOptions = {
			zoom: 15,
			center: centerLatLng
		}
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		var firstMarker = new google.maps.LatLng(-41.275399, 174.780644);
		var marker = new google.maps.Marker({
			position: firstMarker,
			map: map,
			content: 'ChildCare NZ'
		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);		