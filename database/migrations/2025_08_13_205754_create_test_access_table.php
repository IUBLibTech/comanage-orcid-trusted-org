<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_access', function (Blueprint $table) {
            $table->bigIncrements('id');               // bigint unsigned, auto-increment
            $table->string('name', 255)->nullable();   // nullable name (will map from cas_auth)
            $table->char('orcid', 19)->unique();       // e.g. 0000-0000-0000-0000
            $table->json('scopes')->nullable();        // JSON
            $table->text('access_token');              // token (required)
            $table->text('id_token')->nullable();      // optional
            $table->text('refresh_token')->nullable(); // optional
            $table->json('payload')->nullable();       // JSON payload
            $table->timestamps();                      // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_access');
    }
};
