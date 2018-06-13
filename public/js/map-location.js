$(function () {

    var map;
    var geo_coder;

    window.initMap = function() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: 8,
            center: {lat: -34.397, lng: 150.644}
        });
        geo_coder = new google.maps.Geocoder();
        $('.city-location').click(function() {
            var city_name = $(this).attr("id");
            geocodeAddress(geo_coder, map, city_name);
        });
    };

    function geocodeAddress(geocoder, resultsMap, address) {
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

});