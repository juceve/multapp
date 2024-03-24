<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'David Saca',
            'email' => 'david@gmail.com',
            'password' => bcrypt('Multas2024'),
        ])->assignRole('Administrador');

        \App\Models\Sistema::create([
            'leyendaboleta' => 'Todos los pagos deberán realizarse en oficinas de la Asociación en horarios de Atencion al Cliente.',
        ]);
    }
}
