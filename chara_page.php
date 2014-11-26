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
preg_match_all("/name= _ \"(.+)\"/", $contents, $result);
$name = $result[1][0];
//Image
preg_match_all("/\[unit_type\].*image=\"([^\"]*)\".*profile/s", $contents, $result);
$image = $result[1][0];
//Hp
preg_match_all("/hitpoints=(\d+)/", $contents, $result);
$hp = $result[1][0];
//Move
preg_match_all("/movement=(\d+)/", $contents, $result);
$move = $result[1][0];
//Cost
preg_match_all("/cost=(\d+)/", $contents, $result);
$cost = $result[1][0];
//Experience
preg_match_all("/experience=(\d+)/", $contents, $result);
$xp = $result[1][0];
//Level
preg_match_all("/level=(\d+)/", $contents, $result);
$level = $result[1][0];
//Damage
preg_match_all("/damage=(\d+)/", $contents, $result);
$dmg = $result[1][0];
//Number
preg_match_all("/number=(\d+)/", $contents, $result);
$nbr = $result[1][0];
//Type
preg_match_all("/type=(\w+)/", $contents, $result);
$type = $result[1][0];
//Special
preg_match_all("/{(WEAPON[A-Z_]*)}/", $contents, $result);
$special = $result[1][0];
//Range
preg_match_all("/range=(\w+)/", $contents, $result);
$range = $result[1][0];
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