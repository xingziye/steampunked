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
    }

    private $name;
}