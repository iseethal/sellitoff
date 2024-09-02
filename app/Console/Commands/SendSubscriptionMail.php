<?php

namespace App\Console\Commands;

use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use App\Models\Subscription;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionExpiredMail;
use PHPUnit\TextUI\Configuration\Php;

class SendSubscriptionMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-subscription-mail';

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
        $today      = Carbon::now()->format('Y-m-d');
        $expiredARR = array();

        $user_subscriptions  = UserSubscription::select('id','end_date')->get();
        foreach ($user_subscriptions as  $value) {

            $enddate        = $value->end_date;
            $parse_end_date = Carbon::parse($enddate);
            $var            =  $parse_end_date->subDay()->format('Y-m-d');
            $var1           = strtotime($var);

            if($today == $var){
                array_push($expiredARR, $value->id);
            }
        }

        if ($expiredARR != null) {
            foreach ($expiredARR as $value) {
              $id      = $value;
              $user_id = UserSubscription::where('id',$id)->pluck('user_id')->first();
              $email   = User::where('id',$user_id)->pluck('email')->first();
              $name    = User::where('id',$user_id)->pluck('name')->first();

              Mail::to($email)->send(new SubscriptionExpiredMail($name));

            }

          }
    }
}
