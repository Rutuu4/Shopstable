<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themecolors', function (Blueprint $table) {
            $table->id();
            $table->string('page_id');
            $table->string('theme_color')->nullable();
            $table->string('header_size')->nullable();
            $table->string('lable_size')->nullable();
            $table->string('paragraph_size')->nullable();
            $table->string('flag');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // create globle theme color
        DB::table('themecolors')->insert([
            'page_id' => 'globle',
            'theme_color' => '',
            'header_size' => '1.5',
            'lable_size' => '1.5',
            'paragraph_size' => '1.5',
            'flag' => 'globle',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themecolors');
    }
};
