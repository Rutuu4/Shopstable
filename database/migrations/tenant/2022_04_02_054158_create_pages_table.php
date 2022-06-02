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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('pageData')->nullable();
            $table->boolean('is_publish')->default(0);
            $table->text('publish_data')->nullable();
            $table->text('category_data')->nullable();
            $table->text('assets')->nullable();
            $table->text('components')->nullable();
            $table->text('html')->nullable();
            $table->text('css')->nullable();
            $table->text('styles')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
        // create globle page
        DB::table('pages')->insert([
            'name' => 'Home',
            'pageData' => '',
            'is_publish' => 1,
            'publish_data' => '',
            'category_data' => '',
            'assets' => '',
            'components' => '',
            'html' => '',
            'css' => '',
            'styles' => '',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
