<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('comics');

        DB::table('comics')->truncate();

        foreach ($data as $comic_db) {
            $comic = new Comic();

            $comic->title = $comic_db['title'];
            $comic->description = $comic_db['description'];
            $comic->thumb = $comic_db['thumb'];
            $comic->price = $comic_db['price'];
            $comic->series = $comic_db['series'];
            $comic->sale_date = $comic_db['sale_date'];
            $comic->type = $comic_db['type'];
            $comic->artists = implode(', ', $comic_db['artists']);
            $comic->writers = implode(', ', $comic_db['writers']);

            $comic->save();
        }
    }
}
