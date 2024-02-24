<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id_from',
        'account_id_to',
        'amount'
    ];

    public function accountFrom()
    {
        return $this->belongsTo(Accounts::class, 'account_id_from');
    }

    public function accountTo()
    {
        return $this->belongsTo(Accounts::class, 'account_id_to');
    }
}
