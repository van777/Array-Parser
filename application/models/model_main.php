<?php

class Model_Main extends Model
{
	
	public function get_data()
	{
		$array = array(
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
                if(!is_array($array)) return false;
                $headers[0] = [];
                foreach($array as $arr){
                    if(!is_array($arr)) return false;
                    foreach($arr as $key => $val){
                        
                        if(!is_string($key) or !is_string($val)) return false;
                        if(!in_array($key, $headers[0])) $headers[0][] = $key;
                    }
                }
                sort($headers[0]);
                $data = array_merge($headers, $array);
		return $data;
	}

}
