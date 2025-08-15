<?php

namespace App\Http\Controllers;

use App\Models\OrcidAccess;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ComanageApiController extends Controller
{
    /**
     * Fetch records from comanage registry and save to DB.
     * Idempotent: upserts by 'orcid'.
     */
    public function getAccessToken(Request $request)
    {
            $username = env('BASIC_AUTH_USER');
            $password = env('BASIC_AUTH_PASS');
            // finish session user passthrough
            // $cas_auth     = $currentUser ?? 'alanturing';

            $credentials = base64_encode("$username:$password");

        $commonHeaders = [
            'Authorization' => "Basic {$credentials}",
            'Cache-Control' => 'no-cache',
            'Accept'        => 'application/json',
        ];

            $getToken = Http::withHeaders($commonHeaders)
            ->get('https://unt.identity.iu.edu/registry/orcid_source/orcid_tokens/token.json', [
                'orcid' => '0009-0007-3710-796X',
                'coid'  => 3,
            ]);

        $decoded_data = json_decode($getToken, true);

        // Strip everything except 'OrcidTokens'
        $decoded =  $decoded_data['OrcidTokens'];

        // Accept either an array of rows or an object with 'data'
        $rows = [];
        if (is_array($decoded)) {
            $rows = array_is_list($decoded) ? $decoded : ($decoded['data'] ?? []);
        }

        if (empty($rows)) {
            return response()->json(['error' => 'No rows found in JSON file'], 422);
        }

        $ok = 0;
        $errors = [];

	// pass data to view
	$savedRecords = [];

        foreach ($rows as $index => $row) {
            // Normalize inputs
            $row = is_array($row) ? $row : [];
            $row['orcid']   = $row['orcid'] ?? $row['orcid'] ?? null;
            $row['name']    = $row['name'] ?? ($row['name'] ?? null);
            $row['scopes']  = $this->normalizeJsonish($row['scopes'] ?? null);
            $row['payload'] = $this->normalizeJsonish($row['payload'] ?? null);

            try {
                $validated = Validator::make($row, [
                    'name'          => ['nullable', 'string', 'max:255'],
                    'orcid'         => ['required', 'string', 'size:19'],
                    'scopes'        => ['nullable', 'array'],
                    'access_token'  => ['required', 'string'],
                    'id_token'      => ['nullable', 'string'],
                    'refresh_token' => ['nullable', 'string'],
                    'payload'       => ['nullable', 'array'],
                ])->validate();

                $saved = OrcidAccess::updateOrCreate(
                    ['orcid' => $validated['orcid']],
                    [
                        // change harcoded name value to "cas_auth" variable
                        'name' => $validated['name'] ?? 'alanturing',
                        'scopes'        => $validated['scopes'] ?? null,
                        'access_token'  => $validated['access_token'],
                        'id_token'      => $validated['id_token'] ?? null,
                        'refresh_token' => $validated['refresh_token'] ?? null,
                        'payload'       => $validated['payload'] ?? null,
                    ]
                );

	    	    $savedRecords[] = $saved;
                $ok++;
	    } 
	    catch (\Throwable $e) {
            $errors[] = [
                'row' => $index,
                'orcid' => $row['orcid'] ?? null,
                'error' => $e->getMessage(),
            ];
        }
    }

    	return view('comanage', [
    		'status'       => count($errors) === 0 ? 'success' : 'error',
    		'message'      => "$ok record(s) inserted or updated.",
    		'savedRecords' => $savedRecords,
    		'errors'       => $errors,
	]);
}
    /**
     * Accept array/object or JSON string; return array|null.
     */
    private function normalizeJsonish($value): ?array
    {
        if (is_null($value)) return null;
        if (is_array($value)) return $value;
        if (is_object($value)) return json_decode(json_encode($value), true);

        if (is_string($value)) {
            // Try JSON string first
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return is_array($decoded) ? $decoded : null;
            }
            // As a fallback for scopes sent as space/comma separated strings
            $parts = array_values(array_filter(array_map('trim', preg_split('/[\s,]+/', $value))));
            return $parts ?: null;
        }

        return null;
    }
}
