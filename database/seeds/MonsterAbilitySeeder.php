<?php

use App\MonsterAbility;
use Illuminate\Database\Seeder;

class MonsterAbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Information adapted from: https://bulbapedia.bulbagarden.net/wiki/List_of_moves */
        $abilities = [
            [
                'name' => 'Shadow Ball',
                'description' => 'The user hurls a shadowy blob at the target.',
                'damage' => '8',
                'range' => '30',
            ],
            [
                'name' => 'Aerial Ace',
                'description' => 'The user confounds the target with speed, then slashes',
                'damage' => '6',
                'range' => '10',
            ],
            [
                'name' => 'Giga Drain',
                'description' => 'A nutrient-draining attack',
                'damage' => '7',
                'range' => '10',
            ],
            [
                'name' => 'Thunderbolt',
                'description' => 'A strong electric blast is loosed at the target',
                'damage' => '9',
                'range' => '50',
            ],
            [
                'name' => 'Earthquake',
                'description' => 'The user sets off an earthquake that strikes those around it',
                'damage' => '10',
                'range' => '100',
            ],
            [
                'name' => 'Crunch',
                'description' => 'The user crunches up the target with sharp fangs',
                'damage' => '8',
                'range' => '5',
            ],
            [
                'name' => 'Double Team',
                'description' => 'The user begins moving so quickly that it creates illusory copies of itself',
                'damage' => '0',
                'range' => '1',
            ],
            [
                'name' => 'Psychic',
                'description' => 'The target is hit by a strong telekinetic force',
                'damage' => '9',
                'range' => '10',
            ],
            [
                'name' => 'Ice Beam',
                'description' => 'The target is struck with an icy-cold beam of energy',
                'damage' => '9',
                'range' => '30',
            ],
            [
                'name' => 'Surf',
                'description' => 'It swamps the area around the user with a giant wave',
                'damage' => '9',
                'range' => '30',
            ],
        ];
        foreach($abilities as $ability){
            if(!MonsterAbility::where(['name' => $ability['name']])->exists()){
                MonsterAbility::create($ability);
            }
        }
    }
}
