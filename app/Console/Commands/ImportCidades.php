<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use App\Models\Cidade;
use App\Models\Estado;

class ImportCidades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-cidades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa cidades ultilizando API do IBGE';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/municipios");

        if ($response->successful()){
            $cidades = $response->json();
            foreach($cidades as $cidade){
                $estdo_sigla = $cidade['microrregiao']['mesorregiao']['UF']['sigla'];

                $estado = Estado::where('sigla', $estdo_sigla)->first();

                if ($estado){
                    Cidade::updateOrCreate(
                        ['nome' => $cidade['nome']],
                        ['estado_id' =>$estado->id]
                    );
                }
            }

            $this->info('Cidades importadas com sucesso.');
        }
        else{
            $this->info('Erro ao importar cidades.');
        }
    }
}
