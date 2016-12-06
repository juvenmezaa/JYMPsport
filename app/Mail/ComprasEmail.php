<?php

namespace App\Mail;

use App\User;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\PDF;
use App\comprasModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ComprasEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $compra;
    public $pdf;

    public function __construct(User $user, comprasModel $compra, PDF $dompdf)
    {
        $this->usuario = $user;
        $this->compra = $compra;
        // $dompdf = new Dompdf();
        // $vista      = view('compraPDF',compact($compra,$user));
        // $dompdf     = \App::make('dompdf.wrapper');
        // //$dompdf->loadView($vista);
        // $this->pdf = $dompdf->loadFile($vista)->save();
        $this->pdf = $dompdf->getDomPDF()->render();
    }

    public function build()
    {
        return $this->view('compraPDF');
        //->attachData($this->pdf, 'ReciboDeCompra.pdf',[
        //	'mime' => 'application/pdf',]);
    }
}
