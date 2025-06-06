<?php

namespace App\Listeners;

use App\Events\CourseCompleted;
use App\Models\CertificateModel;
use App\Mail\CertificateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class GenerateAndSendCertificate
{
    public function handle(CourseCompleted $event)
    {
        // Generate unique certificate number
        $certificateNumber = 'CERT-' . strtoupper(Str::random(10));

        // Create certificate record
        $certificate = CertificateModel::create([
            'user_id' => $event->user->user_id,
            'course_id' => $event->course->course_id,
            'certificate_number' => $certificateNumber,
            'issue_date' => now(),
            'status' => 'active'
        ]);

        // Generate PDF
        $pdf = PDF::loadView('certificates.template', [
            'certificate' => $certificate,
            'user' => $event->user,
            'course' => $event->course
        ]);

        // Send email with certificate
        Mail::to($event->user->email)->send(new CertificateMail($certificate, $pdf));
    }
}
