<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'name' => 'Report Panel Usage',
                'due_date' => '2019-02-12',
                'priority' => 'HIGH',
                'team' => 'Team A',
                'avatar' => 'NG',
                'image' => null,
            ],
            [
                'name' => 'Report Panel Usage',
                'due_date' => '2019-02-18',
                'priority' => 'MED',
                'team' => 'Team B',
                'avatar' => 'RB',
                'image' => '/images/xs/avatar1.jpg',
            ],
            [
                'name' => 'New logo design for Angular Admin',
                'due_date' => '2019-03-02',
                'priority' => 'High',
                'team' => 'Team C',
                'avatar' => 'AB',
                'image' => '/images/xs/avatar2.jpg',
            ],
            [
                'name' => 'Report Panel Usage',
                'due_date' => '2019-02-12',
                'priority' => 'LOW',
                'team' => 'Team A',
                'avatar' => 'AM',
                'image' => null,
            ],
            [
                'name' => 'Report Panel Usage',
                'due_date' => '2019-02-18',
                'priority' => 'MED',
                'team' => 'Team B',
                'avatar' => 'NG',
                'image' => '/images/xs/avatar3.jpg',
            ],
            [
                'name' => 'New logo design for Angular Admin',
                'due_date' => '2019-03-02',
                'priority' => 'High',
                'team' => 'Team D',
                'avatar' => 'NG',
                'image' => null,
            ],
            [
                'name' => 'Design PSD files for Angular Admin',
                'due_date' => '2019-03-20',
                'priority' => 'MED',
                'team' => 'Team E',
                'avatar' => 'MQ',
                'image' => '/images/xs/avatar4.jpg',
            ],
            [
                'name' => 'Design PSD files for Angular Admin',
                'due_date' => '2019-03-20',
                'priority' => 'MED',
                'team' => 'Team F',
                'avatar' => 'NG',
                'image' => '/images/xs/avatar5.jpg',
            ],
            // Add more tasks as needed...
        ];

        DB::table('tasks')->insert($tasks);
    }
}
