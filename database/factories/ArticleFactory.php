<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'description' => $faker->realText($maxNbChars = 40),
        'author' => $faker->name,
        'approval' => $faker->name,
        'tags' => "",
        'category' => "",
        'category_sub' => "",
        'visible' => true,
        'checked' => true,
        'article_file' => $faker->imageUrl($width = 640, $height = 480),
        'backup_file' => "",
        'attach_file' => "",
    ];
});
