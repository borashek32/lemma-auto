<?php

namespace App\Console\Commands;

use App\Components\ImportAutopartsClient;
use Illuminate\Console\Command;

class ImportAutopartsCommand extends Command
{
    protected $signature = 'import:autoparts';

    protected $description = 'Get data from autopart sites';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $import = new ImportAutopartsClient();
        $response = $import->client->request('GET', 'hsprice', [
            'decode_content' => false
        ]);
        dd($response->getBody());
    }
}
