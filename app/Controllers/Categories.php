<?php namespace App\Controllers;
use App\Models\CategoriesModel;

class Categories extends BaseController
{
	public function index()
	{
		helper('My_helper');
		$parents = new CategoriesModel;
		$data['parents'] = $parents->asObject()->where('parent',0)->findAll();
		return view('categories/index',$data);
	}
	public function create()
	{
		$data['validation'] = [];
		if ($this->request->isAJAX()){
			$children = new CategoriesModel;
			$children = $children->where('parent',$this->request->getVar('id'))->findAll();
			$this->response->setStatusCode(200, 'OK');
			return $this->response->setJSON($children);
		}
	
		if($this->request->getMethod()=="post"){
			$validation =  \Config\Services::validation();
			$category = new CategoriesModel;
			$validation->setRules($category->validationRules);
			$validation->withRequest($this->request);
			if(!$validation->run()){
				// var_dump($validation->getError('name'));exit;
				$data['validation']=$validation;
			}else{
				// var_dump($this->request->getPost());exit;
				$dataToStore = new \App\Entities\Categories([
					'name'=>$this->request->getVar('name'),
					'parent'=>$this->request->getVar('parent')
					]);
				if($category->save($dataToStore)){
					return redirect()->to('/')->with('message', 'category created with success');
				}
			}
		}
		$parents = new CategoriesModel;
		$data['parents']=$parents->asObject()->where('parent',0)->findAll();
		return view('categories/form',$data);
	}

	//--------------------------------------------------------------------

}
