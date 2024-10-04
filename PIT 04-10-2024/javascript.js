async function init() {
    await customElements.whenDefined('gmp-map');
  
    const map = document.querySelector('gmp-map');
    const marker = document.querySelector('gmp-advanced-marker');
    const placePicker = document.querySelector('gmpx-place-picker');
    const infowindow = new google.maps.InfoWindow();
  
    map.innerMap.setOptions({
      mapTypeControl: false
    });
  
    placePicker.addEventListener('gmpx-placechange', () => {
      const place = placePicker.value;
  
      if (!place.location) {
        window.alert(
          "No details available for input: '" + place.name + "'"
        );
        infowindow.close();
        marker.position = null;
        return;
      }
  
      if (place.viewport) {
        map.innerMap.fitBounds(place.viewport);
      } else {
        map.center = place.location;
        map.zoom = 17;
      }
  
      marker.position = place.location;
      infowindow.setContent(
        `<strong>${place.displayName}</strong><br>
         <span>${place.formattedAddress}</span>
      `);
      infowindow.open(map.innerMap, marker);
    });
  }
  
  document.addEventListener('DOMContentLoaded', init);

  // Função para definir o tema
function setTheme(theme) {
  document.body.classList.remove("light", "dark");
  document.body.classList.add(theme);
  localStorage.setItem('theme', theme);
}

// Função para alternar o tema ao clicar no botão
document.querySelector("#tema").addEventListener("click", () => {
  const isLight = document.body.classList.contains("light");
  setTheme(isLight ? "dark" : "light");
});

// Função para carregar o tema ao abrir a página
function loadTheme() {
  const storedTheme = localStorage.getItem('theme');
  if (storedTheme) {
    setTheme(storedTheme);
  } else {
    setTheme("dark"); // Tema padrão
  }
}

// Carregar o tema ao abrir a página
document.addEventListener('DOMContentLoaded', loadTheme);
