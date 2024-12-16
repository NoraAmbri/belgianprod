<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;
use \DateTime;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dataset = [
            ['firstname' => 'Leonardo',
            'lastname' => 'Di Caprio',
            'birthday'=>'1974-11-11',
            'gender'=>'h',
            ],
            ['firstname' => 'Elliot',
            'lastname' => 'Paige',
            'birthday'=>'1987-02-21',
            'gender'=>'h',
            ],
            ['firstname' => 'Tobey',
            'lastname' => 'Maguire',
            'birthday'=>'1975-06-27',
            'gender'=>'h',
            ],
            ['firstname' => 'Lily Rose',
            'lastname' => 'Depp',
            'birthday'=>'1999-05-27',
            'gender'=>'f',
            ],
        ];
        
        foreach($dataset as $data) {
            $actor = new Actor();
            
            $actor -> setFirstname($data['firstname']);
            $actor -> setLastname($data['lastname']);
            $actor -> setBirthday(DateTime::createFromFormat('Y-m-d', $data['birthday']));
            $actor -> setGender($data['gender']);
        
            $manager->persist($actor);
        }

        $manager->flush();
    }
}
