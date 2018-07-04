<?php
namespace Plot\plotOperations;

use MathPHP\Statistics\Average;

class FirstPlot{

    /** @var  integer */
    private $movingWindow;

    /** @var  integer */
    private $noise;


    /** @return string
     *  string $option
     */
    function getData($option){
        $uri = "http://localhost:3000/".$option;
        $response = \Httpful\Request::get($uri)->send();
        $data = json_decode($response, true);
        $x = $data[0]->x;
        $y = $data[0]->y;

        return "x: [" . implode(", ", $x) ."], y: [". implode(", ", $y) . "],";
    }

    /** @return string
     *  string $item
     */
    function getSinusData($item){

        switch ($item){
            case "clear":
                $uri = "http://localhost:3000/sinus";
                $response2 = \Httpful\Request::get($uri)->send();
                $data = json_decode($response2);
                $x2 = $data[0]->x;
                $y2 = $data[0]->y;
                return "x: [" . implode(", ", $x2) ."], y: [". implode(", ", $y2) . "],";
                break;
            case "noise":
                $uri = "http://localhost:3000/sinus";
                $response2 = \Httpful\Request::get($uri)->send();
                $data = json_decode($response2);
                $x2 = $data[0]->x;
                $y = $data[0]->y;
                $y2 = [];
                $maxS = max($y);
                $noiseDb = $maxS/(10^($this->getNoise()/10));
                foreach ($y as $y3) {
                    $y2[] = $y3 + rand(-$noiseDb, $noiseDb);
                }

                return "x: [" . implode(", ", $x2) ."], y: [". implode(", ", $y2) . "],";
                break;
            case "movingAverage":
                $uri = "http://localhost:3000/sinus";
                $response2 = \Httpful\Request::get($uri)->send();
                $data = json_decode($response2);
                $x2 = $data[0]->x;
                $y2 = $data[0]->y;
                $SMA = Average::simpleMovingAverage($y2, $this->movingWindow);
                return "x: [" . implode(", ", $x2) ."], y: [". implode(", ", $SMA) . "],";
                break;

        }
    }

    /** @return string
     *  string $item*/
    function getTriangleData($item){

        switch ($item){
            case "clear":
                $uri = "http://localhost:3000/triangle";
                $response2 = \Httpful\Request::get($uri)->send();
                $data = json_decode($response2);
                $x2 = $data[0]->x;
                $y2 = $data[0]->y;
                return "x: [" . implode(", ", $x2) ."], y: [". implode(", ", $y2) . "],";
                break;
            case "noise":
                $uri = "http://localhost:3000/triangle";
                $response2 = \Httpful\Request::get($uri)->send();
                $data = json_decode($response2);
                $x2 = $data[0]->x;
                $y = $data[0]->y;
                $y2 = [];
                $maxS = max($y);
                $noiseDb = $maxS/(10^($this->getNoise()/10));
                foreach ($y as $y3) {
                    $y2[] = $y3 + rand(-$noiseDb, $noiseDb);
                }

                return "x: [" . implode(", ", $x2) ."], y: [". implode(", ", $y2) . "],";
                break;
            case "movingAverage":
                $uri = "http://localhost:3000/triangle";
                $response2 = \Httpful\Request::get($uri)->send();
                $data = json_decode($response2);
                $x2 = $data[0]->x;
                $y2 = $data[0]->y;
                $SMA = Average::simpleMovingAverage($y2, $this->movingWindow);
                return "x: [" . implode(", ", $x2) ."], y: [". implode(", ", $SMA) . "],";
                break;
        }
    }

    //==========================================
    //===============set/get====================
    //==========================================


    /**
     * @return integer
     */
    public function getNoise(){
        return $this->noise;
    }

    /**
     * @param integer $noise
     */
    public function setNoise($noise) {
        $this->noise = $noise;
    }

    /**
     * @return int
     */
    public function getMovingWindow(){
        return $this->movingWindow;
    }

    /**
     * @param int $movingWindow
     */
    public function setMovingWindow($movingWindow) {
        $this->movingWindow = $movingWindow;
    }




}