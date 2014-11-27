<?php
require_once('class.attack.php');
require_once('class.chara.php');

function	my_calc($chara)
{
  $power_value = $chara->get_hp()
    + $chara->get_mp() * 5
    - ($chara->get_xp() / $chara->get_level())
    - $chara->get_cost();
  foreach ($chara->get_attacks() as $attack)
    {
      if (!isset($types[$attack->get_type()]))
	{
	  $power_value += isset($type_i) ? $type_i : 0;
	  $types[$attack->get_type()] = true;
	  $type_i = isset($type_i) ? ($type_i * 2) : 5;
	}
      if (!isset($ranges[$attack->get_range()]))
	{
	  $power_value += isset($range_i) ? $range_i : 0;
	  $ranges[$attack->get_range()] = true;
	  if (!isset($range_i))
	    $range_i = 20;
	}
      $power_value += $attack->get_dmg() * $attack->get_nbr();
    }
  return ($power_value);
}
?>