<?php

namespace App\Services;

use App\Models\OrcidToken;
use Illuminate\Support\Facades\Http;

class OrcidService
{
    public function storeAndRequest(array $data): array
    {
        $token = OrcidToken::create($data);

        $resp = Http::withToken($token->access_token)
            ->acceptJson()
            ->get("https://pub.orcid.org/v3.0/{$token->orcid_id}/summary");

        return [
            'token'   => $token,
            'profile' => $resp->successful() ? $resp->json() : null,
            'status'  => $resp->status(),
        ];
    }
}
