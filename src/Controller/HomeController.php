<?php
 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Twig\Environment;

class HomeController extends AbstractController 
{
    /**
     * @param PropertyRepository
     */
     
    private $property;

    public function __construct(PropertyRepository $repo)
    {
        $this->property = $repo;
    }
    /**
     * @return Response
     */
    public function index(): Response
    {
        $property = $this->property->findlatest();
        return $this->render('pages/Home.html.twig',[
            'properties' => $property
        ]);
    }

    /**
     * @return Response
     * @var $id
     */

    public function show($id): Response
    {
        $property = $this->property->find($id);
        return $this->render('pages/property/Show.html.twig',[
            'properties' => $property,
            'current_menu' => 'properties' 
        ]);
    }
}