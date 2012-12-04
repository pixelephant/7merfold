<?php
class Country extends AppModel {
    public $name = 'Country';

    public $hasMany = 'Trip';
}
?>