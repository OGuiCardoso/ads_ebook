<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlunoInfo;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Jobs\SendEmailJob;



class registerController extends Controller
{

    public function show_form(){

        try{
            $estados = Estado::orderBy('nome', 'asc')->get();
            return view('app.register', compact('estados'));
        }catch(Exception $e){
            Log::error('Erro ao buscar estados: ' . $e->getMessage());
            return redirect()->route('app.error')->with('danger', 'Erro ao buscar estado. Desculpe mas esta área não esta acessivel no momento.');
        }
    }

    public function buscar_cidade($estadoSigla){
        $estado = Estado::where('sigla', $estadoSigla)->first();
        if (!$estado) {
            return response()->json(['error' => 'Estado não encontrado'], 404);
        }

        $cidade = Cidade::where('estado_id', $estado->id)
                                ->orderBy('nome', 'asc')
                                ->get();
        if (!$cidade) {
            return response()->json(['error' => 'Erro ao carregar cidades.'], 404);
        }
        return response()->json($cidade);

    }

   
    public function register(Request $req){
        
        $aluno = new AlunoInfo();
        $aluno->nome = $req->input('nome');
        $aluno->telefone = $req->input('telefone');
        $aluno->email = $req->input('email');
        $aluno->uf = $req->input('uf');
        $aluno->cidade = $req->input('cidade');
        $aluno->curso = $req->input('curso');
        $aluno->menssagem = $req->input('menssagem');
        
        if($aluno->menssagem  == 'Deixe sua mensagem aqui.'){
            $aluno->menssagem = '';
        }

        $recipientEmail = $aluno->email;

        if(!$recipientEmail){
            return response()->json(['error' => 'Email não inserido.'], 404);
        }

        $publicId = env('PUBLIC_ID'); 
        
        $url = cloudinary()->getUrl($publicId);

        if($url === ""){
            return redirect()->route('app.error')->with('danger', 'O Ebook não foi encontrado, deculpe. :(');
        }

        try{
            SendEmailJob::dispatch($recipientEmail, $url);
        }catch(Exception $e){
            Log::error('Erro ao Enviar email: ' . $e->getMessage());
            return redirect()->route('app.error')->with('danger', 'Erro ao enviar email.');

        }
            
        try{
            $aluno->save();
        }catch(Exception $e){
            Log::error('Erro ao Salvar os dados no banco: ' . $e->getMessage());
            return redirect()->route('app.error')->with('danger', 'erro ao salvar os dados.');
        }



        return redirect()->route('app.register')->with('success', 'Aluno cadastrado com sucesso. Verifique seu email.');
    }
}


