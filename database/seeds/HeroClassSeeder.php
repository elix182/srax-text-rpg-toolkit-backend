<?php

use Illuminate\Database\Seeder;
use App\HeroClass;
use App\Weapon;

class HeroClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Information adapted from: https://www.dndbeyond.com/classes */
        $classes = [
            [
                'name' => 'Paladin',
                'description' => 'A holy warrior bound to a sacred oath',
                'availableWeapons' => [
                    Weapon::where(['name' =>'Sword'])->first(),
                    Weapon::where(['name' =>'Dagger'])->first()
                ]
            ],
            [
                'name' => 'Ranger',
                'description' => 'A warrior who combats threats on the edges of civilization',
                'availableWeapons' => [
                    Weapon::where(['name' =>'Bow & Arrows'])->first(),
                    Weapon::where(['name' =>'Dagger'])->first(),
                ]
            ],
            [
                'name' => 'Barbarian',
                'description' => 'A fierce warrior of a primitive background who can enter a battle rage',
                'availableWeapons' => [
                    Weapon::where(['name' =>'Sword'])->first(),
                    Weapon::where(['name' =>'Hammer'])->first(),
                    Weapon::where(['name' =>'Dagger'])->first(),
                ]
            ],
            [
                'name' => 'Wizard',
                'description' => 'A scholarly magic-user capable of manipulating the structures of reality',
                'availableWeapons' => [
                    Weapon::where(['name' =>'Staff'])->first(),
                    Weapon::where(['name' =>'Dagger'])->first(),
                ]
            ],
            [
                'name' => 'Cleric',
                'description' => 'A priestly champion who wields divine magic in service of a higher power',
                'availableWeapons' => [
                    Weapon::where(['name' =>'Staff'])->first(),
                    Weapon::where(['name' =>'Dagger'])->first(),
                ]
            ],
            [
                'name' => 'Warrior',
                'description' => 'A master of martial combat, skilled with a variety of weapons and armor',
                'availableWeapons' => [
                    Weapon::where(['name' =>'Sword'])->first(),
                    Weapon::where(['name' =>'Hammer'])->first(),
                    Weapon::where(['name' =>'Bow & Arrows'])->first(),
                    Weapon::where(['name' =>'Staff'])->first(),
                    Weapon::where(['name' =>'Dagger'])->first(),
                ]
            ],
            [
                'name' => 'Thief',
                'description' => 'A scoundrel who uses stealth and trickery to overcome obstacles and enemies',
                'availableWeapons' => [
                    Weapon::where(['name' =>'Sword'])->first(),
                    Weapon::where(['name' =>'Bow & Arrows'])->first(),
                    Weapon::where(['name' =>'Staff'])->first(),
                    Weapon::where(['name' =>'Dagger'])->first(),
                ]
            ],
        ];
        foreach($classes as $data){
            if(!HeroClass::where(['name' => $data['name']])->exists()){
                $class = HeroClass::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                ]);
                foreach($data['availableWeapons'] as $weapon){
                    $class->availableWeapons()->save($weapon);
                }
                $class->save();
            }
        }
    }
}
