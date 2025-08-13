<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrcidAccess extends Model
{
    protected $table = 'orcid_access';

    protected $fillable = [
        'name', 'orcid_id', 'scopes', 'access_token', 'id_token', 'refresh_token',
    ];
    protected $casts = [
    'scopes'        => 'array',
    ];
}

