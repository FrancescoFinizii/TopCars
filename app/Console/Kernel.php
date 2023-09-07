<?php

namespace App\Console;

use App\Models\FAQ;
use App\Models\Noleggio;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Noleggio::where('dataConsegna', '<=', Carbon::today()->format("Y-m-d"))->update(['attivo' => false]);
            FAQ::create([
                "domanda" => "cc",
                "risposta" => "cc",
                "tipologia" => "cc",
            ]);
        })->everyMinute();
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
