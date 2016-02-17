<?php
/**
 * Created by PhpStorm.
 * User: xingziye
 * Date: 2/12/16
 * Time: 1:55 PM
 */

namespace Steampunked;


class View
{
    /**
     * Constructor
     * @param Steampunked $steampunked The Steakmpunked game object
     */
    public function __construct(Steampunked $steampunked) {
        $this->game = $steampunked;
    }

    public function createGrid(){
        $html = <<<HTML

HTML;
        return $html;
    }

    public function createButtons(){
        $html = <<<HTML

HTML;
        return $html;
    }

    public function startScreenButtons(){
        $html = <<<HTML

HTML;
        return $html;
    }

    public function numRows(){
        return $this->rows;
    }

    public function numCols(){
        return $this->columns;
    }

    public function radioButtons(){
        return $this->radio;
    }

    private $radio;
    private $rows;
    private $columns;
    private $game;

}