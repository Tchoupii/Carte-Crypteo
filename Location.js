function changeLocation(latitude, longitude){
    const map = L.map('map', {
        center: [latitude, longitude],
        zoom: 14
      }).add(map)
}