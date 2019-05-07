<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Status extends Model
{
    protected $table = 'status';

    public static function getStatusAvailables($currentDate){
    	$array = [];

        //$date = new Carbon('2019-04-17 12:53:20');
        $date = new Carbon($currentDate);
    	$dayOfWeek = $date->dayOfWeek;
    	$hour = $date->hour.$date->minute;
    	$status = Status::all();

    	foreach ($status as $s) {
    		if($s->day_start > $s->day_end){ //start > end
                if($dayOfWeek >= $s->day_start || $dayOfWeek <= $s->day_end){ //day
                    if($s->hour_start > $s->hour_end){ //hstart > hend
                        if( $hour >= $s->hour_start || $hour <= $s->hour_end ){
                            array_push($array, $s->title);
                        }
                    }
                    else{ // hstart <= hend
                        if($hour >= $s->hour_start && $hour <= $s->hour_end){
                            array_push($array, $s->title);
                        } 
                    }
                }
                else{ //start <= end
                    if($s->hour_start > $s->hour_end){ //hstart > hend
                        if( $hour >= $s->hour_start || $hour <= $s->hour_end ){
                            array_push($array, $s->title);
                        }
                    }
                    else{ // hstart <= hend
                        if($hour >= $s->hour_start && $hour <= $s->hour_end){
                            array_push($array, $s->title);
                        } 
                    }
                }
    		}



    		else{ // start <= end
                if($dayOfWeek >= $s->day_start && $dayOfWeek <= $s->day_end){
                    //echo $s->title." : start <= end\n";
        			if($s->hour_start > $s->hour_end){ //hstart > hend
                        if( $hour >= $s->hour_start || $hour <= $s->hour_end ){
                            array_push($array, $s->title);
                        }   
                    }
                    else{ // hstart <= hend
                        echo $s->title."\n";
                        if($hour >= $s->hour_start && $hour <= $s->hour_end){
                            array_push($array, $s->title);
                        } 
                    }
                }
    		}
    	}

    	return $array;
    }
}