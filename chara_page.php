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
    ?>
</head>
<body>
<?php
$handle = fopen("Upload/Bat.cfg", "r");
if ($handle == false) {
    print "Error: open fail";
    exit(1);
}
$contents = fread($handle, filesize("Upload/Bat.cfg"));
if ($contents == false) {
    print "Error: read fail";
    exit(1);
}

//Name
if (preg_match_all("/name= _ \"(.+)\"/", $contents, $result) != false)
    $name = $result[1][0];
else
    $name = "None";
//Image
if (preg_match_all("/\[unit_type\].*image=\"([^\"]*)\".*profile/s", $contents, $result) != false)
    $image = $result[1][0];
else
    $image = "path to basic image";
//Hp
if (preg_match_all("/hitpoints=(\d+)/", $contents, $result) != false)
    $hp = $result[1][0];
else
    $hp = "None";
//Move
if (preg_match_all("/movement=(\d+)/", $contents, $result) != false)
    $move = $result[1][0];
else
    $move = "None";
//Cost
if (preg_match_all("/cost=(\d+)/", $contents, $result) != false)
    $cost = $result[1][0];
else
    $cost = "None";
//Experience
if (preg_match_all("/experience=(\d+)/", $contents, $result) != false)
    $xp = $result[1][0];
else
    $xp = "None";
//Level
if (preg_match_all("/level=(\d+)/", $contents, $result) != false)
    $level = $result[1][0];
else
    $level = "None";
//Attack
preg_match_all("/\[attack\](.*)\[\/attack\]/s", $contents, $result);
$contents_attack = $result[0][0];
for ($i = 0; $i < preg_match_all("/damage=(\d+)/", $contents_attack, $result); $i++)
{
    $attack[$i] = new attack();
    //Name
    preg_match_all("/name=(\w+)/", $contents_attack, $result);
    $attack[$i]->set_name($result[1][$i]);
    //Damage
    preg_match_all("/damage=(\d+)/", $contents_attack, $result);
    $attack[$i]->set_dmg($result[1][$i]);
    //Number
    preg_match_all("/number=(\d+)/", $contents_attack, $result);
    $attack[$i]->set_nbr($result[1][$i]);
    //Type
    preg_match_all("/type=(\w+)/", $contents_attack, $result);
    $attack[$i]->set_type($result[1][$i]);
    //Special
    preg_match_all("/{(WEAPON[A-Z_]*)}/", $contents_attack, $result);
    $attack[$i]->set_special($result[1][$i]);
    //Range
    preg_match_all("/range=(\w+)/", $contents_attack, $result);
    $attack[$i]->set_range($result[1][$i]);
}
print "name : " . $name . "<br>";
print "image : " . $image . "<br>";
print "hp : " . $hp . "<br>";
print "movement : " . $move . "<br>";
print "cost : " . $cost . "<br>";
print "experience : " . $xp . "<br>";
print "level : " . $level . "<br>";

echo "<br>";

foreach ($attack as $atk)
{
    echo "name : " . $atk->get_name() . "<br>";
}

echo "<br>";

foreach ($attack as $atk)
{
    echo "damage : " . $atk->get_dmg() . "<br>";
}

?>
</body>
</html>