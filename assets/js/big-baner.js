let bigBanerSlideIndex = 0;
let bigBaner= document.querySelector('.big-baner');
let bigBanerList = bigBaner.querySelector('.big-baner__list');
let bigBanerArrows = bigBaner.querySelectorAll('.arrow');

let bigBanerItems = bigBaner.querySelectorAll('.big-baner__item');

let banerWidth = +window.getComputedStyle(bigBaner).width.match(/[0-9]+/)[0];  

bigBanerArrows.forEach((ar)=>{
   ar.addEventListener('click', (el)=>{
      let target = el.target;
      
      if(target.classList.contains('arrow__next')){
         if(bigBanerSlideIndex != bigBanerItems.length-1){
            bigBanerSlideIndex++;
         }
      }
      if(target.classList.contains('arrow__priv')){
         if(bigBanerSlideIndex>0){
            bigBanerSlideIndex--;
         }
      }
      bigBanerSlide();
   });

   function bigBanerSlide(){
      bigBanerList.style.transform=`translateX(-${bigBanerSlideIndex*banerWidth}px)`
   }

})
