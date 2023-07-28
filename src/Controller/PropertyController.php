<?php
namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repo;

    public function __construct(PropertyRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @return Response 
     */
    public function index(EntityManagerInterface $em): Response
    {
        return $this->render('pages/property/index.html.twig');
    }
}