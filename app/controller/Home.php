<?php
namespace App\Controller;
use App\Controller\Base;
use App\Model\Members;
class Home extends Base
{

	public function index($request, $response, $args)
	{
		//var_dump($args);exit;
		$request->getParsedBody();
		//var_dump(Members::all());exit;
		$member_info = Members::all(); //注释点东西
		//var_dump($member_info->toArray());exit;
		$member = Members::where('id',10)->first();
		var_dump($member);exit;
        return $this->view->render($response,'index.html',['data'=>$member_info]);
	}
}