<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biodata>
 */
class BiodataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'noreg_ppdb' => 'PPDB-2425-' . $this->faker->unique()->randomNumber(5),
            'user_id' => $this->faker->unique()->numberBetween(2, 105),
            'gelombang' => $this->faker->randomElement(['1', '2', '3']),
            'nisn' => $this->faker->unique()->numberBetween(30170000001, 30199999999),
            'nik' => $this->faker->unique()->numberBetween(3215000000000001, 3215999999999999),
            'nama' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'tempat_lahir' => 'Karawang',
            'tanggal_lahir' => $this->faker->numberBetween(2017, 2019) . '-' . $this->faker->numberBetween(1, 12) . '-' . $this->faker->numberBetween(1, 28),
            'asal_sekolah' => $this->faker->randomElement(['TK Alam Karawang', 'TK Negeri 1 Karawang', 'TK Negeri 2 Karawang', 'TK Negeri 3 Karawang'], 'TK Negeri 4 Karawang'),
            'tahun_lulus' => $this->faker->randomElement(['2022', '2023', '2024']),
            'kelas' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'alamat' => $this->faker->address(),
            'dusun' => $this->faker->streetName(),
            'rt' => $this->faker->randomNumber(3),
            'rw' => $this->faker->randomNumber(3),
            'desa' => $this->faker->streetSuffix(),
            'kecamatan' => $this->faker->citySuffix(),
            'kabupaten' => $this->faker->city(),
            'provinsi' => $this->faker->state(),
            'kode_pos' => $this->faker->postcode(),
        ];
    }
}
