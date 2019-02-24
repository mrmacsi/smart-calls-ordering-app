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
            [
                'id' => '2',
                'type' => 'question',
                'title' => 'Which?',
                'text' => 'Here is our menu. To order burgers press 1. To order fries press 2. To order drinks please press 3.',
                'extra' => [
                    '1' => '4', // burgers
                    '2' => '9', // fries
                    '3' => '12', // fries
                ],
                'next' => '',
            ],
            [
                'id' => '4',
                'type' => 'question',
                'title' => 'Burger Type',
                'text' => 'You selected burgers. For hamburgers press 1, for cheeseburgers please press 2',
                'extra' => [
                    '1' => '5', // ham
                    '2' => '8' // cheese
                ],
                'next' => '',
            ],
            [
                'id' => '5',
                'type' => 'input',
                'title' => 'Hamburgers',
                'text' => 'How many hamburgers would you like to buy?',
                'next' => '6',
            ],
            [
                'id' => '6',
                'type' => 'question',
                'title' => 'proceed or pay',
                'text' => "That's great. if you'd like to add more items press 1 or to proceed to payment please press 2",
                'extra' => [
                    '1' => '2', // menu
                    '2' => '7', // payment
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
            [
                'id' => '8',
                'type' => 'input',
                'title' => 'Cheeseburgers',
                'text' => 'How many cheeseburgers would you like to buy?',
                'next' => '6',
            ],
            [
                'id' => '9',
                'type' => 'question',
                'title' => 'Fries Type',
                'text' => 'You selected Fries. For small fries press 1, for large fries please press 2',
                'extra' => [
                    '1' => '10', // small
                    '2' => '11' // large
                ],
                'next' => '',
            ],
            [
                'id' => '10',
                'type' => 'input',
                'title' => 'Small Fries',
                'text' => 'How many small fries would you like to buy?',
                'next' => '6',
            ],
            [
                'id' => '11',
                'type' => 'input',
                'title' => 'Large Fries',
                'text' => 'How many large fries would you like to buy?',
                'next' => '6',
            ],
            [
                'id' => '12',
                'type' => 'question',
                'title' => 'Drink Type',
                'text' => 'You selected Drinks. For coke press 1, for beer please press 2',
                'extra' => [
                    '1' => '13', // coke
                    '2' => '14' // beer
                ],
                'next' => '',
            ],
            [
                'id' => '13',
                'type' => 'input',
                'title' => 'Coke',
                'text' => 'How many cans of coke would you like to buy?',
                'next' => '6',
            ],
            [
                'id' => '14',
                'type' => 'input',
                'title' => 'Beer',
                'text' => 'How many bottles of beer would you like to buy?',
                'next' => '6',
            ],
        ];

        foreach ($actions as $action) {
            \App\Action::create($action);
        }
    }
}
