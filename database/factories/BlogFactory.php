<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Blog;
use App\BlogCategory;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
	$blog_title = $faker->sentence($nbWords = 4, $variableNbWords = true);
    return [
    	'blog_cat_id' => BlogCategory::all()->random()->blog_cat_id,
        'blog_title' => $blog_title,
        'blog_title_slug' => Str::slug($blog_title, '-'),
        'blog_content' => $faker->sentence($nbWords = 30, $variableNbWords = true),
        'blog_author' => $faker->name,
        'blog_image' => 'default.jpg'
    ];
});
