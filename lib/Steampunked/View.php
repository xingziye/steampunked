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
        $this->player1 = $this->game->getPlayer1Name();
        $this->player2 = $this->game->getPlayer2Name();
        $this->size = $this->game->getSize();

    }

    public function createGrid(){

        $this->html = <<<HTML
        <div class="container">
    <p><img src="images/title.png"></p>
    <form method="post" action="">
            <div class="game">

HTML;

        ///loop for Number X Number grid
        for ($row = 0; $row < $this->size(); $row++) {
            $this->html .= "<div class=\"row\">";
            for ($col = 0; $col < $this->size(); $col++) {
                if ($col == 0 and ($row == 0 or $row == $this->size()-2)) {
                    $this->html .= "<div class=\"cell\"><img src=\"images/valve-closed.png\"></div>";
                } else if ($col == $this->size()-1 and ($row == 1 or $row == $this->size()-1)) {
                    $this->html .= "<div class=\"cell\"><img src=\"images/gauge-0.png\"></div>";
                } else {
                    $this->html .= "<div class=\"cell\"><img src=\"\"></div>";
                }
            }
            $this->html .= "</div>";

        }

        $this->html .= "</div>";

        return $this->html;
    }



    public function createRadioButtons(){
        $html= <<<HTML
                <p class="pieces">
            <label for="radio1"><img src="images/valve-closed.png" /></label>
            <input type="radio" name="radio1" id="radio1"
            <label for="radio2"><img src="images/straight-h.png" /></label>
            <input type="radio" name="radio2" id="radio2"
            <label for="radio3"><img src="images/straight-v.png" /></label>
            <input type="radio" name="radio3" id="radio3"
            <label for="radio4"><img src="images/straight-h.png" /></label>
            <input type="radio" name="radio4" id="radio4"
            <label for="radio5"><img src="images/straight-h.png" /></label>
            <input type="radio" name="radio5" id="radio5"
        </p>
HTML;

        return $html;
    }


    public function createOptionButtons(){
        $html = <<<HTML
                <div class="options">
            <p class="option"><input type="button" name="rotate" value="Rotate"></p>
            <p class="option"><input type="button" name="discard" value="Discard"></p>
            <p class="option"><input type="button" name="open" value="Open Valve"></p>
            <p class="option"><input type="button" name="giveup" value="Give Up"></p>
        </div>
        </form>
        </div>

HTML;
        return $html;
    }

    public function startScreenButtons(){

        $html = <<<HTML
        <div class="screen">
            <p><img src="images/title.png"></p>
            <form method="post" action="game-post.php">
                <fieldset>
                    <legend>Game Preferences</legend>
                    <p>
                        <label for="player1"> Player 1 Name:</label>
                        <input type="text" name="player1" id="player1">
                    </p>
                    <br>
                    <p>
                        <label for="player2"> Player 2 Name:</label>
                        <input type="text" name="player2" id="player2">
                    </p>
                    <br>
                    <p>
                        <label for="6x6">6x6</label>
                        <input type="radio" name="gamesize" id="6" value="6">
                        <label for="10x10">10x10</label>
                        <input type="radio" name="gamesize" id="10" value="10">
                        <label for="20x20">20x20</label>
                        <input type="radio" name="gamesize" id="20" value="20">
                    </p>
                    <br>
                    <p>
                        <input type="submit" >
                    </p>
                </fieldset>
            </form>
        </div>


HTML;
        return $html;
    }

    public function player1name(){
        $this->player1 = $this->game->getPlayer1Name();
        $name = $this->player1;
        return $name;
    }

    public function player2name(){
        $this->player2 = $this->game->getPlayer2Name();
        $name = $this->player2;
        return $name;
    }

    public function size(){
        return $this->game->getSize();
    }

    private $game;
    private $player1 = "";
    private $player2 ="";
    private $size =0;
    private $html="";

}