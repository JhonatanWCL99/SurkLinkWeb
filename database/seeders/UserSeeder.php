<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Admin',
            'ci' => 8515546,
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'telefono' => 74564545,
            'tipo_usuario' => 'A',
        ]);

        $user1->assignRole('Admin');

        $user2 = User::create([
            'name' => 'Jhonatan Coyo',
            'ci' => 9665654,
            'email' => 'jhonatan@gmail.com',
            'password' => bcrypt('jhonatan'),
            'telefono' => 71387921,
            'tipo_usuario' => 'A',
        ]);

        $user2->assignRole('Admin');

        $user3 = User::create([
            'name' => 'Alvaro Velasquez',
            'ci' => 5456451,
            'email' => 'alvaro@gmail.com',
            'password' => bcrypt('alvaro'),
            'telefono' => 65465456,
            'tipo_usuario' => 'C',
        ]);

        $user3->assignRole('Cliente');
    }
}
