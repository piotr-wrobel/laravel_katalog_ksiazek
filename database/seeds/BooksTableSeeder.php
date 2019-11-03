<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<10; $i++) {
            $title = $faker->sentence(3);
            $author = random_int(1,10);
            $publication_date = $faker->dateTimeBetween('-20y years','-1 year');
            $translations = random_int(1,3);
            for($j = 0; $j < $translations; $j++) {
                $book = new Book();
                $book->title = $title;
                $book->author = $author;
                $book->publication_date = $publication_date;
                $book->translation = $faker->country;
                $book->save();
            }
        }
    }
}
