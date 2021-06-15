<?php

namespace Database\Factories;

use App\Models\Speaker;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpeakerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Speaker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word(mt_rand(1,3), true);
        $title = $this->faker->word(mt_rand(3,6), true);
        $body = $this->faker->paragraph(mt_rand(100,250),true);
        $facebook = $this->faker->word(mt_rand(4,8), true);
        $twitter = $this->faker->word(mt_rand(4,8), true);
        $email = $this->faker->word(mt_rand(4,8), true);
        $instagram = $this->faker->word(mt_rand(4,8), true);

        return [
            'name'  =>  $name,
            'title' =>  $title,
            'body'  =>  $body,
            'facebook'  =>  $facebook,
            'instagram' => $instagram,
            'twitter'   =>  $twitter,
            'email'     =>  $email,
        ];
    }
}
