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
 * @Last Modified time: 2017-10-15 22:14:58
 */
/**
* 用户端界面
*/
class LiuhecaiController extends Controller
{
	public function index(){
		//今天的开奖信息
		$lottery=Lottery::where("datetime",Tool::getDayTime())
				->first()->toArray();
		//今天的推荐信息
		$recommend=Recommend::where("datetime",Tool::getDayTime())
				->first()->toArray();
				
		$data=[
			"bell"=>[
				$lottery['key1'],
				$lottery['key2'],
				$lottery['key3'],
				$lottery['key4'],
				$lottery['key5'],
				$lottery['key6']
			],
			"special_bell"=>$lottery['skey'],
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
}