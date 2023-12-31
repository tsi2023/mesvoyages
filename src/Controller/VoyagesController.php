<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of VoyagesController
 *
 * @author tsili
 */
class VoyagesController extends AbstractController {
    //put your code here

    /**
     * @Route("/voyages", name="voyages")
     * @return Response
     */
    public function index(): Response {
        $visites = $this->repository->findAllOrderBy('datecration', 'DESC');
        return $this->render("pages/voyages.html.twig", [
                    'visites' => $visites
        ]);
    }

    /**
     * 
     * @var VisiteRepository
     */
    private $repository;

    /**
     * 
     * @param VisiteRepository $repository
     */
    public function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * @Route("/voyages/tri/{champ}/{ordre}", name="voyages.sort")
     * @param type $champ
     * @param type $ordre 
     * @param Response 
     */
    public function sort($champ, $ordre): Response{
        $visites = $this->repository->findAllOrderBy($champ, $ordre);
        return $this->render("pages/voyages.html.twig",[
            'visites' => $visites          
        ]);
    }
    /**
     * @Route("/voyages/recherche/{champ}", name="voyages.findallequal")
     * @param type $champ
     * @param Resquest $request
     * @return Response
     */
    public function findAllEqual($champ, Request $request): Response {
        $valeur = $request->get("recherche");
        $visites = $this->repository->findByEqualValue($champ, $valeur);
        return $this->render("pages/voyages.html.twig", [
            'visites' => $visites
        ]);
    }
    /**
     * @Route("/voyages/voyage/{id}", name="voyages.showone")
     * @param type $id
     * return Response
     */
    public function showOne($id): Response{
        $visite = $this->repository->find($id);
        return $this->render("pages/voyage.html.twig",[
            'visite' => $visite
        ]);
    }
}
