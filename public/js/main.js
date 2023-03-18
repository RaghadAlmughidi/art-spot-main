

let fillTow=document.querySelector('.fill-two');
let fillThree=document.querySelector('.full-lay')
let fullLay=document.querySelector('.full-lay')
let galleryCards = document.querySelector('.gallery-cards')




  

fillTow.addEventListener('click',()=>{
  
    galleryCards.classList.remove('gallery-cards');
    galleryCards.classList.add('gallery-cards-2');
   

})

fillThree.addEventListener('click',()=>{
    galleryCards.classList.remove('gallery-cards-2');
   
    galleryCards.classList.add('gallery-cards');
   

})




