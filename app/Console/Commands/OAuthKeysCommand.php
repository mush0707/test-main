<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OAuthKeysCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:o-auth-keys-command';

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
        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'PASSPORT_PRIVATE_KEY=', 'PASSPORT_PRIVATE_KEY="'.file_get_contents(storage_path('oauth-private.key')).'"', file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'PASSPORT_PUBLIC_KEY=', 'PASSPORT_PUBLIC_KEY="'.file_get_contents(storage_path('oauth-public.key')).'"', file_get_contents($path)
            ));
        }
    }
}
