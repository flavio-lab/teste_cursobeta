<?php

namespace App\Services;

use App\Models\Accounts;

class AccountService
{
    public function __construct()
    {
    }

    public function createAccount(array $data)
    {
        $accountExists = $this->checkAccount($data['name']);

        if ($accountExists) {
            return null;
        }

        return Accounts::create($data);
    }

    public function getAccount(string $name)
    {
        return Accounts::where('name', $name)->first();
    }

    public function checkAccount(string $name)
    {
        $account = $this->getAccount($name);
        return $account != null;
    }

    public function checkAmount(string $name, int $amount)
    {
        return Accounts::where('name', $name)->where('amount', '>=', $amount)->exists();
    }

    public function updateAmount(Accounts $account, int $amount, string $operation)
    {
        if ($operation === 'add') {
            $account->amount += $amount;
        } else {
            $account->amount -= $amount;
        }
        $account->save();
    }
}
