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

            var tbItens = localStorage.getItem("tbItens");
            tbItens = JSON.parse(tbItens); 
            if(tbItens == null) 
            tbItens = [];

            var itemList = indice_id-1;
            var item = JSON.stringify({
                nomeItem : $("#nome_item"+itemList).val(),
                qtdItem : $("#qtd_item"+itemList).val(),
                ondeItem : $("#onde_item"+itemList).val()
            });

            tbItens.push(item);
            localStorage.setItem("tbItens", JSON.stringify(tbItens));

            indice_id++;
    });

    // Remover o div anterior
    $('#itens-lista').on("click","#remover_campo",function(e) {
        e.preventDefault();
        $(this).parents('#item-lista').remove();
    });


    $("#btnSalvar").click(function() {
        localStorage.removeItem("tbLista");
        
        //var indice_selecionado = -1; //Índice do item selecionado na lista
        var tbLista = localStorage.getItem("tbLista");
        tbLista = JSON.parse(tbLista); 
        if(tbLista == null) 
        tbLista = [];

        var nome_imagem = $("#nome_capa_lista").val();

        var lista = JSON.stringify({
            nomeLista : $("#nome_lista").val(),
            descLista : $("#desc_lista").val(),
            capaLista : 'listas/listas_capas/'+nome_imagem+'.jpg'
        });

        tbLista.push(lista);
        localStorage.setItem("tbLista", JSON.stringify(tbLista));

    });
});



