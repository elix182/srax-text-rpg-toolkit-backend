<?php

use Illuminate\Database\Seeder;
use App\HeroClass;
use App\HeroRace;

class HeroRaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Information adapted from: https://www.dndbeyond.com/races */
        $races = [
            [
                'name' => 'Human',
                'description' => 'Humans are the most adaptable and ambitious people among the common races. Whatever drives them, humans are innovators, the achievers and the pioneers of the worlds',
                'strBonus' => '0',
                'dexBonus' => '0',
                'intBonus' => '0',
                'availableClasses' => [
                    HeroClass::where(['name' => 'Paladin'])->first()
                ]
            ],
            [
                'name' => 'Elf',
                'description' => 'Elves are a magical people of otherworldly grace, living in the world but not entirely part of it',
                'strBonus' => '0',
                'dexBonus' => '2',
                'intBonus' => '0',
                'availableClasses' => [
                    HeroClass::where(['name' => 'Paladin'])->first(),
                    HeroClass::where(['name' => 'Ranger'])->first(),
                    HeroClass::where(['name' => 'Wizard'])->first(),
                    HeroClass::where(['name' => 'Cleric'])->first(),
                    HeroClass::where(['name' => 'Thief'])->first(),
                ]
            ],
            [
                'name' => 'Halfling',
                'description' => 'The diminutive halflings survive in a world full of larger creatyres by avoiding notice or, barring that, avoiding offense',
                'strBonus' => '0',
                'dexBonus' => '2',
                'intBonus' => '0',
                'availableClasses' => [
                    HeroClass::where(['name' => 'Paladin'])->first(),
                    HeroClass::where(['name' => 'Ranger'])->first(),
                    HeroClass::where(['name' => 'Wizard'])->first(),
                    HeroClass::where(['name' => 'Cleric'])->first(),
                    HeroClass::where(['name' => 'Warrior'])->first(),
                    HeroClass::where(['name' => 'Thief'])->first(),
                ]
            ],
            [
                'name' => 'Dwarf',
                'description' => 'Bold and hardy, dwarves are known as skilled warriors, miners, and workers of stone and metal',
                'strBonus' => '0',
                'dexBonus' => '0',
                'intBonus' => '0',
                'availableClasses' => [
                    HeroClass::where(['name' => 'Paladin'])->first(),
                    HeroClass::where(['name' => 'Barbarian'])->first(),
                    HeroClass::where(['name' => 'Cleric'])->first(),
                    HeroClass::where(['name' => 'Warrior'])->first(),
                    HeroClass::where(['name' => 'Thief'])->first(),
                ]
            ],
            [
                'name' => 'Half-Orc',
                'description' => "Half-Orcs' grayish pigmentation, sloping foreheads, jutting jaws, prominent teeth, and towering builds make their orcish heritage plain for all to see",
                'strBonus' => '2',
                'dexBonus' => '0',
                'intBonus' => '0',
                'availableClasses' => [
                    HeroClass::where(['name' => 'Paladin'])->first(),
                    HeroClass::where(['name' => 'Ranger'])->first(),
                    HeroClass::where(['name' => 'Barbarian'])->first(),
                    HeroClass::where(['name' => 'Wizard'])->first(),
                    HeroClass::where(['name' => 'Warrior'])->first(),
                    HeroClass::where(['name' => 'Thief'])->first(),
                ]
            ],
            [
                'name' => 'Half-Elf',
                'description' => 'Half-elves combine what some say are the best qualities of their elf and human parents',
                'strBonus' => '0',
                'dexBonus' => '0',
                'intBonus' => '0',
                'availableClasses' => [
                    HeroClass::where(['name' => 'Paladin'])->first(),
                ]
            ],
            [
                'name' => 'Dragonborn',
                'description' => 'Dragonborn look very much like dragons standing erect in humanoid form, though they lack wings or a tail',
                'strBonus' => '2',
                'dexBonus' => '0',
                'intBonus' => '0',
                'availableClasses' => [
                    HeroClass::where(['name' => 'Paladin'])->first(),
                    HeroClass::where(['name' => 'Ranger'])->first(),
                    HeroClass::where(['name' => 'Barbarian'])->first(),
                    HeroClass::where(['name' => 'Wizard'])->first(),
                    HeroClass::where(['name' => 'Warrior'])->first(),
                    HeroClass::where(['name' => 'Thief'])->first(),
                ]
            ],
        ];
        foreach($races as $data){
            if(!HeroRace::where(['name'=>$data['name']])->exists()){
                $race = HeroRace::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'strBonus' => $data['strBonus'],
                    'dexBonus' => $data['dexBonus'],
                    'intBonus' => $data['intBonus'],
                ]);
                foreach($data['availableClasses'] as $class){
                    $race->availableClasses()->save($class);
                }
                $race->save();
            }
        }
    }
}
