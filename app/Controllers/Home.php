<?php

namespace App\Controllers;

use App\Models\InformationModel;

class Home extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form', 'url']);
		$obj = new InformationModel;
		if ($this->request->getMethod() == 'post') {
			$rules = ['name' => 'required', 'age' => 'required|numeric', 'ph' => 'required|numeric|exact_length[10]', 'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png]'];
			if ($this->validate($rules)) {
				$file = $this->request->getFile('image');
				// echo $file->getName();
				$file->move('./public');
				if ($file->hasMoved()) {
					if (session()->has('id')) {
						$data['createdby'] = $_SESSION['id'];
						$data['name'] = $_POST['name'];
						$data['age'] = $_POST['age'];
						$data['ph'] = $_POST['ph'];
						$data['image'] = $file->getName();
						$obj->save($data);
						session()->setFlashdata('success', 'Data saved successfully');
						return redirect()->to(base_url());
					} else {
						session()->setFlashdata('danger', 'Error occurred');
					}
				} else {
					session()->setFlashdata('danger', 'Error occurred');
				}
			} else {
				$data['vresult'] = $this->validator;
			}
		}
		if (session()->has('id')) {
			$data['result'] = $obj->where('createdby', $_SESSION['id'])->findAll();
		} else {
			return redirect()->to(base_url('authentication'));
		}
		return view('home/manage', $data);
	}
	public function delete($id)
	{
		if (isset($id)) {
			$obj = new InformationModel;
			$obj->delete($id);
			session()->setFlashdata('danger', 'Data deleted successfully');
			return redirect()->to(base_url());
		}
	}
	public function update($id)
	{
		$data = [];
		helper(['form', 'url']);
		$obj = new InformationModel;
		if ($this->request->getMethod() == 'post') {
			$rules = ['name' => 'required', 'age' => 'required|numeric', 'ph' => 'required|numeric|exact_length[10]', 'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png]'];
			if ($this->validate($rules)) {
				$file = $this->request->getFile('image');
				// echo $file->getName();
				$file->move('./public');
				if ($file->hasMoved()) {
					if (session()->has('id')) {
						$data['createdby'] = $_SESSION['id'];
						$data['name'] = $_POST['name'];
						$data['age'] = $_POST['age'];
						$data['ph'] = $_POST['ph'];
						$data['image'] = $file->getName();
						$obj->update($id, $data);
						session()->setFlashdata('success', 'Data updated successfully');
						return redirect()->to(base_url());
					} else {
						session()->setFlashdata('danger', 'Error occurred');
					}
				} else {
					session()->setFlashdata('danger', 'Error occurred');
				}
			} else {
				$data['vresult'] = $this->validator;
			}
		}
		if (session()->has('id')) {
			$data['value'] = $obj->find($id);
		} else {
			return redirect()->to(base_url('authentication'));
		}
		return view('home/update', $data);
	}
}
