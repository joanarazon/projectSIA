<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
            \DB::table('accounts')->insert([
                'username' => 'Admin',
                'password' => '123',
               
            ]);
        }
    }

