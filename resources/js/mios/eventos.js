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

    // let modoEnvio = document.querySelectorAll('input[name="checkout[envio]"]');
    // modoEnvio.forEach(input =>{
    //     input.addEventListener('click', metodoEnvio);
    // })
}

function popOver(element) {
    let emer = element.nextElementSibling;
    emer.classList.toggle('hidden');
}

function metodoEnvio(e) {
    let total = document.querySelector('.total');
    if(e.target.value === 'envio-dom') {
        total.innerHTML = "${{Cart::getTotal() + $500;}}";
    } else {
        total.innerHTML = "${{Cart::getTotal();}}"; 
    }
}