<?php
class Hotel extends AppModel {
    public $name = 'Hotel';

    public $belongsTo = 'Trip';
}
?>