<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlunoInfo;
use Illuminate\Support\Facades\Http;
use App\Models\Cidade;
use App\Models\Estado;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Log;
use Cloudinary\Api\Admin\AdminApi;
use App\Mail\EbookMail;
use Illuminate\Support\Facades\Mail;



class registerController extends Controller
{

    public function show_form(){
        $estados = Estado::orderBy('nome', 'asc')->get();
        return view('app.register', compact('estados'));
       
    }
    public function buscar_cidade($estadoSigla){
        $estado = Estado::where('sigla', $estadoSigla)->first();
        if (!$estado) {
            return response()->json(['error' => 'Estado não encontrado'], 404);
        }

        $cidades = Cidade::where('estado_id', $estado->id)
                        ->orderBy('nome', 'asc')
                        ->get();
        return response()->json($cidades);
    }

   
    public function register(Request $req){
        $req->validate([
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required|digits:11|min:11|max:11',
            'email' => 'required',
            'uf' => 'required',
            'cidade' => 'required',
            'curso' => 'required', 
            'mensagem' => 'max:2000'   

        ],[
        'nome.required' => 'O campo nome é obrigatório.',
        'nome.max' => 'O campo telefone deve ter no máximo 50 números.',
        'nome.min' => 'O campo telefone deve ter no minimo 3 números.',
        'telefone.required' => 'O campo telefone é obrigatório.',
        'telefone.max' => 'O campo telefone deve ter no máximo 11 números.',
        'telefone.min' => 'O campo telefone deve ter no minimo 11 números.',
        'telefone.digits' => 'O campo telefone deve conter apenas números.',
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

        $recipientEmail = $aluno->email;

        $publicId = 'ebookAds/TestPdf_ascgvg'; 
        $url = cloudinary()->getUrl($publicId);

        Mail::to($recipientEmail)->send(new EbookMail($url));
        $aluno->save();
        return redirect()->route('app.register')->with('success', 'Aluno cadastrado com sucesso. Verifique seu email.');
    }
}


