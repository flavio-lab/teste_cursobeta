<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AuthorizationService
{
    public function __construct()
    {
    }

    public static function authorize(int $sender, int $receiver, int $amount)
    {
        $url = "https://eo9ggxnfribmy6a.m.pipedream.net/beta-authorizer";
        $token = base64_encode("flavio.b2u@gmail.com");

        return Http::withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->post($url, [
            'sender' => $sender,
            'receiver' => $receiver,
            'amount' => $amount
        ])->json();
    }
}
