<?php

namespace Database\Factories;
use App\Models\Pendaki;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaki>
 */
class PendakiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'no_identitas' => $this->faker->numerify('################'),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'jenis_kelamin' => $this->faker->randomElement(['Pria', 'Perempuan']),
            'no_hp' => $this->faker->numerify('08##########'),
            'alamat' => $this->faker->address,
        ];
    }
}
