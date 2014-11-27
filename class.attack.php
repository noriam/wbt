<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 26/11/14
 * Time: 15:48
 */

class attack
{
    private $_name;
    private $_dmg;
    private $_nbr;
    private $_type;
    private $_special;
    private $_range;

    public function set_name($name)
    {
        $this->_name = $name;
    }

    public function get_name()
    {
        return($this->_name);
    }

    public function set_dmg($dmg)
    {
        $this->_dmg = $dmg;
    }

    public function get_dmg()
    {
        return ($this->_dmg);
    }

    public function set_nbr($nbr)
    {
        $this->_nbr = $nbr;
    }

    public function get_nbr()
    {
        return ($this->_nbr);
    }

    public function set_type($type)
    {
        $this->_type = $type;
    }

    public function get_type()
    {
        return ($this->_type);
    }

    public function set_special($special)
    {
        $this->_special = $special;
    }

    public function get_special()
    {
        return ($this->_special);
    }

    public function set_range($range)
    {
        $this->_range = $range;
    }

    public function get_range()
    {
        return ($this->_range);
    }


}