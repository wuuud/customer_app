<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $postcode_address = explode(' ', $faker->address(), 3);
        return [
            'name' => $faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'postcode' => $postcode_address[0],
            'address' => $postcode_address[2],
            'tel' => $faker->phoneNumber()
        ];
    }
}
