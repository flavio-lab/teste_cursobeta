<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private AccountService $accountService;

    public function __construct()
    {
        $this->accountService = new AccountService();
    }

    public function store()
    {
        $data = ['name' => 'account_'.rand(1, 1000000)];

        $account = $this->accountService->createAccount($data);

        if (! $account) {
            return response()->json(['message' => 'Account already exists'], 409);
        }

        return response()->json($account);
    }
}
