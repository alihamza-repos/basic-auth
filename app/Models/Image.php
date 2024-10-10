<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Image extends Model
{
    public function up()
{
    Schema::create('images', function (Blueprint $table) {
        $table->id();
        $table->string('url');
        $table->timestamps();
    });
}

}
