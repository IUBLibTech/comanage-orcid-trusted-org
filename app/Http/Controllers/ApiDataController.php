<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessToken;
use Illuminate\Support\Facades\Http;

class ApiDataController extends Controller {
    // fetch ORCID ID
        public function show() {

                $username = env('BASIC_AUTH_USER');
                $password = env('BASIC_AUTH_PASS');
                $currentUser = env('USERNAME');

        $credentials = base64_encode("{$username}:{$password}");

        $commonHeaders = [
            'Authorization' => "Basic {$credentials}",
            'Cache-Control' => 'no-cache',
            'Accept'        => 'application/json',
        ];

        $response = Http::withHeaders($commonHeaders)
            ->get("https://unt.identity.iu.edu/registry/api/co/3/core/v1/people/{$currentUser}");

        $data = $response->json(); 

        $userData = null;
        foreach ($data['OrgIdentity'] as $org) {
            if (($org['meta']['actor_identifier'] ?? '') === $currentUser) {
        
                foreach ($org['Identifier'] as $id) {
                    if (($id['type'] ?? '') === 'orcid') {
                    $userData = $id['identifier'];
                    break 2; 
            }
        }
    }
}

   if (is_null($userData)) {
            abort(404, 'No ORCID found for user2');
        }

	// pause 	
    	usleep(250_000);

    // fetch ORCID token 
        $getToken = Http::withHeaders($commonHeaders)
            ->get('https://unt.identity.iu.edu/registry/orcid_source/orcid_tokens/token.json', [
                'orcid' => $userData,
                'coid'  => 3,
            ]);

      	$tokenData = $getToken->successful() ? $getToken->json() : ['error' => 'API returned: ' . $getToken->status()];
/*
        $validated = $request->validate([
            'orcid_id'      => 'required|string|size:19|unique:orcid_tokens,orcid_id',
            'scopes'        => 'nullable|string',
            'access_token'  => 'required|string',
            'id_token'      => 'required|string',
            'refresh_token' => 'required|string',
        ]);

        $token = AccessToken::create($validated);
 */
        // Use orcid_id to make an API request
/*        $orcidId = $token->orcid_id;
        $accessToken = $token->access_token;

        $orcidProfile = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$accessToken}",
        ])->get("https://api.sandbox.orcid.org/v3.0/{$orcidId}/summary");

        if ($orcidProfile->successful()) {
            return orcidProfile()->json([
                'message' => 'Token saved and ORCID data retrieved.',
                'orcidProfile' => $response->json(),
            ]);
        }
 */
        // sends data to view template 'comanage.blade.php'
        return view('comanage', compact('userData', 'tokenData'));
    }
}
