<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Estado;

class ImportEstados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-estados';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa estados da API do IBGE e armazena no banco de dados';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome');
        if ($response->successful()){
            $estados = $response->json();
            foreach($estados as $estado){
                Estado::updateOrCreate(
                    ['sigla' => $estado['sigla']], 
                    ['nome' => $estado['nome']]
                );
            }
            $this->info('Estados importados com sucesso.');
        }
        else{
            $this->info('Erro ao importar estados da API');
        }
    }
}
