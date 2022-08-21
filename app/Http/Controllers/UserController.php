<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class UserController extends Controller
{
    public function index(Request $request){
      
       $title = 'CRC';
       $users = DB::table('users')->paginate(10);
       $location = "Toronto";
       $apiKey = '08e45687a9ee6248421ec305e08656aa';
       $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q=Belem&appid=08e45687a9ee6248421ec305e08656aa");
       return view('panel/home/index',compact('users','response'));
    }

    public function create(Request $request){
        
        if(empty($request->name)){
            $login['success'] = false;
            $login['message'] = "<b>Campo Nome é Obrigatório</b>";
            echo json_encode($login);
            return;
        }
        if(empty($request->telefone)){
            $login['success'] = false;
            $login['message'] = "<b>Campo Telefone é Obrigatório</b>";
            echo json_encode($login);
            return;
        }
        if(empty($request->data)){
            $login['success'] = false;
            $login['message'] = "<b>O Campo Data é Obrigatório</b>";
            echo json_encode($login);
            return;
        }
        if(empty($request->email)){
            $login['success'] = false;
            $login['message'] = "<b>O Campo Email é Obrigatório</b>";
            echo json_encode($login);
            return;
        }
        if(empty($request->cpfcnpj)){
            $login['success'] = false;
            $login['message'] = "<b>O Campo Cpf/cnpj é Obrigatório</b>";
            echo json_encode($login);
            return;
        }
        if(empty($request->mensagem)){
            $login['success'] = false;
            $login['message'] = "<b>O Campo Mensagem é Obrigatório</b>";
            echo json_encode($login);
            return;
        }
        
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
         $login['success'] = false;
         $login['message'] = "<b>O e-mail informado não é válido!</b>";
         echo json_encode($login);
         return;
        }
                
        $user = new User();
        $user->password = 123;
        $user->name = $request->name;
        $user->telefone = $request->telefone;
        $user->data = $request->data;
        $user->email = $request->email;
        $user->cpfcnpj = $request->cpfcnpj;
        $user->mensagem = $request->mensagem;

        $insert = $user->save();
        if($insert){
            $login['success'] = true;
            $login['message'] = "<b>Usuário cadastrado com sucesso!</b>";
            echo json_encode($login);
            return; 
        }

        return;
    }
}
