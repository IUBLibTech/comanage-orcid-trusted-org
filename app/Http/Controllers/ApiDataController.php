<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessToken;
use Illuminate\Support\Facades\Http;

class ApiDataController extends Controller {
	    protected string $username;
        protected string $password;
        protected string $currentUser;
        protected string $credentials;
        protected $orcid;

    public function __construct()
    {
        $this->username = env('BASIC_AUTH_USER');
        $this->password = env('BASIC_AUTH_PASS');
        $this->currentUser = env('IU_USER');

        $this->credentials = base64_encode("{$this->username}:{$this->password}");
    }
    	
    public function handle(Request $request)
{
        // validate the five ORCID‐token fields
            $data = $request->validate([
                'orcid_id'      => 'required|string|size:19|unique:orcid_tokens,orcid_id',
                'scopes'        => 'nullable|string',
                'access_token'  => 'required|string',
                'id_token'      => 'required|string',
                'refresh_token' => 'required|string',
            ]);

        // save them
        AccessToken::create($data);

        // fetch the ORCID ID from IU registry
        $orcidId = $this->getOrcidId();

        // fetch and return the ORCID profile
        return view('comanage', compact('orcidID'));
}
         
            protected function getOrcidId() {
                	$commonHeaders = [
            		'Authorization' => 'Basic ' . $this->credentials,
            		'Cache-Control' => 'no-cache',
            		'Accept'        => 'application/json',
        	        ];


                    $response = Http::withHeaders($commonHeaders)
                    ->get("https://unt.identity.iu.edu/registry/api/co/3/core/v1/people/{$currentUser}");
            
                    $this->codata = $response->json(); 

                    $orcidId = null;
                    foreach ($codata['OrgIdentity'] as $org) {
                        if (($org['meta']['actor_identifier'] ?? '') === $currentUser) {
        
                        foreach ($org['Identifier'] as $id) {
                        if (($id['type'] ?? '') === 'orcid') {
                        $orcidId = $id['identifier'];
                        break 2; 
                            }
                        }
                    }
                }
                $this->orcid = orcidId();
                return $this->getOrcidProfile();
            }

            protected function getOrcidProfile() 
            {
                	$commonHeaders = [
            		'Authorization' => 'Basic ' . $this->credentials,
            		'Cache-Control' => 'no-cache',
            		'Accept'        => 'application/json',
        	        ];
                    
                $getToken = Http::withHeaders($commonHeaders)
                ->get('https://unt.identity.iu.edu/registry/orcid_source/orcid_tokens/token.json', [
                'orcid' => $orcidId,
                'coid'  => 3,
                ]);

                $storeData = $request->validate([
                'orcid_id'      => 'required|string|size:19|unique:orcid_tokens,orcid_id',
                'scopes'        => 'nullable|string',
                'access_token'  => 'required|string',
                'id_token'      => 'required|string',
                'refresh_token' => 'required|string',
                ]);

                $token = AccessToken::create($storeData);
 
                $identifier = $token->orcid_id;
                $accessToken = $token->access_token;

                $orcidProfile = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => "Bearer {$accessToken}",
                ])->get("https://api.sandbox.orcid.org/v3.0/{$identifier}/summary");

                if ($orcidProfile->successful()) {
                return $orcidProfile()->json([
                'message' => 'Token saved and ORCID data retrieved.',
                'orcidProfile' => $response->json(),
            ]);
        }
            $this->orcid = orcidProfile();
            return $this->getRecord();
    }
}

