let placesList = document.getElementById("placesList")

for(i = 0; i < 4; i++) {
    let placeItem = document.createElement('li')
    placeItem.className = 'placeItem'
    placeItem.setAttribute('aria-bot', 'action-alternatePage')

    let placeInfo = document.createElement('div')
    placeInfo.className = 'placeInfo'

    let placeImage = document.createElement('img')
    placeImage.className = 'skeleton'
    placeImage.setAttribute('src', markers[i].imagePath)

    let placeName = document.createElement('h4')
    placeName.innerHTML = markers[i].title

    placeInfo.appendChild(placeImage)
    placeInfo.appendChild(placeName)

    let moreDetails = document.createElement('div')
    moreDetails.className = 'moreDetails'

    let arrowIcon = document.createElement('i')
    arrowIcon.className = 'fa-solid fa-angle-right skeleton'

    moreDetails.appendChild(arrowIcon)


    placeItem.appendChild(placeInfo)
    placeItem.appendChild(moreDetails)

    placesList.appendChild(placeItem)
}