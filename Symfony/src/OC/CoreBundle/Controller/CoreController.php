<?php

namespace OC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends Controller
{
    //action de la page d'accueil
    public function indexAction()
    {
        // Notre liste d'annonce en dur
        // A Remplacer par une récupération dynamique des 3 dernières annonces en base de données par exemple
        $listAdverts = array(
          array(
            'title'   => 'Recherche développpeur Symfony2',
            'id'      => 1,
            'author'  => 'Alexandre',
            'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
            'date'    => new \Datetime()),
          array(
            'title'   => 'Mission de webmaster',
            'id'      => 2,
            'author'  => 'Hugo',
            'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
            'date'    => new \Datetime()),
          array(
            'title'   => 'Offre de stage webdesigner',
            'id'      => 3,
            'author'  => 'Mathieu',
            'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
            'date'    => new \Datetime())
        );
        
        return $this->render('OCCoreBundle:Core:index.html.twig', array(
        'listAdverts' => $listAdverts
        ));
    }
    
    //page de contact
    public function contactAction(Request $request)
    {
        //ici un jour un formulaire de contact
        
        //ajout du message flash
        $session = $request->getSession();
        $session->getFlashBag()->add('info', 'La page de contact n\'est pas encore disponible, merci de revenir plus tard');
        
        //redirection vers la page accueil
        $url = $this->get('router')->generate('oc_core_homepage');
        return $this->redirect($url);   
    }
    
}
