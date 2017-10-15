<?php 
namespace App\System\Route;

use League\Route\RouteCollection;
/**
 * @Author: Administrator
 * @Date:   2017-08-11 10:06:06
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-10-14 22:31:07
 */
class RouteCollectionVersion extends RouteCollection
{

	private $version="";

	private $routers=[];

	/**
	 * {@inheritdoc}
	 */
	public function __construct(
			$version="",
	        ContainerInterface $container = null,
	        RouteParser        $parser    = null,
	        DataGenerator      $generator = null
		)
	{
		$this->version=$version;
		parent::__construct($container,$parser,$generator);
	}

    /**
     * {@inheritdoc}
     */
    public function map($method, $path, $handler)
    {
    	if($this->version||empty($this->groups))
	    	$path="/".$this->version.$path;
	    return parent::map($method, $path, $handler);
    }

    /**
     * {@inheritdoc}
     */
    public function group($prefix, callable $group){
    	if($this->version||empty($this->groups))
	    	$path="/".$this->version.$prefix;
	    return parent::group($prefix,$group);
    }

    /**
     * 添加路由
     * @Author   Lerko
     * @DateTime 2017-08-11T14:15:57+0800
     * @param    [array[obj]|obj]                   $router [路由注册]
     */
    public function addRouter($router){
    	if(!is_array($router)){$router=[$router];}
    	foreach ($router as $key => $value) {
            if(is_string($value)){
                $class_route="App\\System\\Route\\".$this->version."\\".$value;
                $value=new $class_route;
            }
	    	$this->routers[]=$value;
    	}
        return $this;
    }

   	/**
   	 * 开始路由
   	 * @Author   Lerko
   	 * @DateTime 2017-08-11T14:16:14+0800
   	 * @return   [type]                   [description]
   	 */
    public function routing()
    {
    	foreach ($this->routers as $key => $value) {
    		$value->register($this);
    	}
    }
}