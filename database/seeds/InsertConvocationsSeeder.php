<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InsertConvocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0;$i<=10;$i++){
           DB::table('convocations')->insert([ 
            'nom' => str_random(10), 
            'motif' => str_random(20), 
            'date_convocation' => Carbon::now()
           ]);
        }
    }
}
