var map = L.map('map', {
    center: [43.907342642323265, 1.914669223999106],
    zoom: 14
  });
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'sk.eyJ1IjoidGNob3VwaWlpaSIsImEiOiJja3l2ZG5rZ3YwZnkxMm90NDVuNmpsanRpIn0.btst3bmQLK_CymYkMuVyAA'
  }).addTo(map);

const marker = L.marker([43.907342642323265, 1.914669223999106]).addTo(map)
marker.bindPopup("<b>PRP PISCINE RESEAU POLYSTER</b>").openPopup();

var goToLoca = function(lat, lng){
    map.flyTo(new L.LatLng(lat,lng), 15);
    return;
}

