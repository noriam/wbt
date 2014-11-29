<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 26/11/14
 * Time: 11:42
 */
?>
<html>
<head>
    <?php
    require_once('class.attack.php');
    require_once('class.chara.php');
    require_once('calc.php');
    ?>
</head>
<body>
<?php
$handle = fopen("Upload/" . $_FILES["fileToUpload2"]["name"], "r");
if ($handle == false) {
    print "Error: open fail";
    exit(1);
}
$contents = fread($handle, filesize("Upload/Bat.cfg"));
if ($contents == false) {
    print "Error: read fail";
    exit(1);
}

$chara = new chara();

//Name
preg_match_all("/name= _ \"(.+)\"/", $contents, $result);
$chara->set_name($result[1][0]);

//Image
preg_match_all("/\[unit_type\].*image=\"([^\"]*)\".*profile/s", $contents, $result);
$chara->set_image($result[1][0]);

//Race
preg_match_all("/race=(\w+)/", $contents, $result);
$chara->set_race($result[1][0]);

//Hp
preg_match_all("/hitpoints=(\d+)/", $contents, $result);
$chara->set_hp($result[1][0]);

//Move
preg_match_all("/movement=(\d+)/", $contents, $result);
$chara->set_mp($result[1][0]);

//Move type
preg_match_all("/movement_type=(\w+)/", $contents, $result);
$chara->set_moveType($result[1][0]);
//Cost
preg_match_all("/cost=(\d+)/", $contents, $result);
$chara->set_cost($result[1][0]);

//Experience
preg_match_all("/experience=(\d+)/", $contents, $result);
$chara->set_xp($result[1][0]);

//Level
preg_match_all("/level=(\d+)/", $contents, $result);
$chara->set_level($result[1][0]);

//Attack
$ct = preg_match_all("/\[attack\]((?:(?!\[\/attack\]).)+)\[\/attack\]/s", $contents, $result);
$contents_attack = $result[1];
for ($i = 0; $i < $ct; ++$i) {
    $attack = new attack();

    //Name
    preg_match("/name=(\w+)/", $contents_attack[$i], $result);
    $attack->set_name($result[1]);

    //Damage
    preg_match("/damage=(\d+)/", $contents_attack[$i], $result);
    $attack->set_dmg($result[1]);

    //Number
    preg_match("/number=(\d+)/", $contents_attack[$i], $result);
    $attack->set_nbr($result[1]);

    //Type
    preg_match("/type=(\w+)/", $contents_attack[$i], $result);
    $attack->set_type($result[1]);

    //Special
    preg_match("/{WEAPON_SPECIAL_([A-Z_]*)}/", $contents_attack[$i], $result);
    $attack->set_special($result[1]);

    //Range
    preg_match("/range=(\w+)/", $contents_attack[$i], $result);
    $attack->set_range($result[1]);

    $chara->add_attack($attack);
}

if (getimagesize("images/" . $chara->get_image()) != false)
    print "<img src='images/" . $chara->get_image() . "'>";
else
    print "<img src='images/units/unknown-unit.png'>";
print "<div class='name_monster'>" . $chara->get_name() . "</div>";
print "<div class='race_monster'>" . $chara->get_race() . "</div>";

print "<div class='description_monster'>hp : " . $chara->get_hp() . "<br>";
print "movement : " . $chara->get_mp() . " " . $chara->get_moveType() . "<br>";
print "cost : " . $chara->get_cost() . "<br>";
print "experience : " . $chara->get_xp() . "<br>";
print "level : " . $chara->get_level() . "</div>";

echo "<div class='elo_monster'>Elo : " . my_calc($chara) . "</div>";
?>
<div class="atk_icon">
    <div class="attack_monster">
<?php
    $attack = $chara->get_attacks();
    foreach ($attack as $atk) {
	echo "name : " . $atk->get_name() . "<br>";
	echo "damage : " . $atk->get_dmg() . "<br>";
	echo "number : " . $atk->get_nbr() . "<br>";
	echo "type : " . $atk->get_type() . "<br>";
	if ($atk->get_special() != null) {
	   echo "special : " . $atk->get_special() . "<br>";
	}
	echo "range : " . $atk->get_range() . "<br><br>";
    }
?>
    </div>
</div>
</body>
</html>