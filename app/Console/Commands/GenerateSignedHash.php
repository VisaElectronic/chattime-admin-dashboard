<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateSignedHash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-signed-hash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $secretKey = config('app.request_secret');
        $requestBody = (object) [
            "email" => "testing@test.com"
        ];
        $expectedHash = hash_hmac('sha256', json_encode($requestBody), $secretKey);
        $this->info("Generated hash:");
        $this->line($expectedHash);
    }
}
