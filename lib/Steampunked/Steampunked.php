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
        $this->pipes = array();
        for ($row = 0; $row < $size; $row++) {
            $this->pipes[] = array();
            for ($col = 0; $col < $size; $col++) {
                $this->pipes[$row][] = null;
            }
        }

        $this->players = array();
        $this->players[] = $player0;
        $this->players[] = $player1;

        $this->valves = array();
        for ($row = 0; $row < $size; $row++) {
            if ($row == $size/2 - 3) {
                $this->valves[] = new Tile(Tile::VALVE_CLOSE, $player0);
                $this->pipes[$row][0] = new Tile(Tile::LEAK, $player0);
                $this->pipes[$row][0]->setNeighbor($this->valves[$row], "W");
            } elseif ($row == $size/2 + 2) {
                $this->valves[] = new Tile(Tile::VALVE_CLOSE, $player1);
                $this->pipes[$row][0] = new Tile(Tile::LEAK, $player1);
                $this->pipes[$row][0]->setNeighbor($this->valves[$row], "W");
            } else {
                $this->valves[] = null;
            }
        }

        $this->gauges = array();
        for ($row = 0; $row < $size; $row++) {
            if ($row == $size/2 - 3) {
                $this->gauges[] = new Tile(Tile::GAUGE_TOP0, $player0);
            } elseif ($row == $size/2) {
                $this->gauges[] = new Tile(Tile::GAUGE_TOP0, $player1);
            } elseif ($row == $size/2 - 2) {
                $this->gauges[] = new Tile(Tile::GAUGE0, $player0);
            } elseif ($row == $size/2 + 1) {
                $this->gauges[] = new Tile(Tile::GAUGE0, $player1);
            } else {
                $this->gauges[] = null;
            }
        }
    }

    public function addPipe($pipe, $row, $col) {
        // Pipe has to be added on the leak tile
        if ($this->pipes[$row][$col]->getType() != Tile::LEAK) {
                return;
        }

        // Check the open matches leak's neighbors
        $open = $pipe->open();
        foreach(array("N", "W", "S", "E") as $direction) {
            $n = $this->pipes[$row][$col]->neighbor($direction);
            if ($n === null) {
                if ($open[$direction] == true)
                    return;
            } else {
                if ($open[$direction] == false)
                    return;
            }
        }

        $this->pipes[$row][$col] = $pipe;
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
        return count($this->pipes);
    }

    private $pipes = array();
    private $valves = array();
    private $gauges = array();
    private $players = array();
    private $turn = 0;
}