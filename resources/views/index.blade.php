@extends('layouts.app')
@section('content')

    <nav class="fixed">

        <div class="max-w">

            <ul class="col-100">

                <li class="float-left"><a href="#topo" class="logo scroll">needlist</a></li>
                <li class="float-right"><a href="#tutorial" class="menu-item scroll">Tutorial</a></li>
                <li class="float-right"><a href="#vantagens" class="menu-item scroll">Vantagens</a></li>

            </ul>

        </div>

    </nav>

    <header class="full-h center bg-img hotsite" id="topo">

        <div class="full-w full-h bg-gradient">

            <main class="col-100 middle max-w">

                <img src="">
                <h1>Monte listas para qualquer evento</h1>
                <p>Olá, essa é uma lista de desejos. Ela surgiu da vontade de facilitar a escolha de algo para demonstrar seu afeto por alguém e como forma de proteger o meio ambiente, pois tudo que se encontra na lista será usufruido</p>

                <div class="col-33"><a href="{{ url('/gerenciador') }}" class="btn-sec">Criar lista</a></div>
                
                <div class="col-33"><a href="#vantagens" class="btn-ter scroll">Conheça</a></div>

            </main>

        </div>

    </header>
    
    <hr id="vantagens">

    <section class="bg-w">

        <div class="max-w center">

            <h2>Vantagens</h2>

            <div class="col-33">

                <img class="icon-vantagens" src="./img/icon-01.png">
                <h3>Certeza de agradar</h3>

            </div>

            <div class="col-33">

                <img class="icon-vantagens" src="./img/icon-02.png">
                <h3>Rapidez na escolha</h3>

            </div>

            <div class="col-33">

                <img class="icon-vantagens" src="./img/icon-03.png">
                <h3>Facilidade em encontrar</h3>

            </div>

            <div class="col-33">

                <img class="icon-vantagens" src="./img/icon-04.png">
                <h3>Proteção do meio ambiente</h3>

            </div>

            <div class="col-33">

                <img class="icon-vantagens" src="./img/icon-05.png">
                <h3>Solidariedade</h3>

            </div>

            <div class="col-33">

                <img class="icon-vantagens" src="./img/icon-06.png">
                <h3>Economia para quem necessita</h3>

            </div>

        </div>

    </section>
    
    <hr id="tutorial">

    <section class="bg-w">

        <div class="max-w center">

            <h2>Tutorial</h2>

            <div class="col-33 left">

                <img class="icon-tutorial" src="./img/icon-07.png">
                <p class="tutorial">Faça o seu cadastro de usuário</p>

            </div>

            <div class="col-33 left">

                <img class="icon-tutorial" src="./img/icon-08.png">
                <p class="tutorial">Monte sua lista de desejos</p>

            </div>

            <div class="col-33 left">

                <img class="icon-tutorial" src="./img/icon-09.png">
                <p class="tutorial">Compartilhe com seus amigos</p>

            </div>

        </div>

    </section>

    <section class="bg-w">

        <div class="max-w center">

            <div class="col-33"><a href="{{ url('/gerenciador') }}" class="btn-prim">Criar lista</a></div>
            
        </div>

    </section>

    <footer class="center">

        Needlist 2018 - Todos os direitos reservados

    </footer>

    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/funcoes.js"></script>
    <script>

        $(document).ready(function() {
          $(window).scroll(function() {
            var scroll_offset = $(window).scrollTop();
            if (scroll_offset > 50) {
              $('nav').addClass("nav-act");
            } else {
              $('nav').removeClass("nav-act");
            }
          });
        });
        
    </script>

@endsection
