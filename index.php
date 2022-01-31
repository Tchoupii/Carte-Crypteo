<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Leaflet Map</title>
    <script src="./autocomplete.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    
</head>

<body>
    <div id="conteneur">
        <form  onsubmit="return false" autocomplete="off" action="coordonees.php" method="POST">
            <div class="autocomplete" style="width:300px;">
                <input id="recherche" type="text" name="ville" placeholder="Entrez le nom d'une ville">

            </div>
            <button onclick="goToLoca()">Envoyer</button>
            <script>
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        autocomplete(document.getElementById('recherche'), xhttp.responseText.split(";"))
                    }
                }
                xhttp.open("GET", "villes.php?ville=" + document.getElementById('recherche').value);
                xhttp.send();
            </script>

            <div id="map"></div>
            <script type="text/javascript">
                
                var carte = L.map("map").setView([43.918466289753, 2.145517385159], 13);
                var tuiles = L.tileLayer(" https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png ").addTo(carte);
                var point = L.marker([43.918466289753, 2.145517385159]);
                point.addTo(carte);
               
                function goToLoca() {
                    var ville = document.getElementById('recherche').value;
                    $.ajax({
                        type: 'GET',
                        url: "coordonees.php?ville="+ville
                        
                    })
                    .done(function(response){
                        var tab = response.split(";");
                        console.log(tab);
                        console.log(parseFloat (tab[0]));
                        var coordonees = L.latLng(parseFloat(tab[0]), parseFloat(tab[1]));
                        console.log(coordonees);
                        carte.panTo(coordonees, 10)
                        var mark = L.marker(coordonees).addTo(carte);
                    })
                    .fail(function(error){
                        console.log(error);
                    })
                    
                }

            </script>

        </form>


    </div>
</body>


</html>