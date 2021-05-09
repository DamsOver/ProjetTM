var x = document.getElementById("localisation");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "La géolocalisation n'est pas supportée par cet explorateur";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
    initMap(position.coords.latitude, position.coords.longitude);
}

src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtG3XAaoPu48iDIqTvOrW14K7jQtss9Co&callback=initMap&libraries=&v=weekly"
async

// Initialize and add the map
function initMap(latitude, longitude) {
    // The location of Uluru
    if(latitude == undefined || longitude == undefined){
        latitude = 0;
        longitude = 0;
    }
    const point = { lat: latitude, lng: longitude };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: point,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: point,
        map: map,
    });
}