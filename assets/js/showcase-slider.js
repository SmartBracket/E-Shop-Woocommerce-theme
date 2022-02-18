let sliders = new Object()

function getSectionName(section){
   let name = section.classList[1]
   if(!sliders['slieder_' + name]){
      sliders['slieder_' + name] = new ThisSection(section)
   }
}

function ThisSection(element){
   this.parent = element
   this.container = element.querySelector('.container')
   this.showcaseList = this.parent.querySelector('.showcase__list')
   this.showcaseButton = this.parent.querySelectorAll('.arrow')
   this.showcaseCards = this.parent.querySelectorAll('.showcase__card')
   this.showcaseCardWidth = +window.getComputedStyle(this.showcaseCards[0]).width.match(/[0-9.]+/)[0];
   this.showcaseSlideIndex = 0
   this.shwownSlides = Math.round(+window.getComputedStyle(this.container).width.match(/[0-9.]+/)[0] / (this.showcaseCardWidth + 20))

   this.showcaseButton.forEach((button) => {
      button.addEventListener('click', ()=>{
         let target = button
         if(target.classList.contains('arrow__next') && this.showcaseSlideIndex + this.shwownSlides != this.showcaseCards.length  && this.showcaseCards.length > this.shwownSlides ){
            this.showcaseSlideIndex++
         }
         if(target.classList.contains('arrow__priv') && this.showcaseSlideIndex != 0){
            this.showcaseSlideIndex--
         }
         this.showcaseList.style.transform = `translateX(-${this.showcaseSlideIndex * (this.showcaseCardWidth+20)}px)`
         
      })
   })
}

