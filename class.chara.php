<?php
// class.chara.php for wbt in /home/melot_g/Working/wbt
// 
// Made by MELOT Gautier
// Login   <melot_g@etna-alternance.net>
// 
// Started on  Thu Nov 27 12:39:34 2014 MELOT Gautier
// Last update Thu Nov 27 12:49:33 2014 MELOT Gautier
//

class	chara
{
  private	$_name;
  private	$_image;
  private   $_race;
  private	$_hp;
  private	$_mp;
  private	$_cost;
  private	$_xp;
  private	$_level;
  private	$_moveType;
  private	$_resistances;
  private	$_defenses;
  private	$_attacks;
  private	$_nbAtk;

  public function	__construct()
  {
    $this->_nbAtk = 0;
  }
  
  public function	set_name($name)
  {
    $this->_name = $name;
  }

  public function	get_name()
  {
    return ($this->_name);
  }

  public function	set_image($image)
  {
    $this->_image = $image;
  }

  public function	get_image()
  {
    return ($this->_image);
  }

  public function set_race($race)
  {
      $this->_race = $race;
  }

  public function get_race()
  {
      return ($this->_race);
  }

  public function	set_hp($hp)
  {
    $this->_hp = $hp;
  }

  public function	get_hp()
  {
    return ($this->_hp);
  }

  public function	set_mp($mp)
  {
    $this->_mp = $mp;
  }

  public function	get_mp()
  {
    return ($this->_mp);
  }

  public function	set_cost($cost)
  {
    $this->_cost = $cost;
  }

  public function	get_cost()
  {
    return ($this->_cost);
  }

  public function	set_xp($xp)
  {
    $this->_xp = $xp;
  }

  public function	get_xp()
  {
    return ($this->_xp);
  }

  public function	set_level($level)
  {
    $this->_level = $level;
  }

  public function	get_level()
  {
    return ($this->_level);
  }

  public function	set_moveType($moveType)
  {
    $this->_moveType = $moveType;
  }

  public function	get_moveType()
  {
    return ($this->_moveType);
  }

  public function	add_attack($attack)
  {
    $this->_attacks[$this->_nbAtk++] = $attack;
  }

  public function	get_attacks()
  {
    return ($this->_attacks);
  }

  public function	get_nbAtk()
  {
    return ($this->_nbAtk);
  }
}
