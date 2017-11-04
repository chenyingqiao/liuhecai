<?php
namespace App;

use App\Buy;
use Illuminate\Support\Facades\DB;

/**
 * @Author: lerko
 * @Date:   2017-10-30 20:37:20
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-11-04 15:23:58
 */
/**
* 
*/
class Data
{
	public static function statistics($type,$time=null){
		if(!$time){
			$time=Tool::getDayTime();
		}
		$data=DB::table('buy')
				->where("type",$type)->where("datetime",$time)
                ->select('data', DB::raw('SUM(money) as all_money'))
                ->groupBy('data')
                ->get();
		if($data){
			$data=$data->toArray();
			$return=[];
			foreach ($data as $key => $value) {
				$return[$key]=$value->all_money;
			}
			return $return;
		}
		return [];
	}

	// public static function statisticsClearUp1(&$data){
	// 	$swap=[];
	// 	foreach ($data as $key => $value) {
	// 		$swap[]=$value;
	// 	}
	// 	return $value;
	// }
}