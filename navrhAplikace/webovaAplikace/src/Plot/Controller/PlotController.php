<?php
namespace Plot\Controller;

use Plot\Entity\ChooseDataData;
use Plot\Entity\ChoosenData;
use Plot\Form\ChooseDataForm;
use Plot\Form\ChoosenForm;
use Plot\plotOperations\FirstPlot;
use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\HttpKernel\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * @Route("/plot", name="plot",
 *
 * )
 */
class PlotController extends Controller {

    /**
     * @Route("/plot", name="plot_display")
     * @Template()
     *
     *  @param Request $request
     * @return array | RedirectResponse
     */
    public function plotAction(Request $request){
            $name = [];
            $item = "nic";
            $plot = new FirstPlot();


//========================================================================================
//=============================chooseGraphData============================================
//========================================================================================

        $choosenData = new ChoosenData();
        $uri = "http://localhost:3000/available_functions";
        $response1 = \Httpful\Request::get($uri)->send();
        $data = json_decode($response1, true);
        foreach ($data as $value => $key){
                $name[] = $key["name"];
                }
        $names = array_flip($name);
        $choosenData->setChoices($names);
        $choosenForm = $this->createForm(ChoosenForm::class, $choosenData);
        $choosenForm->handleRequest($request);
        if ($choosenForm->isSubmitted() && $choosenForm->isValid()){
            $choosenOptions = $choosenData->getChoosenData();
            if ($choosenOptions === 0){
                $noisedB = $choosenData->getNoiseDb();
                $plot->setNoise($noisedB);
                $item = "noise";
            }
            elseif ($choosenOptions === null){
                $item = "clear";
            }
            elseif ($choosenOptions === 1) {
                $plot->setMovingWindow($choosenData->getMovingWindow());
                $item = "movingAverage";
            }
        }

        return [
            'firstPlot'         => $plot,
            'choosenForm'       => $choosenForm->createView(),
            'Item'              => $item
        ];
    }
}