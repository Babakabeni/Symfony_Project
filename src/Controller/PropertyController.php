<?php
namespace App\Controller;

use App\Entity\Property;
use App\Entity\PropertyDTO;
use App\Form\PropertyDTOType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(EntityManagerInterface $em, PaginatorInterface $paginate, Request $request): Response
    {
        $search = new PropertyDTO();
        $form = $this->createForm(PropertyDTOType::class, $search);
        $form->handleRequest($request);
        $properties = $paginate->paginate($this->repo->findAllVisibleQuery($search),
        $request->query->getInt('page', 1),
        12
    );
        return $this->render('pages/property/index.html.twig',[
            'properties' => $properties,
            'form' => $form->createView()
        ]);
    }
}