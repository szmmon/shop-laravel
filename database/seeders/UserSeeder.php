<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     //nie dziala bo zapisuje w plaintexcie hasla
    public function run(): void
    {
        $data = [
            ['name' => 'user1',
            'surname' => 'user1 surname',
            'phone_number' => 'user1 phone',
            'email' => 'user1@mail.com',
            'password'=> 'testtest',
            ],
            ['name' => 'user2',
            'surname' => 'user2 surname',
            'phone_number' => 'user2 phone',
            'email' => 'user2@mail.com',
            'password'=> 'testtest',
            ],
            ['name' => 'user3',
            'surname' => 'user3 surname',
            'phone_number' => 'user3 phone',
            'email' => 'user3@mail.com',
            'password'=> 'testtest',
            ],
            ['name' => 'user4',
            'surname' => 'user4 surname',
            'phone_number' => 'user4 phone',
            'email' => 'user4@mail.com',
            'password'=> 'testtest',
            ],
            ['name' => 'user5',
            'surname' => 'user5 surname',
            'phone_number' => 'user5 phone',
            'email' => 'user5@mail.com',
            'password'=> 'testtest',
            ],
            ['name' => 'user6',
            'surname' => 'user6 surname',
            'phone_number' => 'user6 phone',
            'email' => 'user6@mail.com',
            'password'=> 'testtest',
            ],

        ];
        User::insert($data);
    }
}
