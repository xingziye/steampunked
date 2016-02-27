<?php
/**
 * Created by PhpStorm.
 * User: xingziye
 * Date: 2/15/16
 * Time: 6:07 PM
 */

namespace Steampunked;


class Tile
{
    const PIPE = 0;
    const LEAK = 1;
    const VALVE_CLOSE = 2;
    const VALVE_OPEN = 3;
    const GAUGE0 = 4;
    const GAUGE190 = 5;
    const GAUGE_TOP0 = 6;
    const GAUGE_TOP190 = 7;

    public function __construct($type, $player, $seed = null)
    {
        $this->type = $type;

        if ($type == Tile::PIPE) {
            $this->open["N"] = (bool)rand(0,1);
            $this->open["E"] = (bool)rand(0,1);
            $this->open["S"] = (bool)rand(0,1);
            $this->open["W"] = (bool)rand(0,1);
        } elseif ($type == Tile::VALVE_CLOSE) {
            $this->open = array("N"=>false, "E"=>true, "S"=>false, "W"=>false);
        }
    }

    public function rotate() {
        if ($this->type != Tile::PIPE) {
            return;
        }

        $temp = $this->open["N"];
        $this->open["N"] = $this->open["W"];
        $this->open["W"] = $this->open["S"];
        $this->open["S"] = $this->open["E"];
        $this->open["E"] = $temp;
    }

    public function indicateLeaks() {

        if($this->flag) {
            // Already visited
            return array();
        }

        $this->flag = true;

        $open = $this->open();
        foreach(array("N", "W", "S", "E") as $direction) {
            // Are we open in this direction?
            if($open[$direction]) {
                $n = $this->neighbor($direction);
                if($n === null) {
                    // We have a leak in this direction...



                } else {
                    // Recurse
                    $n->indicateLeaks();
                }

            }
        }

    }

    /**
     * @return boolean
     */
    public function isFlag()
    {
        return $this->flag;
    }

    /**
     * @param boolean $flag
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

    public function setNeighbor($neighbor, $direction)
    {
        $this->neighbors[$direction] = $neighbor;
    }

    public function neighbor($direction)
    {
        if (array_key_exists($direction, $this->neighbors)) {
            return $this->neighbors[$direction];
        }
    }

    public function open()
    {
        return $this->open;
    }

    public function getType()
    {
        return $this->type;
    }

    private $type;
    private $flag = false;
    private $open = array();
    private $neighbors = array();
}