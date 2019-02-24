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
                'text' => 'Welcome to Burger Store',
                'next' => '2',
            ],
//            [
//                'id' => '2',
//                'type' => 'input',
//                'title' => 'Burger',
//                'text' => 'Please select and option',
//                'next' => '3',
//            ],
            [
                'id' => '2',
                'type' => 'question',
                'title' => 'Which?',
                'text' => 'Here is our menu. To order burgers press 1. To order fries press 2 and to order drinks please press 3.',
                'extra' => [
                    '1' => '4', // burgers
//                    '2' => '5',
//                    '3' => '6',
                ],
                'next' => '',
            ],
            [
                'id' => '4',
                'type' => 'question',
                'title' => 'Burger Type',
                'text' => 'You selected burgers. For hamburgers press 1, for cheeseburgers press 2',
                'extra' => [
                    '1' => '5'
                ],
                'next' => '',
            ],
            [
                'id' => '5',
                'type' => 'input',
                'title' => 'Hamburgers',
                'text' => 'How many burgers would you like to buy?',
                'next' => '6',
            ],
            [
                'id' => '6',
                'type' => 'question',
                'title' => 'proceed or pay',
                'text' => "That's great. if you'd like to add more items press 1 or to proceed to payment press 2",
                'extra' => [
                    '1' => '2', // menu
                    '2' => '7',
//                    '3' => '6',
                ],
                'next' => '',
            ],
            [
                'id' => '7',
                'type' => 'payment',
                'title' => 'payment',
                'text' => '',
                'next' => '',
            ],


        ];

        foreach ($actions as $action) {
            \App\Action::create($action);
        }
    }
}
