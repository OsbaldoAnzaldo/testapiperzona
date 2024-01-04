<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        


        $records = [
            [
                'name' => 'administrador',
                'email' => 'admin@perzona.com',
                'password' => Hash::make('12345678'),
                'created_at' => date('Y-m-d H:i:s'),
                'email_verified_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach($records as $record) {
            $user = User::firstOrCreate($record);
        }
    }
}
