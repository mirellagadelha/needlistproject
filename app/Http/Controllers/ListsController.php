<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Lists;
use App\Item;

class ListsController extends Controller
{

    public function saveImagesAndRedirectLogin (Request $request){

        $nome_capa_lista = $request->input('token');
        $capa_lista = $request->file('capa_lista');

        $capa_lista_path = $capa_lista->storeAs('listas_capas',$nome_capa_lista.'.jpg', ['disk' => 'public_listas']); //salva imagem da capa da lista
        return \Redirect::to('login');

    }

    public function ajaxRequestItems(Request $request)
    {

        $itens = $request->input('itens');
        $qtdItens = $request->input('qtdItens');

        return view('lists/lista',["itens" => $itens]);
    }
    
    public function saveListUser (Request $request){
        
        //lista
        $this->validate(request(), ['nome_lista' => 'required'], ["nome_lista.required" => "O nome da lista é obrigatório!"]);
        $this->validate(request(), ['desc_lista' => 'required'], ["desc_lista.required" => "A descrição da lista é obrigatório!"]);
        $this->validate(request(), ['capa_lista' => 'required'], ["capa_lista.required" => "Favor inserir a foto da capa da lista"]);

        $nome_lista = $request->input('nome_lista');
        $desc_lista = $request->input('desc_lista');
        $capa_lista = $request->input('capa_lista');

        $nome_items = $request->input('nome_item');
        $qtd_items = $request->input('qtd_item');
        $onde_items = $request->input('onde_item');

        $qtdItens = count($nome_items);

        if (Auth::check()) {

            $user = Auth::user();

            $list = new Lists;
            $list->nome = $nome_lista;
            $list->descricao = $desc_lista;
            $list->iamgem_fundo = $capa_lista;
    
            $new_list = $user->lists()->save($list);
            $list = Lists::find($new_list->id);

            for ( $i = 0 ; $i <  $qtdItens ; $i++ ) {
                $item[$i] = new Item;
                $item[$i]->nome = $nome_items[$i];
                $item[$i]->qtde = $qtd_items[$i];
                $item[$i]->onde_encontrar = $onde_items[$i];

                $new_items = $list->items()->saveMany([$item[$i]]);
            }

            return view('lists/compartilhar',["user" => $user]);


        }else{
            return \Redirect::to('login');
        }
    }
}
