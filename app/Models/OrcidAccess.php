<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrcidAccess extends Model
{
    protected $table = 'orcid_access';

    protected $fillable = [
        'name',
        'orcid',
        'scopes',
        'access_token',
        'id_token',
        'refresh_token',
        'payload',
    ];

    protected $casts = [
        'scopes'  => 'array',
        'payload' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
