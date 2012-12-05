<?php
class Region extends AppModel {
    public $name = 'Region';

    public $belongsTo = 'Country';
}
?>