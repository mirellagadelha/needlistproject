@extends('layouts.app')
@section('content')
<script src="{{ asset('/js/custom-view.js') }}"></script>

<nav class="fixed nav-act">
        <div class="max-w">
            <ul class="col-100">
                <li class="float-left"><a href="index.php" class="logo scroll">needlist</a></li>
                <li class="float-right"><a href="index.php" class="menu-item scroll">Criar lista</a></li>
            </ul>
        </div>
    </nav>

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

    <form class="" id="formlist" action="savelist" method="post" enctype="multipart/form-data">
    
        {{csrf_field()}}
        <input name="nome_lista" value="" id="nome_lista_input" type="hidden">
        <input name="desc_lista" value="" id="desc_lista_input" type="hidden">
        <input name="capa_lista" value="" id="capa_lista_input" type="hidden">

        <section id="capa_lista" class="interna center bg-img">
            <div class="bg-b-90">
                <main class="color-w">
                    <h1 id="nome_lista"></h1>
                    <p id="desc_lista"></p>
                </main>
            </div>
        </section>
        
        <section class="bg-w">
            <div class="max-w">
                <div class="col-60">
                    <ul class="lista-item">
                

                    </ul>
                    
                </div>
                <div class="col-40">
                    
                    <button class="btn-prim center" id="btnFinalizar" type="submit" >Finalizar</button>


                </div>
            
            </div>
        
        </section>

    </form>


    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/funcoes.js"></script>




@endsection