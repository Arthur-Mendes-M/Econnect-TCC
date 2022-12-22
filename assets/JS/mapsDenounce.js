var map
function initMap() {
  var mapOptions = {
    center: {lat: -23.532141785109673, lng: -46.83408663595346 },
    zoom: 13
  }

  map = new google.maps.Map(document.getElementById('mapDenounce'), mapOptions)

  let currentController = false
  map.addListener('mouseover', () => {
    if(currentController === false) {
      createCustomAlert('Mapa guia', 'var(--extraColor)', 'Caso precise, utilize deste mapa para se guiar e encontrar os dados necessários para denúnciar.', 8000)
    }
    currentController = true
  })
}

window.initMap = initMap;