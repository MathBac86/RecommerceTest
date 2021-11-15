<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Repository\ProduitsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/Liste-produits", name="Liste-produits")
     */
    public function getListeProduits(ProduitsRepository $produitsRepo)
    {
        $produits = $produitsRepo->findAll();

        $listeProduits = [];

        foreach($produits as $item) {
            $listeProduits[] = array(
                'id' => $item->getId(),
                'nom' => $item->getNomProduit(),
                'marque' => $item->getMarqueProduit(),
                'prix' => $item->getPrixProduit()
            );
        }

        $response = new Response(json_encode($listeProduits));
        $response->headers->set('Content-Type', 'application/json');
    
        return $response;
    }
}
