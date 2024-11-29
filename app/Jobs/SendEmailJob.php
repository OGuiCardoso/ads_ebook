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


    public $recipientEmail;
   
    public function __construct($recipientEmail)
    {
        $this->recipientEmail = $recipientEmail;
    }

    
    public function handle(): void
    {
        $fileUrl = 'https://drive.google.com/file/d/1luV2YS-wDdPKQgZ0KZngxBx42f70R_28/view?usp=sharing';
    
        try {
            Mail::send('app.ebookMail', ['fileUrl' => $fileUrl], function ($message) {
                $message->to($this->recipientEmail)
                        ->subject('Seu eBook Interativo Está Aqui!');
            });
    
            Log::info("E-mail enviado com sucesso para {$this->recipientEmail}");
        } catch (Exception $e) {
            Log::error("Erro ao enviar e-mail para {$this->recipientEmail}: " . $e->getMessage());
        }
    }
    
}
