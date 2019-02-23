<?php

use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        ['id', 'title', 'text', 'next', 'extra']
        $actions = [
            [
                'id' => '1',
                'type' => 'talk',
                'title' => 'Welcome',
                'text' => 'Welcome  to Burger Store',
                'next' => '2',
            ],
            [
                'id' => '2',
                'type' => 'input',
                'title' => 'Burger',
                'text' => 'Please select and option',
                'next' => '3',
            ],
            [
                'id' => '3',
                'type' => 'talk',
                'title' => 'Thanks',
                'text' => 'We have your input now, thanks',
                'next' => '',
            ],
        ];

        foreach ($actions as $action) {
            \App\Action::create($action);
        }
    }
}
