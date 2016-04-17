<?php
    $username = $_GET['username'];
    if($username === 'yamato'){
        $ret = array('sex'=>'female','home'=>'Kure Kaigun Kosho');
    }else if($username === 'taiho'){
        $ret = array('sex'=>'female','home'=>'Kobe Kawasaki factory');
    }else if($username === 'tirpitz'){
        $ret = array('sex'=>'female','home'=>'Kriegsmarinewerft Wilhelmshaven');
    }else if($username === 'enterprise'){
        $ret = array('sex'=>'female','home'=>'Newport News Shipbuilding and Drydock Company');
    }
    echo json_encode($ret);