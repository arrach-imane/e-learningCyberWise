<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SetupMailConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up Gmail SMTP configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $envPath = base_path('.env');

        if (!File::exists($envPath)) {
            $this->error('.env file not found!');
            return 1;
        }

        $envContent = File::get($envPath);

        // Update mail configuration
        $mailConfig = [
            'MAIL_MAILER=smtp',
            'MAIL_HOST=smtp.gmail.com',
            'MAIL_PORT=587',
            'MAIL_USERNAME=cyberwise.lms@gmail.com',
            'MAIL_PASSWORD=your-16-character-app-password',
            'MAIL_ENCRYPTION=tls',
            'MAIL_FROM_ADDRESS=cyberwise.lms@gmail.com',
            'MAIL_FROM_NAME="CyberWise"'
        ];

        foreach ($mailConfig as $config) {
            $key = explode('=', $config)[0];
            $pattern = "/^{$key}=.*/m";

            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, $config, $envContent);
            } else {
                $envContent .= "\n" . $config;
            }
        }

        File::put($envPath, $envContent);

        $this->info('Mail configuration has been updated!');
        $this->info('Please update the MAIL_PASSWORD in .env with your Gmail App Password.');

        return 0;
    }
}
