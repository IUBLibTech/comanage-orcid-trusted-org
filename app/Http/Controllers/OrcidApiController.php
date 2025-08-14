namespace App\Http\Controllers;
// Route::get('/orcid/view/{orcid}', [OrcidApiController::class, 'showOrcidData']);
/* 
 @section('content')
    <h1>ORCID Data for {{ $orcid }}</h1>

    @if(isset($error))
        <div class="alert alert-danger">{{ $error }}</div>
        @if(isset($status))
            <p>Status: {{ $status }}</p>
            <pre>{{ $message ?? '' }}</pre>
        @endif
    @elseif(isset($data))
        <div class="card">
            <div class="card-body">
                <h5>Raw ORCID API Data</h5>
                <pre>{{ json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
            </div>
        </div>
    @else
        <p>No data available.</p>
    @endif
    @endsection
    */
use App\Models\UserOrcid;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OrcidApiController extends Controller
{
    public function fetchFromOrcidApi($id)
    {
        // Fetch the ORCID record from the DB
        $userOrcid = UserOrcid::where('orcid', '0009-0007-3710-796X')->first();

         if (!$userOrcid) {
            return view('orcid')->with([
                'orcid' => $orcid,
                'error' => 'ORCID record not found.',
            ]);
        }

	$orcid = $userOrcid->orcid;
        $accessToken = $userOrcid->access_token;

        if (empty($accessToken)) {
            return view('orcid')->with([
                'orcid' => $orcid,
                'error' => 'Missing access token.',
            ]);
        }

        // Call the API
        $response = Http::accept('application/json')
            ->get("https://api.sandbox.orcid.org/v3.0/{$orcid}");

        if ($response->failed()) {
            return response()->json([
                'error' => 'Failed to fetch data from ORCID API.',
                'status' => $response->status(),
                'message' => $response->body()
            ], $response->status());
        }

          // Pass ORCID and API data to the view
        return view('orcid')->with([
            'orcid' => $orcid,
	    'data' => $response->json()
	}];
    }
}
