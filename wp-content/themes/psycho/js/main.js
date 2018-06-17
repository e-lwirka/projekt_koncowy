console.log("js dziala");

// Initialize and add the map
function initMap() {
    // The location of Nienadowka
    var nienadowka = {lat: 50.1942375, lng: 22.107826899999964};
    // The map, centered at Nienadowka
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 10, center: nienadowka});
    // The marker, positioned at Nienadowka
    var marker = new google.maps.Marker({position: nienadowka, map: map});
}