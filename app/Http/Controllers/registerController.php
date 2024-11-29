<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlunoInfo;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Jobs\SendEmailJob;
use App\Models\EmailLog;
use Carbon\Carbon;



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
        $req->validate([
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required|digits_between:11,15',
            'email' => 'required|email',
            'uf' => 'required',
            'cidade' => 'required',
            'curso' => 'required',
            'mensagem' => 'max:2000',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome deve ter no máximo 50 caracteres.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.digits_between' => 'O campo telefone deve conter entre 11 e 15 dígitos.',
            'email.required' => 'O campo endereço de email é obrigatório.',
            'uf.required' => 'O campo UF é obrigatório.',
            'cidade.required' => 'O campo Cidade é obrigatório.',
            'curso.required' => 'O campo Curso é obrigatório.'
        ]);

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

        $dailyLimit = config('mail.daily_limit'); 
        $emailsSentToday = EmailLog::whereDate('created_at', Carbon::today())->count();

        if ($emailsSentToday >= $dailyLimit) {
            return redirect()->route('app.error')->with('danger', 'Limite diário de downloads atingido desculpe. :('); 
        }


        

        try {
            SendEmailJob::dispatch($recipientEmail);
        } catch (Exception $e) {
            Log::error('Erro ao enviar email: ' . $e->getMessage());
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


