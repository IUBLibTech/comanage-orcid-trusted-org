<?php

namespace App\Http\Controllers;

use App\Models\OrcidAccess;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OrcidApiController extends Controller
{
    public function fetchByOrcid($orcid)
    {

class OrcidController extends Controller
{
    public function fetchByOrcid(string $orcid)
    {
        // Get ORCID from session 
        $orcidId = session('orcid');

        if (!$orcidId) {
            return redirect()->back()->withErrors('ORCID not found in session.');
        }

        // Find the matching ORCID record
        $record = OrcidAccess::where('orcid', $orcidId)->first(); // adjust column if needed

        if (!$record) {
            return view('orcid', [
                'data'     => null,
                'error'    => 'ORCID record not found.',
                'code'     => 404,
                'message'  => 'The requested ORCID record could not be found.',
                'raw_json' => json_encode(['error' => 'ORCID record not found.', 'status' => 404], JSON_PRETTY_PRINT),
            ]);
        }

        // Get access token from the matched record
        $accessToken = $record->access_token;

        if (empty($accessToken)) {
            return view('orcid', [
                'status'   => 'error',
                'orcid'    => $orcidId,
                'data'     => null,
                'error'    => 'Missing access token for Bearer authentication.',
                'code'     => 401,
                'message'  => 'Access token is required to call the ORCID API.',
                'raw_json' => json_encode(['error' => 'Missing access token', 'status' => 401], JSON_PRETTY_PRINT),
            ]);
        }

        // Call ORCID API using Bearer token
        $response = Http::withToken($accessToken)
            ->accept('application/json')
            ->get("https://api.sandbox.orcid.org/v3.0/{$accessToken}/summary");

        if ($response->failed()) {
            return view('orcid', [
                'status'     => 'error',
                'error'      => 'Failed to fetch data from ORCID API.',
                'code'       => $response->status(),
                'message'    => $response->body(),
                'orcid'      => $orcid ?? null,
                'data'       => null,
                'raw_json'   => json_encode([
                    'error'   => 'Failed to fetch data from ORCID API.',
                    'status'  => $response->status(),
                    'message' => $response->body()
                ], JSON_PRETTY_PRINT)
            ]);
        }

                return view('orcid', [
                    'status'   => 'success',
                    'orcid'    => $orcid,
                    'data'     => $response->json(),
                    'error'    => null,
                    'code'     => null,
                    'message'  => null,
                    'raw_json' => json_encode($response->json(), JSON_PRETTY_PRINT)
                ]);
    }
}
