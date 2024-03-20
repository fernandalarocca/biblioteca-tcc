<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Restock;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestockFactory extends Factory
{
    protected $model = Restock::class;

    public function definition()
    {
        return [
            'author_id' => Author::factory(),
            'book_id' =>Book::factory(),
            'quantity' => $this->faker->randomNumber(1),
            'clients_name' => $this->faker->name,
            'cpf' => $this->faker->randomNumber(11),
            'phone' => $this->faker->randomNumber(11)
        ];
    }
}
