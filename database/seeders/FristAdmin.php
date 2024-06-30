<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class FristAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create($this->createAdmin());
    }

    private function createAdmin()
    {
        return [

            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456'),
            'email_verified_at' => Carbon::now()
        ];
    }
}
