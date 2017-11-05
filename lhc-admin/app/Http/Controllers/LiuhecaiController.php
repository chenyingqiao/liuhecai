<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lottery;
use App\Recommend;
use App\Tool;
use Illuminate\Support\Facades\Blade;

/**
 * @Author: lerko
 * @Date:   2017-10-15 15:45:55
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-11-05 13:46:17
 */
/**
* 用户端界面
*/
class LiuhecaiController extends Controller
{
	//开奖首页
	public function index(){
		//今天的开奖信息
		$lottery=Lottery::orderBy("datetime","desc")
				->first();
		//今天的推荐信息
		$recommend=Recommend::orderBy("datetime","desc")
				->first()->toArray();
		$weekarray=array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
		$data=[
			"id"=>$lottery['id'],
			"bell"=>[
				$lottery['key1'],
				$lottery['key2'],
				$lottery['key3'],
				$lottery['key4'],
				$lottery['key5'],
				$lottery['key6']
			],
			"time"=>explode(" ",$recommend['datetime'])[0],
			"special_bell"=>$lottery['skey'],
			"week"=>$weekarray[date("w",strtotime($recommend['datetime']))],
			"recommend"=>explode(',',$recommend['string'])
		];

		Blade::directive("bell_name",function($exp){
			return "<?php echo App\Tool::getBellMap($exp);?>";
		});
		Blade::directive("bell_path",function($exp){
			return "<?php echo App\Tool::getBellImagePath($exp);?>";
		});
		
		return view("index",$data);
	}

	public function list()
	{
		$lottery=Lottery::orderBy("datetime","DESC")
					->get();
		Blade::directive("week",function($exp){
			return "<?php echo App\Tool::getDayTimeByStr($exp);?>";
		});
		Blade::directive("bell_path",function($exp){
			return "<?php echo App\Tool::getBellImagePath($exp);?>";
		});
		Blade::directive("bell_name",function($exp){
			return "<?php echo App\Tool::getBellMap($exp);?>";
		});
		if($lottery){
			return view("list",['data'=>$lottery->toArray()]);
		}
		return view("list",["data"=>[]]);
	}

	/**
	 * 9点30获取发布的六合彩信息
	 * @Author   Lerko
	 * @DateTime 2017-11-04T10:12:23+0800
	 * @param    string                   $value [description]
	 * @return   [type]                          [description]
	 */
	public function getLittery($value='')
	{
		$nowTime=strtotime("2017-11-05 ".date("H:i:s"));
		$jiudianbanStart=strtotime("2017-11-05 12:11:00");
		$jiudianbanEnd=strtotime("2017-11-05 12:11:59");
		// if($nowTime>$jiudianbanEnd || $nowTime<$jiudianbanStart){
		// 	return view('lottery',["show"=>false]);
		// }
		$lottery=Lottery::where("datetime",Tool::getDayTime())
				->first();
		if($lottery){
			$bells=$lottery->toArray();
			$data=[
				"show"=>true,
				"bells"=>Tool::getBellPathodeList([
					$bells["key1"],
					$bells["key2"],
					$bells["key3"],
					$bells["key4"],
					$bells["key5"],
					$bells["key6"],
					$bells["skey"],
				])
			];
			return view('lottery',$data);
		}
		return view('lottery',["show"=>false]);
	}
}