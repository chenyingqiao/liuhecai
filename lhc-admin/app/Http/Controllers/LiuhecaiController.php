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
 * @Last Modified time: 2017-10-29 10:03:23
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
		return view("list");
	}

	/**
	 * 购买六合彩
	 * @Author   Lerko
	 * @DateTime 2017-10-29T10:03:14+0800
	 * @param    [type]                   $buylist [description]
	 * @return   [type]                            [description]
	 */
	public function buy($buylist){
		var_dump($buylist);
	}

	
}