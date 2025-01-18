const header = document.querySelector("header");
window.addEventListener ("scroll",function(){
    header.classList.toggle("sticky",window.scrollY > 0);
});

const heartButton = document.getElementById('heart-button')
heartButton.onclick = (e)=>{
    const target = e.target
    if(target.classList.contains('bx-heart')) {
        target.classList.remove('bx-heart')
        target.classList.add('bxs-heart')
    } else{
        target.classList.remove('bxs-heart')
        target.classList.add('bx-heart')
    }
};
