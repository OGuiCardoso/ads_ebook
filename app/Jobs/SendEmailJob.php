<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\EbookMail;
use Exception;
use Illuminate\Support\Facades\Log;

class SendEmailJob implements ShouldQueue
{
    use Queueable;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $url; 
    public $email;
   
    public function __construct($email, $url)
    {
        $this->email = $email;
        $this->url = $url;
    }

    
    public function handle(): void
    {
        try{
            Mail::to($this->email)->send(new EbookMail($this->url));
        }catch(Exception $e){
            log::error('Erro ao enviar menssagem na fila' . $e);
            throw $e;
            
        }
    }
}
