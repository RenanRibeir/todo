<?php

namespace App\Console\Commands;

use App\Jobs\CleanCompleteTasks;
use Illuminate\Console\Command;

class SchenduleCleanCompleteTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:schendule-clean-complete-tasks';

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
        CleanCompleteTasks::dispatch();
    }
}
