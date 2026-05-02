<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // Create sample user profiles
        $profiles = [
            [
                'name' => 'John Doe',
                'payload' => [
                    'emails' => [
                        ['email' => 'john.doe@example.com', 'start_date' => '2020-01-01', 'end_date' => null],
                        ['email' => 'john.d@oldmail.com', 'start_date' => '2015-06-01', 'end_date' => '2020-01-01'],
                    ],
                    'phone_numbers' => [
                        ['number' => '555-123-4567', 'extension' => null, 'start_date' => '2020-01-01', 'end_date' => null],
                        ['number' => '555-987-6543', 'extension' => '101', 'start_date' => '2018-03-15', 'end_date' => null],
                    ],
                    'addresses' => [
                        ['address' => '123 Main Street, Apt 4B', 'location' => 'New York, NY', 'start_date' => '2020-01-01', 'end_date' => null],
                        ['address' => '456 Oak Avenue', 'location' => 'Los Angeles, CA', 'start_date' => '2015-06-01', 'end_date' => '2020-01-01'],
                    ],
                    'vsn_numbers' => [
                        ['vsn' => 'VSN-123456789', 'start_date' => '2020-01-01', 'end_date' => null],
                    ],
                ],
            ],
            [
                'name' => 'Jane Smith',
                'payload' => [
                    'emails' => [
                        ['email' => 'jane.smith@company.com', 'start_date' => '2019-05-20', 'end_date' => null],
                    ],
                    'phone_numbers' => [
                        ['number' => '555-234-5678', 'extension' => null, 'start_date' => '2019-05-20', 'end_date' => null],
                    ],
                    'addresses' => [
                        ['address' => '789 Pine Road, Suite 100', 'location' => 'Chicago, IL', 'start_date' => '2019-05-20', 'end_date' => null],
                    ],
                    'vsn_numbers' => [
                        ['vsn' => 'VSN-987654321', 'start_date' => '2019-05-20', 'end_date' => null],
                    ],
                ],
            ],
            [
                'name' => 'Robert Johnson',
                'payload' => [
                    'emails' => [
                        ['email' => 'robert.j@email.net', 'start_date' => '2018-11-10', 'end_date' => null],
                        ['email' => 'bob.johnson@work.com', 'start_date' => '2021-03-01', 'end_date' => null],
                    ],
                    'phone_numbers' => [
                        ['number' => '555-345-6789', 'extension' => null, 'start_date' => '2018-11-10', 'end_date' => null],
                        ['number' => '555-789-0123', 'extension' => '202', 'start_date' => '2021-03-01', 'end_date' => null],
                    ],
                    'addresses' => [
                        ['address' => '321 Elm Boulevard', 'location' => 'Houston, TX', 'start_date' => '2018-11-10', 'end_date' => null],
                        ['address' => '654 Maple Drive', 'location' => 'Miami, FL', 'start_date' => '2022-01-15', 'end_date' => null],
                    ],
                    'vsn_numbers' => [
                        ['vsn' => 'VSN-456789123', 'start_date' => '2018-11-10', 'end_date' => null],
                    ],
                ],
            ],
            [
                'name' => 'Sarah Williams',
                'payload' => [
                    'emails' => [
                        ['email' => 'sarah.w@domain.org', 'start_date' => '2022-07-01', 'end_date' => null],
                    ],
                    'phone_numbers' => [
                        ['number' => '555-456-7890', 'extension' => null, 'start_date' => '2022-07-01', 'end_date' => null],
                    ],
                    'addresses' => [
                        ['address' => '987 Cedar Lane', 'location' => 'Seattle, WA', 'start_date' => '2022-07-01', 'end_date' => null],
                    ],
                    'vsn_numbers' => [
                        ['vsn' => 'VSN-789123456', 'start_date' => '2022-07-01', 'end_date' => null],
                    ],
                ],
            ],
            [
                'name' => 'Michael Brown',
                'payload' => [
                    'emails' => [
                        ['email' => 'michael.brown@tech.io', 'start_date' => '2020-09-15', 'end_date' => null],
                        ['email' => 'mbrown@personal.com', 'start_date' => '2017-02-20', 'end_date' => null],
                    ],
                    'phone_numbers' => [
                        ['number' => '555-567-8901', 'extension' => null, 'start_date' => '2020-09-15', 'end_date' => null],
                    ],
                    'addresses' => [
                        ['address' => '147 Birch Street, Floor 3', 'location' => 'Denver, CO', 'start_date' => '2020-09-15', 'end_date' => null],
                    ],
                    'vsn_numbers' => [
                        ['vsn' => 'VSN-321654987', 'start_date' => '2020-09-15', 'end_date' => null],
                    ],
                ],
            ],
        ];

        foreach ($profiles as $profile) {
            UserProfile::create($profile);
        }
    }
}
