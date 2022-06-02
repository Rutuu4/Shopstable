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
            $table->string('nav_item_order');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Menubuilder::insert([
            'nav_item_name' => "Home",
            'nav_item_link' => "http://{{ tenant('domain') }}/pageBuilderPreview/1",
            'nav_item_id' => "Home",
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
