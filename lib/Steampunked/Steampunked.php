<?php
/**
 * Created by PhpStorm.
 * User: xingziye
 * Date: 2/12/16
 * Time: 1:54 PM
 */

namespace Steampunked;


class Steampunked
{
    /**
     * Constructor
     */
    public function __construct($seed = null)
    {
        if ($seed === null) {
            $seed = time();
        }

        srand($seed);
    }

    public function createGame($size, $player0, $player1)
    {
        $this->size = $size;
        $this->players = array();
        $this->players[] = $player0;
        $this->players[] = $player1;
        $this->player1name = $player0;
        $this->player2name = $player1;
    }

    public function getPlayer($ndx)
    {
        if ($ndx >= 0 and $ndx < 2) {
            return $this->players[$ndx];
        } else {
            return null;
        }
    }

    public function nextTurn()
    {
        $this->turn++;
        $this->turn %= 2;
    }

    /**
     * @return int
     */
    public function getTurn()
    {
        return $this->turn;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    public function getPlayer1Name(){
        return $this->player1name;
    }

    public function getPlayer2Name(){
        return $this->player2name;
    }


    public function setPlayer1($name){
        $this->player1name = $name;
    }

    public function setPlayer2($name){
        $this->player2name = $name;
    }

    public function setSize($size){
        $this->size = $size;
    }

    public function gaveUp(){

        $this->gaveup = true;
    }

    public function getGaveUp(){
        return $this->gaveup;

    }

    private $size = 0;
    private $players = array();
    private $turn = 0;
    private $player1name ="" ;
    private $player2name ="" ;
    private $gaveup = false;

}