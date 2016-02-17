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
    public function __construct()
    {
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

    private $flag = false;
}