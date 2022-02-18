let card= document.querySelectorAll('.card')

card.forEach((card) => {
    let ditailBlock = card.querySelector('.card__ditails')
    let cardTitle = card.querySelector('.card__title')
    let cardPrice = card.querySelector('.card__price')
   card.addEventListener('mouseover', ()=>{
      ditailBlock.classList.toggle('card__ditails_hiden')
      
   })
   card.addEventListener('mouseout', ()=>{
      ditailBlock.classList.toggle('card__ditails_hiden')
   })
})