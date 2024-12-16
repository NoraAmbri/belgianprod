<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dataset = [
            ['title' => 'Inception',
            'description' => 'L\'histoire d\'un braquage dans un rêve',
            'category' => 'sci-fi',
            ],
            ['title' => 'Gladiator',
            'description' => 'Un héro dans l\'arène',
            'category' => 'action',
            ],
            ['title' => 'Spider-man',
            'description' => 'L\'histoire de l\'homme araignée',
            'category' => 'action',
            ],
            ['title' => 'Nosferatu',
            'description' => 'L\'histoire dun vampire',
            'category' => 'horreur',
            ],
        ];
        
        foreach($dataset as $data) {
            $movie = new Movie();
            $movie -> setTitle($data['title']);
            $movie -> setDescription($data['description']);
        
            $manager->persist($movie);
        }

        $manager->flush();
    }
}
