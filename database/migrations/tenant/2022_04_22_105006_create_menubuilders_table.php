<?php

use App\Models\Menubuilder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('menubuilders', function (Blueprint $table) {
            $table->id();
            $table->string('nav_item_name');
            $table->text('nav_item_link');
            $table->string('nav_item_id');
            $table->timestamps();
        });

        Menubuilder::insert([
            'nav_item_name' => "Dashboard",
            'nav_item_link' => "dashboard",
            'nav_item_id' => "dashboard",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menubuilders');
    }
};
