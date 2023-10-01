function initMap(key) {
  let coord = key.split(",");
  const map = L.map("map").setView(coord, 15);

  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  L.marker(coord)
    .addTo(map)
    .bindPopup("Voici l'endroit de votre séjour")
    .openPopup();
}
