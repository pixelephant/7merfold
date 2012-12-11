<?php
class Trip extends AppModel {
    public $name = 'Trip';

    public $belongsTo = array('Country', 'Region');

    public $hasMany = array('Program','Hotel');

    public $hasAndBelongsToMany = array(
        'Sight' =>
            array(
                'className'              => 'Sight',
                'joinTable'              => 'sights_trips',
                'foreignKey'             => 'trip_id',
                'associationForeignKey'  => 'sight_id',
                'unique'                 => true,
            )
    );

}
?>