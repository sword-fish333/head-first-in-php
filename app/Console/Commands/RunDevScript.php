<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunDevScript extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:dev-script';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tests & play around';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pw = 'benchmark-test';
        $start = microtime(true);
        for ($i=0; $i<100; $i++) {
            password_hash($pw, PASSWORD_BCRYPT, ['cost'=>10]);
        }
        $elapsed = microtime(true) - $start;
        echo "100 bcrypt cost10 took $elapsed seconds\n";
        dd(1);
        $string='hello world';
        dd(sha1($string,true),md5($string),bcrypt($string));
    }
}
