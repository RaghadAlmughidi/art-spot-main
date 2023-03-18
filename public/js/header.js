const humbergur = document.querySelector(".humbergur");
const navMenu=document.querySelector(".nav-menu");
humbergur.addEventListener("click",()=>{
    humbergur.classList.toggle("active");
    navMenu.classList.toggle("active");
});

document.querySelectorAll(".item-link").forEach(n=>
    n.addEventListener("click",()=>{
        humbergur.classList.toggle("active");
        navMenu.classList.toggle("active");
    }))