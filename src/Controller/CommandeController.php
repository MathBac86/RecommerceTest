<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    /**
     * @Route("/Liste-commandes", name="Liste-commandes")
     */
    public function getListeCommandes(CommandeRepository $commandeRepo): Response
    {
        // La liste des commande me parraît plus signiificatif avec un numéro commande qu'avac un id 
        // Car si la personne prend plusieurs téléphone, cela me paraît plus judicieux
        // de faire une requête sur le numéro de la commande que sur l'id de la commande car il peut avoir plusieurs lignes pour une commande.
        $commandes = $commandeRepo->findAllDistinct();

        $listeCommandes = [];

        foreach($commandes as $item) {
            $listeCommandes[] = array(
                'num_Commande' => $item->getNumCommande(),
                'email' => $item->getMailCommande(),
                'date' => $item->getDateCommande(),
            );
        }

        $response = new Response(json_encode($listeCommandes));
        $response->headers->set('Content-Type', 'application/json');
    
        return $response;
    }

    /**
     * @Route("/Liste-produit-commandes/{cde}", name="Liste-produits-commandes")
     */
    public function getProduitsByCommande(CommandeRepository $commandeRepo, $cde): Response
    {

        $commande = $commandeRepo->findProduitsByCommandes($cde);

        $listeProduitsCommandes = [];

        foreach($commande as $item) {
            $listeProduitsCommandes[] = array(
                'id' => $item->getProduits()->getId(),
                'nom' => $item->getProduits()->getNomProduit(),
                'marque' => $item->getProduits()->getMarqueProduit(),
                'prix' => $item->getProduits()->getPrixProduit()
            );
        }

        $response = new Response(json_encode($listeProduitsCommandes));
        $response->headers->set('Content-Type', 'application/json');
    
        return $response;
    }
}
