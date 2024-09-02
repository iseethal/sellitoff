<?php

namespace App\Console;

use App\Models\Cart;
use App\Models\User;
use App\Mail\SubscribeMail;
use Illuminate\Support\Carbon;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionExpiredMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        Commands\SendSubscriptionMail::class,
    ];


    protected function schedule(Schedule $schedule,)
    {

        $today      = Carbon::now()->format('Y-m-d');
        $expiredARR = array();

        $user_subscriptions  = UserSubscription::select('id', 'end_date')->get();
        foreach ($user_subscriptions as  $value) {

            $enddate        = $value->end_date;
            $parse_end_date = Carbon::parse($enddate);
            $var            =  $parse_end_date->subDay()->format('Y-m-d');
            $var1           = strtotime($var);

            if ($today == $var) {
                array_push($expiredARR, $value->id);
            }
        }

        if ($expiredARR != null) {
            $time = "16:02";
        }

        $schedule->command('app:send-subscription-mail')
            ->timezone('Asia/Kolkata')
            ->at($time);
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
