<?php

use App\General;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $general = new General();
        $general->social_links = '{"Facebook":"facebook","Twitter":"twitter","Instagram":"instagram","Linkedin":"linkedin"}';
        $general->logo = "324.jpg";
        $general->save();
    }
}
