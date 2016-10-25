<?php
namespace App\Controller;
use App\Controller\Base;
use App\Model\Members;
class Py extends Base
{

	public function index($request, $response, $args)
	{
		//var_dump($args);exit;
		//var_dump(Members::all());exit;
		$member_info = Members::all(); //注释点东西
		//var_dump($member_info->toArray());exit;
		$member = Members::find(1);
		//var_dump('aaaa');exit;
        return $this->view->render($response,'index.html',['data'=>$member_info]);
	}

	public function members($request, $response, $args)
	{
		//$member_info = Members::all();
		$data = $request->getParsedBody();
		$id = $data['member_id'];
		//var_dump($id);
		$member = Members::where('id',$id)->first();

		echo json_encode($member);
		exit;
	}
}