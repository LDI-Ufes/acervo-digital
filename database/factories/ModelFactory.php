<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\CourseType::class, function (Faker\Generator $faker) {

    return [
       'name' => $faker->realText(64, rand(1,5)),
    ];
});

$factory->define(App\ObjectType::class, function (Faker\Generator $faker) {

    return [
       'name' => $faker->realText(64, rand(1,5)),
    ];
});

$factory->define(App\Course::class, function(Faker\Generator $faker) {
	$type_id = App\CourseType::all()->random()->id;

	return [
		'type_id' => $type_id,
		'name' => $faker->realText(16, rand(1,5)),
		'modules' => rand(2,16),
		'bg_color' => $faker->hexcolor,
		'fg_color' => $faker->hexcolor,
		'aux_color' => $faker->hexcolor,
		'short' => $faker->lexify('???'),	
	];
});

$factory->define(App\LearningObject::class, function(Faker\Generator $faker) {
	$course_id = App\Course::all()->random()->id;
	$type_id = App\ObjectType::all()->random()->id;
	$module = App\Course::find($course_id)->modules;

	return [
		'course_id' => $course_id,
		'type_id' => $type_id, 
		'module' => $faker->numberBetween(1, $module),
		'title' => $faker->realText(32, rand(1,5)),
		'author' => $faker->name,
		'summary' => $faker->realText(512, rand(1,5)),
		//'cover' => $faker->image('/tmp', 219, 219, 'cats'),
		'link' => $faker->url,
	];
});

