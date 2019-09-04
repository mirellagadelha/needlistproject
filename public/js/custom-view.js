//utils
cont = 1

//variavel lista
var tbLista = localStorage.getItem("tbLista");
tbLista = JSON.parse(tbLista); 
if(tbLista == null) 
tbLista = [];

//varivavel item
var tbItens = localStorage.getItem("tbItens");
tbItens = JSON.parse(tbItens); 
if(tbItens == null) 
tbItens = [];

//lista
$( document ).ready(function() {

    var lista = JSON.parse(tbLista[0]);
    
    $('#nome_lista').append(lista.nomeLista);
    $('#desc_lista').append(lista.descLista);

    var capa_lista = document.getElementById("capa_lista");  
    capa_lista.setAttribute("style", 'background-image: url('+lista.capaLista+');');

    document.getElementById('nome_lista_input').value = lista.nomeLista;
    document.getElementById('desc_lista_input').value = lista.descLista;
    document.getElementById('capa_lista_input').value = lista.capaLista;


});

//itens
$( document ).ready(function() {
    for (item in tbItens) {
        item = JSON.parse(tbItens[item]);

    }
});

//retorna quantidade de itens
function getQtdItens(){
    qtdItens = tbItens.length
    return qtdItens
}

function getItens(){
    qtdItens = tbItens
    return qtdItens
}


$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'POST',
        url:'/ajaxRequestPost',
        data:{itens:getItens(),qtdItens:getQtdItens()},
        success:function(data){
            $(".lista-item").html(data); 
        }
    });
});
