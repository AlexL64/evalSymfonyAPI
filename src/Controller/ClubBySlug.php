<?php
 
namespace App\Controller;
 
use App\Entity\Club;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Doctrine\Persistence\ManagerRegistry;
 
#[AsController]
class ClubBySlug extends AbstractController
{

    public function __construct(private ManagerRegistry $doctrine) {}

    public function __invoke(string $slug, )
    {
        $club = $this->doctrine
            ->getRepository(Club::class)
            ->findBy(
                ['nom' => $slug],
            );
 
        if (!$club) {
            throw $this->createNotFoundException(
                'No club found for this slug'
            );
        }
 
        return $club;
    }
}