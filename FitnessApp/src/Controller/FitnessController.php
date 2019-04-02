<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FitnessController extends AbstractController
{
    /**
     * @Route("/fitness", name="fitness")
     */
    public function index()
    {
        return $this->render('fitness/fitness.html.php', [
            'controller_name' => 'FitnessController',
        ]);

        /*
        return $this->render('fitness/index.html.twig', [
            'controller_name' => 'FitnessController',
        ]);
        */
    }

    /*
    public function product(Request $action) {
    	if ($request->isXmlHttpRequest()) {
    		
    	}
    }

    public function category(Request $action) {
    	if ($request->isXmlHttpRequest()) {
    		
    	}
    }

    public function subCategory(Request $action) {
    	// https://www.tutorialspoint.com/symfony/symfony_ajax_control.htm
    	// https://symfony.com/doc/current/templating/PHP.html

    	Enabling the php and twig template engines simultaneously is allowed, but it will produce an undesirable side effect in your application: the @ notation for Twig namespaces will no longer be supported for the render() method:
    	
    	$data = $request->request->get('action');
    	if ($request->isXmlHttpRequest()) {
			
			$jsonData = array();  
			$idx = 0;  

			foreach($students as $student) {
				$temp = array(
					'name' => $student->getName(),  
					'address' => $student->getAddress(),  
				);   
				
				$jsonData[$idx++] = $temp;  
			}

			return new JsonResponse($jsonData);
			
    	}	
    }
    */
}
