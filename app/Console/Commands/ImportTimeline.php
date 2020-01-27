<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportTimeline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:timeline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the Timeline table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \DB::unprepared(file_get_contents('database/migrations/timelines.sql'));
    }
}
