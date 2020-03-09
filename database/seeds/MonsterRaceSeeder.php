<?php

use Illuminate\Database\Seeder;

use App\MonsterRace;
use App\MonsterAbility;

class MonsterRaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Information obtained from https://dnd.wizards.com/dungeons-and-dragons/what-is-dd/monsters */
        $races = [
            [
                'name' => 'Beholder',
                'description' => 'Aggressive, hateful, and greedy, these aberrations dismiss all other creatures as lesser beings, toying with them or destroying them as they choose',
                'availableAbilities' => MonsterAbility::all()
                // 'availableAbilities' => [
                //     MonsterAbility::where(['name' => 'Shadow Ball'])->first(),
                //     MonsterAbility::where(['name' => 'Aerial Ace'])->first(),
                //     MonsterAbility::where(['name' => 'Giga Drain'])->first(),
                //     MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                //     MonsterAbility::where(['name' => 'Earthquake'])->first(),
                //     MonsterAbility::where(['name' => 'Crunch'])->first(),
                //     MonsterAbility::where(['name' => 'Double Team'])->first(),
                //     MonsterAbility::where(['name' => 'Psychic'])->first(),
                //     MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                //     MonsterAbility::where(['name' => 'Surf'])->first(),
                // ]
            ],
            [
                'name' => 'Mind Flayer',
                'description' => 'Psionic tyrants, slavers, and interdimensional voyagers, mind flayers are insidious masterminds that harvest entire races for their own twisted ends',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Shadow Ball'])->first(),
                    MonsterAbility::where(['name' => 'Giga Drain'])->first(),
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Drow',
                'description' => 'The cruelest of elves, drow are seldom seen by the surface world. In the lightless caverns and endless warrens of twisting passages of the Underdark, the dark elves—the drow—find refuge',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                    MonsterAbility::where(['name' => 'Surf'])->first(),
                ]
            ],
            [
                'name' => 'Dragon',
                'description' => 'True dragons are known and feared for their predatory cunning and their magic, with the oldest dragons accounted as some of the most powerful creatures in the world',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Aerial Ace'])->first(),
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Owlbear',
                'description' => 'The owlbear’s reputation for ferocity, aggression, stubbornness, and sheer ill temper makes it one of the most feared predators of the wild',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Aerial Ace'])->first(),
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Bulette',
                'description' => 'Bulettes (or "land sharks") use their powerful claws to tunnel through the earth when they hunt',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Rust Monster',
                'description' => 'These strange, normally docile creatures corrode ferrous metals, then gobble up the rust they create',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Gelatinous Cube',
                'description' => 'These creatures scour dungeon passages in silent, predictable patterns, leaving perfectly clean paths in their wake. They consume living tissue while leaving bones and other materials undissolved',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                    MonsterAbility::where(['name' => 'Surf'])->first(),
                ]
            ],
            [
                'name' => 'Hill Giant',
                'description' => 'Hill giants are selfish, dimwitted brutes that hunt, forage, and raid in constant search of food',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Stone Giant',
                'description' => 'Hill Stone giants are reclusive, quiet, and peaceful as long as they are left alone',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Frost Giant',
                'description' => 'Gigantic reavers from the freezing lands beyond civilization, frost giants are fierce, hardy warriors that survive on the spoils of their raids and pillaging',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Fire Giant',
                'description' => 'Fire giants have a fearsome reputation as soldiers and conquerors, and for their ability to burn, plunder, and destroy',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Cloud Giant',
                'description' => 'A cloud giant earns its place in the ordning by the treasure it accumulates, the wealth it wears, and the gifts it bestows on other cloud giants',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Aerial Ace'])->first(),
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Storm Giant',
                'description' => 'Storm giants are contemplative seers that live in places far removed from mortal civilization',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Aerial Ace'])->first(),
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Displacer Beast',
                'description' => 'This monstrous predator takes its name from its ability to mask itself with illusion, displacing light so that it appears to be somewhere it is not',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Githyanki',
                'description' => 'Arguably the most skilled navigators of the Astral Plane, the gaunt, yellow-skinned githyanki are the reavers of a thousand worlds',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Kobold',
                'description' => 'Kobolds are craven reptilian humanoids that worship evil dragons as demigods and serve them as minions and toadies',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                ]
            ],
            [
                'name' => 'Kuo-Toa',
                'description' => 'Kuo-toa are sadistic, degenerate fish-like humanoids that once inhabited the shores and islands of the surface world',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Lich',
                'description' => 'A lich is spawned when a great wizard embraces the evil state of undeath as a means of extending life beyond its mortal limits. Scheming and insane, they hunger for long-forgotten knowledge and the most terrible secrets',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Orc',
                'description' => 'Orcs gather in tribes that exert their dominance and satisfy their bloodlust by plundering villages, devouring or driving off roaming herds, and slaying any humanoids that stand against them',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Slaad',
                'description' => 'The only creatures native to the inhospitable realm of Limbo are the batrachian slaadi, which thrive in the chaotic torrent of its elements',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Umber Hulk',
                'description' => 'An abominable horror from deep beneath the earth, an umber hulk burrows into cave complexes, dungeons, or Underdark settlements in search of food—especially the humanoid prey it craves',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Aerial Ace'])->first(),
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                ]
            ],
            [
                'name' => 'Yuan-ti',
                'description' => 'Devious serpent folk devoid of compassion, yuan-ti manipulate other creatures by arousing their doubts, evoking their fears, and elevating and crushing their hopes',
                'availableAbilities' => [
                    MonsterAbility::where(['name' => 'Thunderbolt'])->first(),
                    MonsterAbility::where(['name' => 'Earthquake'])->first(),
                    MonsterAbility::where(['name' => 'Crunch'])->first(),
                    MonsterAbility::where(['name' => 'Double Team'])->first(),
                    MonsterAbility::where(['name' => 'Psychic'])->first(),
                    MonsterAbility::where(['name' => 'Ice Beam'])->first(),
                    MonsterAbility::where(['name' => 'Surf'])->first(),
                ]
            ],
        ];
        foreach($races as $r){
            if(!MonsterRace::where(['name' => $r['name']])->exists()){
                $race = MonsterRace::create([
                    'name' => $r['name'],
                    'description' => $r['description']
                ]);
                foreach($r['availableAbilities'] as $ability){
                    $race->availableAbilities()->save($ability);
                }
                $race->save();
            }
        }
    }
}
