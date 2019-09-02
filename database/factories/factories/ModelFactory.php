<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\Banner\Banner;
use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use GuiaLocaliza\Companies\Admin\Domains\Models\Click\Click;
use GuiaLocaliza\Companies\Admin\Domains\Models\District\District;
use GuiaLocaliza\Companies\Admin\Domains\Models\Gallery\Gallery;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\Phone;
use GuiaLocaliza\Companies\Admin\Domains\Models\Place\Place;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\Zipcode;
use GuiaLocaliza\Companies\Admin\Domains\Models\User\User;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\Company;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContract;


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'admin' => mt_rand(0,1),
        'active' => mt_rand(0,1),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];

});

$factory->define(Zipcode::class, function (Faker\Generator $faker) {
    return [
        'active' => true
    ];
});

$factory->define(Place::class, function (Faker\Generator $faker) {
    return [
        'active' => true
    ];
});

$factory->define(District::class, function (Faker\Generator $faker) {
    return [
        'active' => true
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Company::class, function (Faker\Generator $faker) {

    $plan_id = rand(2,4);
    if (rand(1,100)>10) {
        $plan_id = 1;
    }

    $state = State::inRandomOrder()
        ->where('active', true)->first();

    $city = City::where('state_id', $state->id)
        ->inRandomOrder()
        ->first();

    return [
        'company_uid' => $faker->uuid,
        'plan_id' => $plan_id,
        'state_id' => $state->id,
        'city_id' => $city->id,
        'zipcode_id' => function() use($faker, $city){
            return factory(Zipcode::class)->create([
                'code' => $faker->postcode,
                'city_id' => $city->id
            ])->id;
        },
        'place_id' => function() use($faker, $city){
            return factory(Place::class)->create([
                'name' => $faker->streetName,
                'city_id' => $city->id
            ])->id;
        },
        'district_id' => function() use($faker, $city) {
            return factory(District::class)->create([
                'name' => $faker->lastName. " " .$faker->cityPrefix . " ". $faker->citySuffix,
                'city_id' => $city->id
            ])->id;
        },
        'name_fantasy' => $faker->company,
        'keyword_fantasy' => $faker->sentence,
        'keyword_category' => $faker->sentence,
        'description' => $faker->paragraph,
        'numeral' => $faker->buildingNumber,
        'complement' => $faker->sentence,
        'website' => $faker->url,
        'email' => $faker->unique()->companyEmail,
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'google' => $faker->url,
        'tags' => $faker->sentence,
        'tag_title' => $faker->sentence,
        'tag_description' => $faker->paragraph,
        'active' => rand(0,10) > 0 ? true : false

    ];
});

$factory->define(Phone::class, function (Faker\Generator $faker) {

    $type = 'others';
    $number = $faker->phoneNumber;
    if (validate_is_cell_phone_number($number)) {
        $type = 'cell';
    }

    if (validate_is_landline_number($number)) {
        $type = 'fixed';
    }

    return [
        'type' => $type,
        'number' => tools_only_numbers( $number )
    ];

});

$factory->define(Click::class, function (Faker\Generator $faker) {
    return [
        'url' => $faker->url,
        'ip' => $faker->ipv4,
        'agent' => $faker->userAgent
    ];
});

$factory->define(Gallery::class, function () {
    return [
        'image' => rand(1,10),
        'ext' => 'jpg'
    ];
});

$factory->define(Banner::class, function () {
    return [
        'image' => rand(1,10),
        'ext' => 'jpg'
    ];
});


$factory->define(PlanContract::class, function (Faker\Generator $faker) {

    if (rand(0,1) <= 0) {
        $cpf_cnpj = $faker->cpf(false);
    } else {
        $cpf_cnpj = $faker->cnpj(false);
    }

    return [
        'active' => true,
        'cpf_cnpj' => $cpf_cnpj,
        'company_name' => $faker->company,
        'contracting_name' => $faker->name,
        'note' => $faker->paragraph,
        'phone_name' => $faker->phoneNumber,
        'start_at' => $faker->dateTime()
    ];
});
