<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use App\Models\OrcidAccess;

class ApiDataController extends Controller {

    // get ORCID ID

        public function show() {
                
            $username = env('BASIC_AUTH_USER');
            $password = env('BASIC_AUTH_PASS');
            $currentUser = env('IU_USER');

            $credentials = base64_encode("$username:$password");

        $commonHeaders = [
            'Authorization' => "Basic {$credentials}",
            'Cache-Control' => 'no-cache',
            'Accept'        => 'application/json',
        ];

        $response = Http::withHeaders($commonHeaders)
            ->get("https://unt.identity.iu.edu/registry/api/co/3/core/v1/people/{$currentUser}");

        // debug response
        // dump($getOrcid);

        $data = $response->json(); 

        $userData = null;
        foreach ($data['OrgIdentity'] as $org) {
            if (($org['meta']['actor_identifier'] ?? '') === 'rshiggin') {
        
                foreach ($org['Identifier'] as $id) {
                    if (($id['type'] ?? '') === 'orcid') {
                    $userData = $id['identifier'];
                    break 2; 
            }
        }
    }
}

        // fetch ORCID token 
        $getToken = Http::withHeaders($commonHeaders)
            ->get('https://unt.identity.iu.edu/registry/orcid_source/orcid_tokens/token.json', [
                'orcid' => $userData,
                'coid'  => 3,
            ]);

        // debug response
           dump($getToken);

    try {
        $result = $getToken->json(); 
        $items  = is_string($result) ? json_decode($result, true) : $result;

        $saved = 0;
        foreach ($items as $item) {
         if (!is_array($item)) continue;
                $orcid = $item['orcid_id'] ?? $item['orcid'] ?? null;
         if (!$orcid) continue;

            OrcidAccess::updateOrCreate(
                [
		            'orcid_id' => $item['orcid_id'],
                    'scopes'        => isset($item['scopes']) && is_array($item['scopes'])
                                        ? $item['scopes']
                                        : (isset($item['scope'])
                                            ? (is_array($item['scope']) ? $item['scope'] : preg_split('/\s+/', trim((string)$item['scope']), -1, PREG_SPLIT_NO_EMPTY))
                                            : null),
                    'access_token'  => $item['access_token']  ?? null,
                    'id_token'      => $item['id_token']      ?? null,
                    'refresh_token' => $item['refresh_token'] ?? null,
                ]
            );
            $saved++;
        }

        return view('comanage', [
            'saved'  => $saved,
            'error'  => null,
            'items'  => $items, // optional: for showing what was processed
        ]);
    } catch (\Throwable $e) {
        report($e);

        return response()->view('comanage', [
            'saved' => 0,
            'error' => 'Failed to save ORCID data: '.$e->getMessage(),
            'items' => [],
        ], 500);
    	}
    }
}
