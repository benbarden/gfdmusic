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
        Schema::table('artists', function (Blueprint $table) {
            $table->string('contact_name', 255)->nullable()->after('store_bandcamp_link');
            $table->string('contact_email', 255)->nullable()->after('contact_name');
            $table->boolean('show_contact_info')->default(false)->after('contact_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->dropColumn(['contact_name', 'contact_email', 'show_contact_info']);
        });
    }
};
