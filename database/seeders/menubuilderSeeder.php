<?php

namespace Database\Seeders;

use App\Models\Menubuilder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class menubuilderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menubuilder::insert([
            'nav_item_name' => "Dashboard",
            'nav_item_link' => "dashboard",
            'nav_item_id' => "dashboard",
        ]);
    }
}
