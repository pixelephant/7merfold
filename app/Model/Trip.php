<?php
class Trip extends AppModel {
    public $name = 'Trip';

    public $order = 'Trip.star_rating DESC, Trip.name ASC';

    public $belongsTo = array('Country', 'Region', 'Category', 'Continent');

    public $hasMany = array('Program','Hotel','Map','Sight');

    // public $hasAndBelongsToMany = array(
    //     'Sight' =>
    //         array(
    //             'className'              => 'Sight',
    //             'joinTable'              => 'sights_trips',
    //             'foreignKey'             => 'trip_id',
    //             'associationForeignKey'  => 'sight_id',
    //             'unique'                 => true,
    //         )
    // );

    // public $validate = array(
    //     'name' => array(
    //         'rule' => 'notEmpty',
    //         'required'   => true,
    //         'message'    => 'Kötelező megadni'
    //     ),
    //     'description' => array(
    //         'rule' => 'notEmpty',
    //         'required'   => true,
    //         'message'    => 'Kötelező megadni'
    //     ),
    //     'short_description' => array(
    //         'rule' => 'notEmpty',
    //         'required'   => true,
    //         'message'    => 'Kötelező megadni'
    //     ),
    //     'country_id' => array(
    //         'rule' => 'notEmpty',
    //         'required'   => true,
    //         'message'    => 'Kötelező megadni'
    //     ),
    //     'category_id' => array(
    //         'rule' => 'notEmpty',
    //         'required'   => true,
    //         'message'    => 'Kötelező megadni'
    //     ),
    //     'image_file' => array(
    //         'rule' => 'notEmpty',
    //         'required'   => true,
    //         'message'    => 'Kötelező megadni',
    //         'on' => 'create'
    //     ),
    //     'circle_image_file' => array(
    //         'rule' => 'notEmpty',
    //         'required'   => true,
    //         'message'    => 'Kötelező megadni',
    //         'on' => 'create'
    //     )
    // );

}
?>