<?php

namespace Database\Seeders;
use App\Models\pemilik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pemiliks')->insert([
            'pemilik_name'=>'Putra',
            'tempat_lahir'=> 'Jakarta'
          
        ]);
        
        DB::table('pemiliks')->insert([
            'pemilik_name'=>'Arhan',
            'tempat_lahir'=> 'Sulawesi'
          
        ]);
        pemilik::factory()->make();
    }
}
