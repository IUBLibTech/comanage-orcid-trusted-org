<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiDataController extends Controller {

    // fetch ORCID ID

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

        // debug response
        // dump($getToken);

        $tokenData = $getToken->successful() ? $getToken->json() : ['error' => 'API returned: ' . $getToken->status()];

        // sends data to view template 'comanage.blade.php'
        return view('comanage', compact('userData', 'tokenData'));
    }
}