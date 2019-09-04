@foreach ($itens as $item)

@php $item = json_decode($item) @endphp

<li>
    <div class="col-100 bg-w item-cima">
        <div class="float-left">
            <label id="nomeItem1" class="container">
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            
            
            <label class="container">
                <input type="checkbox" disabled>
                <span class="checkmark"></span>
                <input name="nome_item[]" value="{{$item->nomeItem}}" type="text" placeholder="Nome do item" id="nome_item1">
            </label>
             
        </div>
        
        <div class="float-right">
            <a href="#" class="link-sec">Ver Foto</a>
        </div>
    </div>
    
    <div class="col-100 bg-g item-baixo">
        <div class="float-left">
            <label>Quant.: <input value="{{$item->qtdItem}}" name="qtd_item[]" type="number" placeholder="0" id="qtd_item1"></label>
        </div>

        <div class="float-right">
            <label>Onde: <input value="{{$item->ondeItem}}" name="onde_item[]" type="text" placeholder="Ajude a achar o item" id="onde_item1"></label>
        </div>
    </div>
</li>

@endforeach

