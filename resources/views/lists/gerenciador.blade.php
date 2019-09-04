@extends('layouts.app')
@section('content')

<script src="{{ asset('/js/custom.js') }}"></script>


<nav class="fixed nav-act">

    <div class="max-w">

        <ul class="col-100">

            <li class="float-left"><a href="index.php" class="logo scroll">needlist</a></li>
            <li class="float-right"><a href="#" class="menu-item scroll">Minhas listas</a></li>

        </ul>

    </div>

</nav>

<hr>

<section class="interna bg-w">

    <div class="max-w">
    
        <div class="col-60">
        
            <a href="#" class="link-prim">Nova lista em branco</a>
            
            <select class="uppercase bg-w">
            
                <option>Nova lista a partir de modelo</option>
                <option>Lista de casamento</option>
                <option>Lista de debutante</option>
                <option>Lista de chá de fraldas</option>
            
            </select>

           @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
   
            <form class="" id="formlist" action="saveImagesAndRedirectLogin" method="post" enctype="multipart/form-data">
    
                {{csrf_field()}}

                    <?php $token = uniqid();?>
                    <input name="token" value="<?php echo ($token); ?>"id="nome_capa_lista" type="hidden">
                    <input name="nome_lista" id="nome_lista" type="text" class="input-titulo" placeholder="Nome da lista">
                    <input name="desc_lista" id="desc_lista" type="text" class="input-desc" placeholder="Escreva aqui a finalidade da lista, informando sobre data, horário e local do evento">
                    <label for="capa" class="link-sec">Escolher uma foto de capa</label><input name="capa_lista" type="file" accept="image/*" id="capa"><img src="{{ asset('/img/icon-ok.png') }}" class="icon-ok">
                                                                                                                                               
                <ul class="lista-item">

                <div id="itens-lista" data-qtdItens="1">
                    <li>
                        <div class="col-100 bg-w item-cima">
                            <div class="float-left">
                                <label class="container">
                                    <input type="checkbox" disabled>
                                    <span class="checkmark"></span>
                                    <input name="nome_item[]" type="text" placeholder="Nome do item" id="nome_item1">
                                </label>
                            </div>
                            
                            <div class="float-right">  
                                <label for="foto" class="link-sec">Foto</label><input name="url_foto[]" type="file" accept="image/*" id="foto">
                                <a href="#" class="excluir middle"><img src="{{ asset('/img/icon-fechar.png') }}" title="Excluir item"></a>
                            </div>
                        </div>
                        
                        <div class="col-100 bg-g item-baixo">
                            <div class="float-left">
                                <label>Quant.: <input name="qtd_item[]" type="number" placeholder="0" id="qtd_item1"></label>
                            </div>
                            <div class="float-right">
                                <label>Onde: <input name="onde_item[]" type="text" placeholder="Ajude a achar o item" id="onde_item1"></label>
                            </div>
                        </div>
                    </li>
                </div>
                
                </ul>
                            
                <a id="novoItem" href="#" class="add-item center uppercase col-100">Adicionar item</a>
            
            </div>
            
            <div class="col-40">
            
                <button id="btnSalvar" type="submit" class="link-prim">Salvar</button>
                <a href="{{ url('/visualizar') }}" class="link-sec">Visualizar</a>
                
                <a href="gerenciador.php" class="btn-prim center">Compartilhar</a>
            
            </div>

        </form>
    
    </div>

</section>

<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
    
<script src="{{ asset('/js/funcoes.js') }}"></script>

@endsection
