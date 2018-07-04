<?php
namespace Plot\Entity;

class ChoosenData{

    /** @var  integer */
    protected $movingWindow;


    /** @var  integer */
    protected $noiseDb;

    /** @var  [] $choices */
    protected $choices;

    /** @var  integer $choosenData */
    protected $choosenData;

    //=======================================
    //==============get/set=================
    //======================================

    /**
     * @return int
     */
    public function getChoosenData(){
    return $this->choosenData;
    }

    /**
     * @param int $choosenData
     */
    public function setChoosenData($choosenData) {
        $this->choosenData = $choosenData;
    }

    /**
     * @return mixed
     */
    public function getChoices(){
        return $this->choices;
    }

     /**
     * @param mixed $choices
     */
    public function setChoices($choices) {
        $this->choices = $choices;
    }

    /**
     * @return int
     */
    public function getNoiseDb(){
        return $this->noiseDb;
    }

    /**
     * @param int $noiseDb
     */
    public function setNoiseDb($noiseDb) {
        $this->noiseDb = $noiseDb;
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