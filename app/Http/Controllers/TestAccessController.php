<?php

namespace App\Http\Controllers;

use App\Models\TestAccess;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TestAccessController extends Controller
{
    /**
     * Import records from storage/app/test_access.json and save to DB.
     * Idempotent: upserts by 'orcid'.
     */
    public function importFromFile(Request $request): JsonResponse
    {
        $path = 'test_access.json';

        if (!Storage::disk('local')->exists($path)) {
            return response()->json(['error' => "File not found: storage/app/{$path}"], 404);
        }

        $content = Storage::disk('local')->get($path);
        $decoded_data = json_decode($content, true);

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

        // $name = 'alanturing';

        foreach ($rows as $index => $row) {
            // Normalize inputs
            $row = is_array($row) ? $row : [];
            $row['orcid']   = $row['orcid'] ?? $row['orcid_id'] ?? null;
            $row['name']    = $row['name'] ?? ($row['alanturing'] ?? null);
            $row['scopes']  = $this->normalizeJsonish($row['scopes'] ?? null);
            $row['payload'] = $this->normalizeJsonish($row['payload'] ?? null);

            try {
                $validated = Validator::make($row, [
                    'name'          => ['nullable', 'string', 'max:255'],
                    'orcid'         => ['required', 'string', 'size:19', 'regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/'],
                    'scopes'        => ['nullable', 'array'],
                    'access_token'  => ['required', 'string'],
                    'id_token'      => ['nullable', 'string'],
                    'refresh_token' => ['nullable', 'string'],
                    'payload'       => ['nullable', 'array'],
                ])->validate();

                TestAccess::updateOrCreate(
                    ['orcid' => $validated['orcid']],
                    [
                        'name'          => $validated['name'] ?? null,
                        'scopes'        => $validated['scopes'] ?? null,
                        'access_token'  => $validated['access_token'],
                        'id_token'      => $validated['id_token'] ?? null,
                        'refresh_token' => $validated['refresh_token'] ?? null,
                        'payload'       => $validated['payload'] ?? null,
                    ]
                );

                $ok++;
            } catch (\Throwable $e) {
                $errors[] = [
                    'row' => $index,
                    'orcid' => $row['orcid'] ?? null,
                    'error' => $e->getMessage(),
                ];
            }
        }

        return response()->json([
            'inserted_or_updated' => $ok,
            'failed' => count($errors),
            'errors' => $errors,
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
