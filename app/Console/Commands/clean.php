<?php

namespace App\Console\Commands;

use App\Models\Affiliate;
use App\Models\passive;
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

        $user = new User();
        $user->name = "Dawood Ali";
        $user->username = "dawood2717";
        $user->refer = "shakeel2717";
        $user->email = "dawood2717@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();

        $user = new User();
        $user->name = "Farooq Ail";
        $user->username = "farooq2717";
        $user->refer = "dawood2717";
        $user->email = "farooq2717@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();


        $user = new User();
        $user->name = "Raheel Ali";
        $user->username = "raheel2717";
        $user->refer = "farooq2717";
        $user->email = "raheel2717@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();

        $user = new User();
        $user->name = "Nabeel Ali";
        $user->username = "nabeel2717";
        $user->refer = "raheel2717";
        $user->email = "nabeel2717@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();

        $user = new User();
        $user->name = "Awais Ali";
        $user->username = "awaisl2717";
        $user->refer = "nabeel2717";
        $user->email = "awais2717@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();

        $user = new User();
        $user->name = "Ali Raza";
        $user->username = "ali2717";
        $user->refer = "awaisl2717";
        $user->email = "ali2717@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();

        $user = new User();
        $user->name = "Ahmad Raza";
        $user->username = "ahmad2717";
        $user->refer = "ali2717";
        $user->email = "ahmad@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();

        $user = new User();
        $user->name = "Nawz Ali";
        $user->username = "nawaz2717";
        $user->refer = "ahmad2717";
        $user->email = "nawaz@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();



        $user = new User();
        $user->name = "User 1";
        $user->username = "user1";
        $user->refer = "default";
        $user->email = "user1@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();


        $user = new User();
        $user->name = "User 2";
        $user->username = "user2";
        $user->refer = "user1";
        $user->email = "user2@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();

        $user = new User();
        $user->name = "User 3";
        $user->username = "user3";
        $user->refer = "user2";
        $user->email = "user3@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();


        $user = new User();
        $user->name = "User 4";
        $user->username = "user4";
        $user->refer = "user3";
        $user->email = "user4@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();


        $user = new User();
        $user->name = "User 5";
        $user->username = "user5";
        $user->refer = "user4";
        $user->email = "user5@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();


        $user = new User();
        $user->name = "User 6";
        $user->username = "user6";
        $user->refer = "user5";
        $user->email = "user6@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->save();


        $user = new User();
        $user->name = "User 7";
        $user->username = "user7";
        $user->refer = "user6";
        $user->email = "user7@gmail.com";
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

        // inserting refer commision detail in database
        $affiliate = new Affiliate();
        $affiliate->level = "Direct";
        $affiliate->value = 10;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 1";
        $affiliate->value = 5;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 2";
        $affiliate->value = 4;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 3";
        $affiliate->value = 2;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 4";
        $affiliate->value = 2;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 5";
        $affiliate->value = 1;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 6";
        $affiliate->value = 1;
        $affiliate->save();


        $passive = new passive();
        $passive->level = "Direct";
        $passive->value = 5;
        $passive->save();

        $passive = new passive();
        $passive->level = "Level 1";
        $passive->value = 3;
        $passive->save();


        $passive = new passive();
        $passive->level = "Level 2";
        $passive->value = 2;
        $passive->save();


        return 0;
    }
}
