<?php
require_once('class.attack.php');
require_once('class.chara.php');

function	my_calc($chara)
{
  $lvl = ($chara->get_level() > 0) ? $chara->get_level() : 1;
  $power_value = $chara->get_hp()
    + $chara->get_mp() * 3
    - ($chara->get_xp() / $lvl)
    - $chara->get_cost();
  foreach ($chara->get_attacks() as $attack)
    {
      if (!isset($types[$attack->get_type()]))
	{
	  $power_value += isset($type_i) ? $type_i : 0;
	  $types[$attack->get_type()] = true;
	  $type_i = isset($type_i) ? ($type_i * 2) : 2;
	}
      if (!isset($ranges[$attack->get_range()]))
	{
	  $power_value += isset($range_i) ? $range_i : 0;
	  $ranges[$attack->get_range()] = true;
	  if (!isset($range_i))
	    $range_i = 10;
	}
      $power_value += $attack->get_dmg() * $attack->get_nbr();
      if ($attack->get_special() != null)
      	 $power_value += 5;
    }
  return ($power_value);
}
?>