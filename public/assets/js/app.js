document.addEventListener('DOMContentLoaded', function() {

    addEvents();
});

function addEvents() {
    let imgs = document.querySelectorAll('.img-prod');
    imgs.forEach(img => {
        img.addEventListener('mouseover', function(){
            popOver(img);
        });
        img.addEventListener('mouseout', function(){
            popOver(img);
        });
    });
}

function popOver(element) {
    let emer = element.nextElementSibling;
    emer.classList.toggle('hidden');
}