<?php

namespace App\Http\Middleware;

use Closure;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateRequestData
{
   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next){
        if ($request->is('register') && $request->isMethod('post')) {
            $request->validate([
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
            
        }

        
        return $next($request);
        
        
    }
}
