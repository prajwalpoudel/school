<?php

namespace App\Console\Commands;

use App\Entities\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Users separated by roles';

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
        $noOfUser = (integer)$this->ask('How many user account do you want to create?');

        DB::beginTransaction();
            factory(User::class, $noOfUser)->create();
        DB::commit();
    }
}
