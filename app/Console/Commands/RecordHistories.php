<?php

namespace App\Console\Commands;

use App\Enums\State;
use App\Models\History;
use App\Models\Message;
use App\Models\PreProduct;
use App\Models\RemoteLog;
use App\Models\StatusHistory;
use App\Models\SystemLog;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RecordHistories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'record:histories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '로그데이터 수집';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        History::record();

        History::recordPing();

        Message::record();

        StatusHistory::record();

        SystemLog::store();

        RemoteLog::store();
    }
}
