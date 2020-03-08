<?php

use Illuminate\Database\Seeder;
use App\Weapon;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weapons = [
            [
                'name' => 'Sword',
                'description' => 'A basic sword with a basic blade',
                'damage' => "10",
                'range' => "1",
                'twoHanded' => false,
            ],
            [
                'name' => 'Dagger',
                'description' => 'A basic defensive dagger',
                'damage' => "5",
                'range' => "1",
                'twoHanded' => false,
            ],
            [
                'name' => 'Hammer',
                'description' => 'A warhammer made with a polished stone and a stick',
                'damage' => "15",
                'range' => "3",
                'twoHanded' => true,
            ],
            [
                'name' => 'Bow & Arrows',
                'description' => 'A wood bow with some iron-tipped arrows',
                'damage' => "10",
                'range' => "30",
                'twoHanded' => true,
            ],
            [
                'name' => 'Staff',
                'description' => 'A staff made of wood',
                'damage' => "5",
                'range' => "3",
                'twoHanded' => false,
            ],
        ];
        foreach($weapons as $weapon){
            if(!Weapon::where(['name' => $weapon['name']])->exists()){
                Weapon::create($weapon);
            }
        }
    }
}
