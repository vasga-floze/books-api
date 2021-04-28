<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;


class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            //Specify data to fill the table with
            'title' => $this->faker->sentence(3),
            'genre' => $this->faker->sentence(1),
            'author' => $this->faker->name, //insert a person name
            'publisher' => $this->faker->company, //insert a company name
            'year'=> $this->faker->year($max = 'now'), //insert a year with a max value of now
            'cover'=> $this->faker->imageUrl(720, 1100)
        ];
    }
    
}
