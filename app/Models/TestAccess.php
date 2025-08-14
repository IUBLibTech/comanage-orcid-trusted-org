<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAccess extends Model
{
    protected $table = 'test_access'; // important: table is singular

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
