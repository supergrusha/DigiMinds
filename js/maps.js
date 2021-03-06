$(document).ready(function () {

    var map;
    map = new GMaps({
        div: "#map",
        lat: -12.043333,
        lng: -77.028333
    });
    map.addMarker({
        lat: -12.043333,
        lng: -77.03,
        title: "Lima",
        details: {
            database_id: 42,
            author: "HPNeo"
        },
        click: function (e) {
            if (console.log) {
                console.log(e);
            }
            alert("You clicked on this marker");
        }
    });
    map.addMarker({
        lat: -12.042,
        lng: -77.028333,
        title: "Marker with InfoWindow",
        infoWindow: {
            content: "<p>HTML Content</p>"
        }
    });

    $(".geo_address").submit(function (e) {
        e.preventDefault();
        GMaps.geocode({
            address: $("#address").val(),
            callback: function (results, status) {
                if (status === "OK") {
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng.lat(), latlng.lng());
                    map.addMarker({
                        lat: latlng.lat(),
                        lng: latlng.lng()
                    });
                }
            }
        });
    });

});
