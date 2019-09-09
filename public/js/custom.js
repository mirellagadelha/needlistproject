//lista
var list = localStorage.getItem("list");
list = JSON.parse(list); 
if(list == null) 
list = [];

jQuery(document).ready(function() {
    localStorage.removeItem("tbItens");

    var indice_id = 2;
    $('#novoItem').click(function(e) {
        e.preventDefault();   
            $('#itens-lista').append('<ul id="item-lista" class="lista-item">\
            <li>\
                <div class="col-100 bg-w item-cima">\
                    <div class="float-left">\
                        <label class="container">\
                            <input type="checkbox" disabled>\
                            <span class="checkmark"></span>\
                            <input name="nome_item[]" type="text" placeholder="Nome do item" id="nome_item'+indice_id+'">\
                        </label>\
                    </div>\
                    <div class="float-right">\
                    <label for="foto" class="link-sec">Foto</label><input type="file" accept="image/*" id="foto">\
                    <a href="#" id="remover_campo" class="excluir middle"><img src="/img/icon-fechar.png" title="Excluir item"></a>\
                    </div>\
                </div>\
                <div class="col-100 bg-g item-baixo">\
                    <div class="float-left">\
                        <label>Quant.: <input name="qtd_item[]" type="number" placeholder="0" id="qtd_item'+indice_id+'"></label>\
                    </div>\
                    <div class="float-right">\
                        <label>Onde: <input name="onde_item[]" type="text" placeholder="Ajude a achar o item" id="onde_item'+indice_id+'"></label>\
                    </div>\
                </div>\
            </li>\
            </ul>');

            indice_id++;
    });

    // Remover o div anterior
    $('#itens-lista').on("click","#remover_campo",function(e) {
        e.preventDefault();
        $(this).parents('#item-lista').remove();
    });

    $("#btnSalvar").click(function(e) {
        localStorage.removeItem("list");
        localStorage.removeItem("itemsList");
        
        var nome_imagem = $("#nome_capa_lista").val();

        var lista = JSON.stringify({
            nomeLista : $("#nome_lista").val(),
            descLista : $("#desc_lista").val(),
            capaLista : 'listas/listas_capas/'+nome_imagem+'.jpg'
        });

        list.push(lista);
        localStorage.setItem("list", JSON.stringify(list));

        var itemName = [];
        var itemQtd = [];
        var itemWhere = [];

        $("input[name='nome_item[]']").each(function(index){
            itemName.push($(this).val());
        });

        $("input[name='qtd_item[]']").each(function(){
             itemQtd.push($(this).val());
         });

         $("input[name='onde_item[]']").each(function(){
            itemWhere.push($(this).val());
        });

        var itemsList = [];
        itemName.forEach(function (item, index) {
            var item = {};
            item = {
                name: itemName[index],
                qtd: itemQtd[index],
                where: itemWhere[index]
            }

            itemsList.push(JSON.stringify(item));
        });

        localStorage.setItem("itemsList", JSON.stringify(itemsList));
    });

    
});