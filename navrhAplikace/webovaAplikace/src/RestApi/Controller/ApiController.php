<?php

namespace RestApi\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use RestApi\Curves\Curves;
use RestApi\Funkcie\Funkcie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/api")
 */
class ApiController extends FOSRestController {

    /**
     *
     * @Route("/curves", name="api_all_curves")
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function sendAllCurves(Request $request){
        /** @var Curves $repository */
        $repository = $this->getAllHodnoty();
        $response = JsonResponse::create($repository, 200);
        return $response;
    }

    /**
     *
     * @Route("/functions", name="api_all_functions")
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function sentAllFunctions(Request $request){
        /** @var Funkcie $repository */
        $repository = $this->getAllFunctions();
        $response = JsonResponse::create($repository, 200);
        return $response;
    }

    /**
     * @return array
     */
    public function getAllHodnoty(){
        $allHodnoty = new Curves();
        return $allHodnoty->getHodnoty();
    }

    /** @return array */
    public function getAllFunctions(){
        $allFunctions = new Funkcie();
        return $allFunctions->getFunkcie();

    }



}
