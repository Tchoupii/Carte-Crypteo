<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Esri Leaflet Geocoder</title>
    <meta
      name="viewport"
      content="initial-scale=1,maximum-scale=1,user-scalable=no"
    />

    <!-- Load Leaflet from CDN-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet-src.js"></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet"></script>

    <!-- Esri Leaflet Geocoder -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
    />
    <script src="https://unpkg.com/esri-leaflet-geocoder"></script>

    <!-- Make the map fill the entire page -->
    <style>
      #map {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>
    <script>
      var map = L.map("map").setView([45.5165, -122.6764], 12);
      var tiles = L.esri.basemapLayer("Streets").addTo(map);

      // create the geocoding control and add it to the map
      var searchControl = L.esri.Geocoding.geosearch({
        providers: [
          L.esri.Geocoding.arcgisOnlineProvider({
            // API Key to be passed to the ArcGIS Online Geocoding Service
            apikey: 'AAPK7cda444e6c1445ac9a482d065af7ace54Ib2-j9hDfw0QzoFmm9BXESZSywUMKwtzQH3_z6-KQDBpTwyoJLjDqKAClHJaSGl'
          })
        ]
      }).addTo(map);

      // create an empty layer group to store the results and add it to the map
      var results = L.layerGroup().addTo(map);

      // listen for the results event and add every result to the map
      searchControl.on("results", function (data) {
        results.clearLayers();
        for (var i = data.results.length - 1; i >= 0; i--) {
          results.addLayer(L.marker(data.results[i].latlng));
        }
      });
    </script>
  </body>
</html>