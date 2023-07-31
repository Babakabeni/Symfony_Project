<?php
namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class AdminPropertyController extends AbstractController
{
    /**
     * @param PropertyRepository
     */
    private $repo;

    /**
     * @var  FormFactoryInterface
     */
    private $formFactory;


    /**
     * @param ObjectManager
     */
    private $em;
    

    public function __construct(PropertyRepository $repo, FormFactoryInterface $formFactory, EntityManagerInterface $em)
    {
        $this->repo = $repo;
        $this->formFactory = $formFactory;
        $this->em = $em;
    }

    public function index(): Response
    {
        $properties = $this->repo->findAll();
        return $this->render('pages/admin/index.html.twig', compact('properties'));
    }
    
    public function new(Request $request)
    {
        $properties = new Property();
        $form = $this->createForm(PropertyType::class, $properties);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($properties);
            $this->em->flush();
            $this->addFlash('success', 'Bien créé avec succès');
            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('pages/admin/new.html.twig', [
            'properties' => $properties,
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Property
     */

    public function edit(Request $request, $id)
    {
        $properties = $this->repo->find($id); 
        $form = $this->createForm(PropertyType::class, $properties);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('pages/admin/edit.html.twig', [
            'properties' => $properties,
            'form' => $form->createView()
        ]);
    }

    public function delete(Property $properties, Request $request)
    {
        if($this->isCsrfTokenValid('delete'. $properties->getId(), $request->get('_token')))
            {
                $this->em->remove($properties);
                $this->em->flush();
                $this->addFlash('success', 'Bien supprimé avec succès');
            }
        return $this->redirectToRoute('admin.property.index');
    }
}