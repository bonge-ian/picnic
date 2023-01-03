<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseQueueMonitorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:db-monitor';

    protected $description = 'Check if our database queue is still running';

    public function handle()
    {
        /**
         * Because we use a database queue, we check if the jobs table still contains any
         * old records. This means that the queue has been stalled.
         */
        $records = DB::table('jobs')->where('created_at', '<', Carbon::now()->subMinutes(5)->getTimestamp())->get();

        if (! $records->isEmpty()) {
            report('Queue jobs table should be emptied by now but it is not! Please check your queue worker.');

            $this->warn('Queue jobs table should be emptied by now but it is not! Please check your queue worker.');

            return;
        }

        $this->info('Queue jobs are looking good.');
    }
}
