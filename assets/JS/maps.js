function initMap() {
    const myLatLng = { lat: -23.532141785109673, lng: -46.83408663595346 };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 13,
      center: myLatLng
    });

    //Loop
    for(var i = 0; i < markers.length; i++){
        addMarker(markers[i])
    }

    //Função de Add marker
    function addMarker(props){
      var marker = new google.maps.Marker({
        position:props.coords,
        map:map
      })

      //Check conteudo e mostrar
      if(props.content){
        var infoWindow = new google.maps.InfoWindow({
        content:props.content
        })
      }

      //Evento de clique para mostrar a descrição
      marker.addListener('click', function(){
      infoWindow.open(map, marker)
      })
    }
}

window.initMap = initMap;

//LinkBase
//https://developers.google.com/maps/documentation/javascript/advanced-markers/basic-customization
//https://developers.google.com/maps/documentation/javascript/infowindows