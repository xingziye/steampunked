<?php
/**
 * Created by PhpStorm.
 * User: xingziye
 * Date: 2/12/16
 * Time: 1:55 PM
 */

namespace Steampunked;


class Controller
{
    public function __construct(Steampunked $Steampunked){
        $this->Steampunked=$Steampunked;
        $this->reset=true;
}
    public function move($ndx)
    {
        if($ndx>0){
            return;
        }
    }
    private function post($ndx){

        if($ndx>0){
            return $_POST;
        }
        else{
            $this->rest=true;
        }
        return;
    }
    public function getPage(){
        return $this->page;
    }
    public function isReset(){
        return $this->reset;
    }
    private $page = 'game.php';     // The next page we will go to
    private $reset = false;         // True if we need to reset the game
    private $Steampunked;
}