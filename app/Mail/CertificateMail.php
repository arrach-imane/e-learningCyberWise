<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\CertificateModel;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $certificate;
    public $pdf;

    public function __construct(CertificateModel $certificate, $pdf)
    {
        $this->certificate = $certificate;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->subject('Your Course Completion Certificate - CyberWise')
                    ->view('emails.certificate')
                    ->attachData($this->pdf->output(), 'certificate.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
