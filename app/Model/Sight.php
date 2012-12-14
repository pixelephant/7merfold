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

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'required'   => true,
            'message'    => 'Kötelező megadni'
        ),
        'image_file' => array(
            'rule' => 'notEmpty',
            'required'   => true,
            'message'    => 'Kötelező megadni',
            'on' => 'create'
        )
    );
}
?>