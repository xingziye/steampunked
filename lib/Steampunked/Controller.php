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
    public function __construct(Steampunked $steampunked, $post) {
        $this->steampunked = $steampunked;

        if (isset($post['player1']) and isset($post['player2']) and isset($post['gamesize'])) {
            $player0 = new Player(strip_tags($post['player1']));
            $player1 = new Player(strip_tags($post['player2']));
            $this->steampunked->createGame(strip_tags($post['gamesize']), $player0, $player1);
        }

        if(isset($post['add'])){
            $this->action='add';
            $this->addimage($post['add']);
        }
        else if(isset($post['rotate'])){
            $this->action='rotate';
            $this->rotate($post['rotate']);
        }
        else if(isset($post['discard'])){
            $this->action='discard';
            $this->discard($post['discard']);
        }
        else if(isset($post['giveup'])){
            $this->page = 'index.php';
        }
    }

    public function addimage($image,$row,$colum){
        $this->action='add';
        $this->move();
    }
    public function rotate($image){
        $this->action='rotate';
        $this->move();
    }
    public function discard(){
        $this->action='discard';
        $this->move();
    }
    public function move()
    {
        if($this->action='giveup'){
            $this->action=null;
            $this->image=null;
            $this->page='win.php';
            //make it win no matter win or lose
        }
        else if($this->action == 'add')
        {
            //check if adding piece wins
            //if(piece placed wins game){$this->page = win.php;}
            //change players
            $this->page = 'Steampunked.php';
        }

        else if($this->action == 'rotate')
        {
            $this->page = 'Steampunked.php';
        }

        else if($this->action == 'discard')
        {
            $this->piece = null;
            //change players
            $this->page = 'Steampunked.php';
        }

    }

    public function getPage(){
        return $this->page;
    }
    public function isReset(){
        return $this->reset;
    }
    public function getAction()
    {
        return $this->action;
    }

    public function getImage()
    {
        return $this->image;
    }
    private $page = 'game.php';     // The next page we will go to
    private $image;
    private $steampunked;
    private $action;
    private $reset = false;
}