//variavel lista
var list = localStorage.getItem("list");
list = JSON.parse(list); 
if(list == null) 
list = [];

//varivavel item
var tbItems = localStorage.getItem("itemsList");
tbItems = JSON.parse(tbItems); 
if(tbItems == null) 
tbItems = [];

//lista
$( document ).ready(function() {

    var lista = JSON.parse(list[0]);
    
    $('#nome_lista').append(lista.nomeLista);
    $('#desc_lista').append(lista.descLista);

    var capa_lista = document.getElementById("capa_lista");  
    capa_lista.setAttribute("style", 'background-image: url('+lista.capaLista+');');

    document.getElementById('nome_lista_input').value = lista.nomeLista;
    document.getElementById('desc_lista_input').value = lista.descLista;
    document.getElementById('capa_lista_input').value = lista.capaLista;

});

function getQtdItens(){
    qtdItems = tbItems.length
    return qtdItems;
}

function getItems(){
    return tbItems;
}

$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'POST',
        url:'/ajaxRequestItems',
        data:{itens:getItems(),qtdItens:getQtdItens()},
        success:function(data){
            $(".lista-item").html(data); 
        }
    });
});
