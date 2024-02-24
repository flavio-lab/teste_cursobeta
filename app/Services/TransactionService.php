<?php

namespace App\Services;

use App\Models\Accounts;
use App\Models\Transactions;

class TransactionService
{
    private AccountService $accountService;
    public function __construct()
    {
        $this->accountService = new AccountService();
    }

    public function createTransaction(array $data)
    {
        $accountFrom = $this->accountService->getAccount($data['account_from']);
        $accountTo = $this->accountService->getAccount($data['account_to']);

        if (! $accountFrom || ! $accountTo) {
            throw new \Exception('Account not found');
        }

        if ($accountFrom->amount < $data['amount']) {
            throw new \Exception('Not enough balance');
        }

        $authorize = AuthorizationService::authorize($accountFrom->id, $accountTo->id, $data['amount']);

        if (! $authorize['authorized']) {
            throw new \Exception('Unauthorized transaction');
        }

        $this->accountService->updateAmount($accountFrom, $data['amount'], 'sub');
        $this->accountService->updateAmount($accountTo, $data['amount'], 'add');

        return Transactions::create([
            'account_id_from' => $accountFrom->id,
            'account_id_to' => $accountTo->id,
            'amount' => $data['amount'],
        ]);
    }
}
