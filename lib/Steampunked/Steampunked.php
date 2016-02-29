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
    const WIN = 0;
    const LOSE = 1;
    const SUCCESS = 2;
    const FAILURE = 3;

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
                $this->valves[] = new Tile(Tile::VALVE_CLOSE, 0);
                $this->pipes[$row][0] = new Tile(Tile::LEAK, 0);
                $this->pipes[$row][0]->setNeighbor($this->valves[$row], "W");
            } elseif ($row == $size/2 + 2) {
                $this->valves[] = new Tile(Tile::VALVE_CLOSE, 1);
                $this->pipes[$row][0] = new Tile(Tile::LEAK, 1);
                $this->pipes[$row][0]->setNeighbor($this->valves[$row], "W");
            } else {
                $this->valves[] = null;
            }
        }

        $this->gauges = array();
        for ($row = 0; $row < $size; $row++) {
            if ($row == $size/2 - 3) {
                $this->gauges[] = new Tile(Tile::GAUGE_TOP0, 0);
            } elseif ($row == $size/2) {
                $this->gauges[] = new Tile(Tile::GAUGE_TOP0, 1);
            } elseif ($row == $size/2 - 2) {
                $this->gauges[] = new Tile(Tile::GAUGE0, 0);
            } elseif ($row == $size/2 + 1) {
                $this->gauges[] = new Tile(Tile::GAUGE0, 1);
            } else {
                $this->gauges[] = null;
            }
        }
    }

    public function check($pipe, $row, $col) {
        // Check the open matches leak's neighbors
        $open = $pipe->open();
        foreach(array("N", "W", "S", "E") as $direction) {
            $n = $this->pipes[$row][$col]->neighbor($direction);
            if (!is_null($n)) {
                // If there is a neighbor, and its id matches this turn, open should be true
                if ($n->getId() == $this->getTurn()) {
                    if($open[$direction] == false) {
                        return false;
                    }
                } else {
                    if ($open[$direction] == true) {
                        return false;
                    }
                }
            }
        }

        // Otherwise, return true;
        return true;
    }

    /**
     * @param Tile $pipe
     * @param int $row
     * @param int $col
     * @return const int
     */
    public function addPipe($pipe, $row, $col) {
        if ($this->check($pipe, $row, $col)) {
            $leak = $this->pipes[$row][$col];
            $this->setPipe($pipe, $row, $col);
            $open = $pipe->open();
            foreach(array("N", "W", "S", "E") as $direction) {
                if ($leak->neighbor($direction)) {
                    $pipe->setNeighbor($leak->neighbor($direction), $direction);
                } elseif ($open[$direction]) {
                    if (($direction == "N" and $row == 0)
                    or ($direction == "W" and $col ==0)
                    or ($direction == "S" and $row == $this->getSize() - 1)
                    or ($direction == "E" and $col == $this->getSize() - 1)) {
                        return Steampunked::LOSE;
                    }
                    $newLeak = new Tile(Tile::LEAK, $this->getTurn());
                    if ($direction == "N") {
                        $newLeak->setNeighbor($pipe, "S");
                        $this->pipes[$row-1][$col] = $newLeak;
                    } elseif ($direction == "W") {
                        $newLeak->setNeighbor($pipe, "E");
                        $this->pipes[$row][$col-1] = $newLeak;
                    } elseif ($direction == "S") {
                        $newLeak->setNeighbor($pipe, "N");
                        $this->pipes[$row+1][$col] = $newLeak;
                    } else {
                        $newLeak->setNeighbor($pipe, "W");
                        $this->pipes[$row][$col+1] = $newLeak;
                    }
                }
            }
            return Steampunked::SUCCESS;
        }
        return Steampunked::FAILURE;
    }

    private function setPipe($pipe, $row, $col) {
        $this->pipes[$row][$col] = $pipe;
    }

    public function getPipe($row, $col) {
        return $this->pipes[$row][$col];
    }

    public function getValves()
    {
        return $this->valves;
    }

    public function getGauges()
    {
        return $this->gauges;
    }

    /**
     * @param int
     * @return Player
     */
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