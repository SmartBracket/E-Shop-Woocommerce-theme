let addButs = document.querySelectorAll('.product__add-to-basket-circle')
let addInput = document.querySelector('.product__add-to-basket-input')

addButs.forEach((but)=>{
   but.addEventListener('click',()=>{
      if(but.classList.contains('reduce') && addInput.value>1){
         addInput.value--
      }else if(but.classList.contains('add')){
         addInput.value++
      }
   })
})