//Inclusão do mapa
var map = L.map('map').setView([-22.9942246673889, -47.51850458950489], 100);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    minZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

//Marcador

var covaIcon = L.icon({
    iconUrl: 'cova.png',

    iconSize:     [15, 15], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

L.icon = function (options) {
    return new L.icon(options);
};

L.marker([-22.9942, -47.5185], {icon: covaIcon}).addTo(map).bindPopup("<p>Cova numero 1</p><img src = 'cova.png'>" );
L.marker([-22.99425, -47.5185], {icon: covaIcon}).addTo(map).bindPopup("Cova 2");
L.marker([-22.99425, -47.51845], {icon: covaIcon}).addTo(map).bindPopup("Cova 3")
L.marker([-22.9942, -47.51845], {icon: covaIcon}).addTo(map).bindPopup("Cova 4")
L.marker([-22.99425, -47.51840], {icon: covaIcon}).addTo(map).bindPopup("Cova 5")
L.marker([-22.9942, -47.51840], {icon: covaIcon}).addTo(map).bindPopup("Cova 6")