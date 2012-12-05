<?php
class Country extends AppModel {
    public $name = 'Country';

    public $hasMany = array('Trip', 'Region');
}
?>