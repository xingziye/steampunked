<?php
/**
 * Created by PhpStorm.
 * User: xingziye
 * Date: 2/15/16
 * Time: 6:18 PM
 */

namespace Steampunked;


class Player
{
    public function __construct($name)
    {
        $this->name = $name;

        for ($i = 0; $i < 5; $i++) {
            $this->selections[] = new Tile(Tile::PIPE, $this);
        }
    }

    public function getName()
    {
        return $this->name;
    }

    private $name;
    private $selections;
}