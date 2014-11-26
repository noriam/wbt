<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 26/11/14
 * Time: 11:42
 */
?>
<html>
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
    $name = "Unknow";
//Image
if (preg_match_all("/\[unit_type\].*image=\"([^\"]*)\".*profile/s", $contents, $result) != false)
    $image = $result[1][0];
else
    $image = "path to basic image";
//Hp
if (preg_match_all("/hitpoints=(\d+)/", $contents, $result) != false)
    $hp = $result[1][0];
else
    $hp = "Unknow";
//Move
if (preg_match_all("/movement=(\d+)/", $contents, $result) != false)
    $move = $result[1][0];
else
    $move = "Unknow";
//Cost
if (preg_match_all("/cost=(\d+)/", $contents, $result) != false)
    $cost = $result[1][0];
else
    $cost = "Unknow";
//Experience
if (preg_match_all("/experience=(\d+)/", $contents, $result) != false)
    $xp = $result[1][0];
else
    $xp = "Unknow";
//Level
if (preg_match_all("/level=(\d+)/", $contents, $result) != false)
    $level = $result[1][0];
else
    $level = "Unknow";
//Attack
if (preg_match_all("/\[attack\](.*)\[\/attack\]/s", $contents, $result) != false)
    {
    $attack = $result[1][0];
    //Damage
    if (preg_match_all("/damage=(\d+)/", $attack, $result) != false)
        $dmg = $result[1][0];
    else
        $dmg = "Unknow";
    //Number
    if (preg_match_all("/number=(\d+)/", $attack, $result) != false)
        $nbr = $result[1][0];
    else
        $nbr = "Unknow";
    //Type
    if (preg_match_all("/type=(\w+)/", $attack, $result) != false)
        $type = $result[1][0];
    else
        $type = "Unknow";
    //Special
    if (preg_match_all("/{(WEAPON[A-Z_]*)}/", $attack, $result) != false)
        $special = $result[1][0];
    else
        $special = "Unknow";
    //Range
    if (preg_match_all("/range=(\w+)/", $attack, $result) != false)
        $range = $result[1][0];
    else
        $range = "Unknow";
    }
else
    $attack = $dmg = $nbr = $type = $special = $range = "Unknow";
?>

<div class="unit_to_compare">
    <?php
    print "name : " . $name . "<br>";
    print "image : " . $image . "<br>";
    print "hp : " . $hp . "<br>";
    print "movement : " . $move . "<br>";
    print "cost : " . $cost . "<br>";
    print "experience : " . $xp . "<br>";
    print "level : " . $level . "<br>";
    print "damage : " . $dmg . "<br>";
    print "number : " . $nbr . "<br>";
    print "type : " . $type . "<br>";
    print "special attack : " . $special . "<br>";
    print "range : " . $range . "<br>";
    ?>
</div>
</body>
</html>