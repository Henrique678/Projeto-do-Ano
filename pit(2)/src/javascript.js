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
  
  

// Seleciona o checkbox e o body
const themeToggleCheckbox = document.getElementById('tema');
const body = document.body;

// Função para alternar tema
function toggleTheme(isDark) {
    if (isDark) {
        body.classList.add('dark');
        body.classList.remove('light');
        themeToggleCheckbox.checked = true; // Modo escuro, checkbox ativado
    } else {
        body.classList.add('light');
        body.classList.remove('dark');
        themeToggleCheckbox.checked = false; // Modo claro, checkbox desativado
    }
}

// Verifica se existe um valor salvo no localStorage
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
    toggleTheme(true);
} else {
    toggleTheme(false);
}

// Evento para o clique no checkbox
themeToggleCheckbox.addEventListener('change', function () {
    if (this.checked) {
        // Modo escuro
        toggleTheme(true);
        localStorage.setItem('theme', 'dark');
    } else {
        // Modo claro
        toggleTheme(false);
        localStorage.setItem('theme', 'light');
    }
});

