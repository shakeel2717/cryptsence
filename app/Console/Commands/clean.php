<?php

namespace App\Console\Commands;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');


        // Create a new user

        $user = new User();
        $user->name = "Shakeel Ahmad";
        $user->username = "shakeel2717";
        $user->email = "shakeel2717@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();

        // create new package
        $plan = new Plan();
        $plan->name = "Basic";
        $plan->price = 50;
        $plan->profit = 250;
        $plan->duration = 24;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Pro";
        $plan->price = 200;
        $plan->profit = 250;
        $plan->duration = 24;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Premium";
        $plan->price = 500;
        $plan->profit = 250;
        $plan->duration = 24;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Ultimate";
        $plan->price = 1000;
        $plan->profit = 300;
        $plan->duration = 24;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Custom 1";
        $plan->price = 3000;
        $plan->profit = 300;
        $plan->duration = 22;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Custom 2";
        $plan->price = 6000;
        $plan->profit = 350;
        $plan->duration = 22;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Custom 3";
        $plan->price = 10000;
        $plan->profit = 350;
        $plan->duration = 22;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Custom 4";
        $plan->price = 15000;
        $plan->profit = 380;
        $plan->duration = 20;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Custom 5";
        $plan->price = 25000;
        $plan->profit = 380;
        $plan->duration = 18;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Custom 6";
        $plan->price = 50000;
        $plan->profit = 390;
        $plan->duration = 17;
        $plan->save();


        return 0;
    }
}
