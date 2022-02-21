let addButs = document.querySelectorAll('.product__add-to-basket-circle')
let addInput = document.querySelector('.input-text')

addButs.forEach((but)=>{
   but.addEventListener('click',()=>{
      if(but.classList.contains('reduce') && addInput.value>1){
         addInput.value--
      }else if(but.classList.contains('add')){
         addInput.value++
      }
   })
})