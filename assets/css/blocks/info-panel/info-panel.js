// height for sticky
let infoHeight = document.querySelector('.main__section').offsetHeight
let infoWrap = document.querySelector('.product__info-block-wrapper')
infoWrap.style = 'height:' + infoHeight + "px"

// info panel click
let infoPanel = document.querySelector('.info-panel')
let contentBlock = document.querySelector('.info-panel__content-block')
let namesItem = infoPanel.querySelectorAll('.info-panel__names-item')

let firstItemContent = infoPanel.querySelector('.info-panel__names-item-content-hiden')
let header = document.createElement('h2');
header.classList.add('info-panel__content-title')
header.innerHTML = infoPanel.querySelector('.info-panel__names-item-title').innerHTML
contentBlock.innerHTML = firstItemContent.innerHTML
contentBlock.insertAdjacentElement('afterbegin', header)



namesItem.forEach((item)=>{
   let header = document.createElement('h2');
   header.innerHTML = item.querySelector('.info-panel__names-item-title').innerHTML
   header.classList.add('info-panel__content-title')
   let namesItemContent = item.querySelector('.info-panel__names-item-content-hiden').innerHTML
   item.addEventListener('click',()=>{
      namesItem.forEach((el)=>{
         el.classList.remove('info-panel__names-item_active')
      })
      item.classList.add('info-panel__names-item_active')
      contentBlock.innerHTML = namesItemContent
      contentBlock.insertAdjacentElement('afterbegin', header)
      
   })
})