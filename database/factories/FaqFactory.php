<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $question = $this->faker->word(mt_rand(8,10), true);
        $answer = $this->faker->paragraph(mt_rand(30,50),true);
        return [
            'question'  =>  $question,
            'answer'    => $answer
        ];
    }
}
