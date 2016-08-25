<?php

require_once 'ConsoleTable.php';

if ($data) {
    echo '<pre>';
    $table = new ConsoleTable();
    $headers = $data[0];
    $array = array_slice($data, 1);
    foreach($headers as $header) $table->addHeader($header);
    foreach($array as $arr){
        $table->addRow();
        foreach($headers as $header){
            $table->addColumn(array_key_exists($header, $arr) ? $arr[$header] : ' ');
        }
    }
    $table->display();
    echo '</pre>';
} else {
    echo 'Wrong format of data. The array should consist of associative arrays:';
    echo '<pre>';
    echo <<<END
array(
    	array(
        	'House' => 'Baratheon',
                'Sigil' => 'A crowned stag',
	        'Motto' => 'Ours is the Fury',
        ),
    	array(
                'Leader' => 'Eddard Stark',
       		'House' => 'Stark',
		'Motto' => 'Winter is Coming',
        	'Sigil' => 'A grey direwolf'
        ),
    	array(
        	'House' => 'Lannister',
                'Leader' => 'Tywin Lannister',
        	'Sigil' => 'A golden lion'
        ),
    	array(
	      	'Q' => 'Z'
        )
);
END;
    echo '</pre>';
}
