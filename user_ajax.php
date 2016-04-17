<?php
    $username = $_GET['username'];
    if($username === 'Yamato'){
        $ret = array('sex'=>'female','location'=>'Kure Kaigun Kosho');
    }else if($username === 'Taiho'){
        $ret = array('sex'=>'female','location'=>'Kobe Kawasaki factory');
    }else if($username === 'Tirpitz'){
        $ret = array('sex'=>'female','location'=>'Kriegsmarinewerft Wilhelmshaven');
    }else if($username === 'Enterprise'){
        $ret = array('sex'=>'female','location'=>'Newport News Shipbuilding and Drydock Company');
    }
    echo json_encode($ret);