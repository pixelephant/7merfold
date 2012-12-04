<?php
class Sight extends AppModel {
    public $name = 'Sight';

    public $hasAndBelongsToMany = array(
        'Trip' =>
            array(
                'className'              => 'Trip',
                'joinTable'              => 'sights_trips',
                'foreignKey'             => 'sight_id',
                'associationForeignKey'  => 'trip_id',
                'unique'                 => true,
            )
    );
}
?>