<?php

namespace App\Console;

use App\Models\Event;
use App\Models\Notice;
use App\Models\Reserve;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    // protected function schedule(Schedule $schedule)
    // {
    //     $schedule->call(function () {
    //         Log::info('毎分ログ出力テスト - closure');
    //     })->everyMinute();
    // }

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            Log::info('testbatch');

            $message = config('message.yesterday_message');
            $content = config('message.yesterday_content');

            $carbon = new Carbon();
            $carbon = $carbon->addDays(1);

            $ids = Reserve::where('step',2)->pluck('id');

           for($i = 0; $i<count($ids); $i++){

                $reserve = Reserve::find($ids[$i]);

                $event = Event::find($reserve->event_id);

                if($event->datetime <= $carbon){

                    Notice::create([
                        'from_user_id' => $event->user_id,
                        'to_user_id' => $reserve->user_id,
                        'message' => $message,
                        'content' => $content,
                        'check' => 0,
                        'event_id' => $event->id,
                    ]);
                }
           }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
