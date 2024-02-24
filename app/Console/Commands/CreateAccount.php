<?php

namespace App\Console\Commands;

use App\Http\Controllers\AccountController;
use App\Services\AccountService;
use Illuminate\Console\Command;

class CreateAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria uma nova conta';

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
        $data = ['name' => 'account_'.rand(1, 1000000)];
        $accountService = new AccountService();
        $account = $accountService->createAccount($data);
        $this->info("Account created: {$account->name}");
    }
}
