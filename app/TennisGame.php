<?php
namespace App;

class TennisGame
{

  private $p1_score = 0;
  private $p2_score = 0;

  public function firstPlayerScore()
  {
    $this->p1_score ++;
  }
  
  public function secondPlayerScore()
  {
    $this->p2_score ++;
  }

  public function Score()
  {

    $scoreLookup = [0 => 'Love', 1 => 'Fifteen', 2 => 'Thirty', 3 => 'Forty'];
    
    if ($this->p1_score == $this->p2_score) {
      if ($this->p1_score >= 3) {
        return 'Duece';
      }
      return $scoreLookup[$this->p1_score] . '-All';
    }

    if (max($this->p1_score, $this->p2_score) >= 4) {
      $adv = $this->p1_score > $this->p2_score ? 'Player1' : 'Player2';
      $score_diff = abs($this->p1_score - $this->p2_score);
      
      if ($score_diff == 1) {
        return 'Advantage ' . $adv;
      } else if ($score_diff == 2) {
        return 'Win for ' . $adv;
      }
    }

    return $scoreLookup[$this->p1_score] . '-' . $scoreLookup[$this->p2_score];

  }

}