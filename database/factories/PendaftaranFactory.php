<?php

namespace Database\Factories;
use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftaran>
 */
class PendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = \App\Models\User::inRandomOrder()->first()->id;
        $pendaki_id = \App\Models\Pendaki::inRandomOrder()->first()->id;
        $trailId = \App\Models\Trail::inRandomOrder()->first()->id;

        return [
            'registration_id' => $this->faker->unique()->uuid,
            'user_id' => $user_id,
            'pendaki_id' => $pendaki_id,
            'trail_id' => $trailId,
            'tanggal_naik' => $this->faker->date,
            'tanggal_turun' => $this->faker->date,
            'status' => $this->faker->randomElement(['Paid', 'Unpaid', 'Expired']),
            'name' => $this->faker->name,
            'no_hp' => $this->faker->numerify('08##########'),
            'hubungan' => $this->faker->randomElement(['Suami', 'Istri', 'Orang Tua', 'Anak', 'Saudara']),
            'alamat' => $this->faker->address,
            'qr_code' => $this->faker->unique()->uuid,
        ];
    }
}
