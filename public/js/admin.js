const menuBtn = document.querySelector('.sidebar-toggle');

menuBtn.addEventListener('click', function(e){
    e.preventDefault();
    document.body.classList.toggle('open');
    this.classList.toggle('open');
});

const itemHeader = document.querySelectorAll('.header');
const itemDropdown = document.querySelectorAll('.header .item-dropdown');

itemDropdown.forEach( (item, index) => {
    
    item.addEventListener('click', function(){

        // itemHeader.forEach( (header, index) => {
        //     header.classList.remove('selecionado');
        // });

        itemHeader[index].classList.toggle('selecionado');
    });

});