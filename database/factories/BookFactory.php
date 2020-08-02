<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    $random = rand(1,200);
    $cover = "https://picsum.photos/id/{$random}/200/300";
    $title = $faker->sentence(10);
    return [
        'title' => \Str::title($title),
        'slug' => \Str::slug($title),
        'description' => $faker->sentence(200),
        'qty' => rand(1,200),
        'cover' => $cover,
        'author_id' => Author::inRandomOrder()->first()->id,
    ];
});
