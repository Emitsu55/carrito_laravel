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

    let modoEnvio = document.querySelectorAll('input[name="retiro[modo]"]');
    modoEnvio.forEach(input =>{
        input.addEventListener('click', metodoEnvio);
    })
}

function popOver(element) {
    let emer = element.nextElementSibling;
    emer.classList.toggle('hidden');
}

function metodoEnvio(e) {
    let envio = document.querySelector('#envio_dom');
    let retiro = document.querySelector('#retiro_suc');
    if(e.target.value === 'envio-domicilio') {
        envio.classList.remove('hidden');    
        retiro.classList.add('hidden');    
    } else {
        envio.classList.add('hidden');    
        retiro.classList.remove('hidden');    
    }
}