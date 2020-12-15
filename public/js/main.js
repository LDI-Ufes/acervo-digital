// 1. PLUGIN SLICK.JS

$('.slider').slick({
    dots: true,
    arrows: false,
    infinite: true,
    speed: 300,
    mobileFirst: true,
    responsive: [
      {
        breakpoint: 1340,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2,
          infinite: true,
          dots: true,
          arrows: true,
          variableWidth: false,
        }
      },
      {
        breakpoint: 1139,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2,
          infinite: true,
          dots: true,
          arrows: false,
          variableWidth: false,
        }
      },
      {
        breakpoint: 720,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          variableWidth: true,
        }
      },
      {
        breakpoint: 561,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          variableWidth: true,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }

    ]
  });

// Não deixar o leitor de tela ler as setas/marcações do plugin slider
$('.slick-dots').attr('aria-hidden', 'true');
$('.slick-arrow').attr('aria-hidden', 'true');





// 2. NAVEGAR POR CURSOS
// TAB-MENU

// menu mobile
$('#dropdown-menu').click( function(){
  $('#itens-abas').slideToggle(300);
});

// If click outside dropdown-menu opened
$(document).click(function() {
  if (!$(event.target).closest('#dropdown-menu,#itens-abas').length) {
    // If max-width 991px
    if ($(window).width() <= 759) {
      // Slide up (close) menu panel
      $('#itens-abas').slideUp(300);
    }
  }
});

// abas

$(function () {
  var tabs = $("#abas");

  // For each individual tab DIV, set class and aria-hidden attribute, and hide it
  $(tabs).find("> div").attr({
    "class": "tabPanel",
    "aria-hidden": "true"
  }).hide();

  // Get the list of tab links
  var tabsList = tabs.find("ul:first").attr({
    "class": "tabsList"
  });

  // For each item in the tabs list...
  $(tabsList).find("li > a").each(
          function (a) {
            var tab = $(this);

            // Create a unique id using the tab link's href
            var tabId = "tab-" + tab.attr("href").slice(1);

            // Assign tab id and aria-selected attribute to the tab control, but do not remove the href
            tab.attr({
              "id": tabId,
              "aria-selected": "false"
            }).parent().attr("role", "presentation");

            // Assign aria attribute to the relevant tab panel
            $(tabs).find(".tabPanel").eq(a).attr("aria-labelledby", tabId);

            // Set the click event for each tab link
            tab.click(
                    function (e) {
                      var tabPanel;

                      // Prevent default click event
                      e.preventDefault();

                      // Change state of previously selected tabList item
                      $(tabsList).find("> li.current").removeClass("current").find("> a").attr("aria-selected", "false");

                      // Hide previously selected tabPanel
                      $(tabs).find(".tabPanel:visible").attr("aria-hidden", "true").hide();

                      // Show newly selected tabPanel
                      tabPanel = $(tabs).find(".tabPanel").eq(tab.parent().index());
                      tabPanel.attr("aria-hidden", "false").show();

                      // Set state of newly selected tab list item
                      tab.attr("aria-selected", "true").parent().addClass("current");

                      // Set focus to the paragraph in the newly revealed tab content
                      tabPanel.children("ul").find('li:first-of-type').focus();
                      tabPanel.children("ul").find('li:first-of-type a').focus();

                      // If max-width 991px
                      if ($(window).width() <= 759) {
                        // Slide up (close) menu panel
                        $('#itens-abas').slideUp(300);
                      }

                      // Change the menu collapsed title
                      let itemSelecionado = tab.attr('aria-selected', 'true').html();
                      $('#dropdown-menu').html(itemSelecionado + '<i class="fas fa-angle-down"></i>');

                    }

            );
          }
  );

  // Set keydown events on tabList item for navigating tabs
  $(tabsList).delegate("a", "keydown",
          function (e) {
            var tab = $(this);
            switch (e.which) {
              case 37:
              case 38:
                if (tab.parent().prev().length !== 0) {
                  tab.parent().prev().find("> a").click();
                } else {
                  $(tabsList).find("li:last > a").click();
                }
                break;
              case 39:
              case 40:
                if (tab.parent().next().length !== 0) {
                  tab.parent().next().find("> a").click();
                } else {
                  $(tabsList).find("li:first > a").click();
                }
                break;
            }
          }
  );

  // Show the first tabPanel
  $(tabs).find(".tabPanel:first").attr("aria-hidden", "false").show();

  // Set state for the first tabsList li
  $(tabsList).find("li:first").addClass("current").find(" > a").attr({
    "aria-selected": "true",
    "tabindex": "0"
  });
});




// FILTER-PESQUISA

$(".exibe-filtros").click(function () {
  $(this).siblings('div').slideToggle();
  $(this).parent().toggleClass('ativo').siblings().removeClass('ativo').find('> div').slideUp();
});

// If click outside dropdown-menu opened
$(document).click(function () {
  if (!$(event.target).closest('#filtros').length) {
    $('.seletor').removeClass('ativo').find('> div').slideUp(300);
  }
});




//
// Menu acessível via teclado
//

$(document).ready(function () {

  $.fn.accessibleDropDown = function () {
    var el = $(this);

    $('a', el).focus(function () {
      $(this).parents('li').addClass('menu-ativo');
      $(this).parents('.menu-lista').addClass('menu-aberto');
    }).blur(function () {
      $(this).parents('li').removeClass('menu-ativo');
      $(this).parents('.menu-lista').removeClass('menu-aberto');
    });
  }

  $('.nav-menu').accessibleDropDown();

});


//
// Menu móvel
//

$('.btn-menu').click(function() {
  $(this).siblings('.nav-menu').children('.menu-lista').toggleClass('menu-aberto')
})

$('.tem-submenu span').click(function() {
  $('.tem-submenu').toggleClass('submenu-ativo');
})

$('.btn-drop').click(function() {
  $(this).children('i.fas').toggleClass('expandido');
})


// 
  // scroll top

  $('#voltar-ao-topo').click(function () {
    $('html, body').animate({scrollTop: 0}, 800);
  });

  $(window).scroll(function () {
    $(window).scrollTop() > 20 ? $('#voltar-ao-topo').fadeIn(300) : $('#voltar-ao-topo').fadeOut(300);
  });


// INDEX - CURSOS
const navCursosBtn = document.querySelectorAll('#itens-abas li a');

const navCursosListas = document.querySelectorAll('.lista-cursos');

navCursosListas[0].classList.add('ativo');
navCursosBtn[0].classList.add('current');

navCursosBtn.forEach( (item, index) => {

    item.addEventListener('click', function(event){

      event.preventDefault();
        
      navCursosListas.forEach((item) => {
        item.classList.remove('ativo');
      });

      navCursosBtn.forEach( (item) => {
        item.classList.remove('current');
      });

        this.classList.add('current');
        navCursosListas[index].classList.add('ativo');
    });

});



const allWrapper = document.querySelectorAll('.wrapper');
const quantItens = document.querySelectorAll('.wrapper span');

quantItens.forEach( (item, index) => {
  const spanNumber = Number(item.outerText);
  if(spanNumber < 1){
    allWrapper[index].classList.add('none');
  }
});

const noneWrapper = document.querySelectorAll('.wrapper.none input');
const hasWrapper = document.querySelectorAll('.wrapper input');

hasWrapper.forEach( (item) => {
  item.checked = true;
});

noneWrapper.forEach( (item) => {
  item.disabled = true;
  item.checked = false;
});


