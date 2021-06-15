<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word(mt_rand(4,5), true);
        $sub_title  = $this->faker->word(mt_rand(4,6), true);
        $start_date =  $this->faker->dateTimeBetween($startDate = '2020-01-01', $endDate = 'now')->format("Y-m-d");
        $speaker_id = mt_rand(1,15);

        return [
            'title' => $title,
            'sub_title' =>  $sub_title,
            'start_date'    =>  $start_date,
            'speaker_id'    =>  $speaker_id,
        ];
    }
}
