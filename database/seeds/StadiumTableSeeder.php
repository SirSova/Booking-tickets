<?php

use Illuminate\Database\Seeder;
use App\Stadium;
use \Illuminate\Support\Facades\DB;

class StadiumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Stadium::count() == 0) {
            $stadium = Stadium::create([
                'name'           => 'default stadium',
                'owner_id'       => 1,
            ]);

            $sector = \App\Sector::create([
                'name'           => 'default sector',
                'stadium_id'     => $stadium->id,
            ]);

            $rows = [];
            for ($i = 0; $i < 10; $i++) {
                $row = [];
                $row['number'] = $i + 1;
                $row['sector_id'] = $sector->id;
                $row['created_at'] = $sector->created_at;
                $row['updated_at'] = $sector->updated_at;
                $rows[] = $row;
            }
            DB::table('rows')->insert($rows);

            $rows = $sector->rows()->get();

            $places = [];
            foreach ($rows as $row)
                for ($i = 0; $i < 10; $i++) {
                    $place = [];
                    $place['row_id'] = $row->id;
                    $place['price'] = 150;
                    $place['created_at'] = $row->created_at;
                    $place['updated_at'] = $row->updated_at;
                    $places[] = $place;
                }

            DB::table('places')->insert($places);
        }
    }
}
