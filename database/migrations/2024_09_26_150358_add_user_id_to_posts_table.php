<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Add a nullable foreign key column for user_id
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop the user_id column
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }

};
