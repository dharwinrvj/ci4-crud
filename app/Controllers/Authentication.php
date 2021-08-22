<?php

namespace App\Controllers;

use App\Models\AuthenticationModel;

class Authentication extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form', 'url']);
        if ($this->request->getMethod() == 'post') {
            $rules = ['email' => 'required|valid_email', 'pass' => 'required'];
            if ($this->validate($rules)) {
                $obj = new AuthenticationModel;
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $res = $obj->where('email', $email)->first();
                if ($res != null) {
                    if (password_verify($pass, $res['pass'])) {
                        $s = session();
                        $s->set('id', $res['id']);
                        return redirect()->to(base_url('/'));
                    } else {
                        $s = session();
                        $s->setFlashdata('danger', 'Invalid Password');
                    }
                } else {
                    $s = session();
                    $s->setFlashdata('danger', 'Invalid E-Mail');
                }
            } else {
                $data['vresult'] = $this->validator;
            }
        }
        return view('authentication/login', $data);
    }
    public function reset()
    {
        $data = [];
        helper(['form', 'url']);
        if ($this->request->getMethod() == 'post') {
            $rules = ['email' => 'required|valid_email', 'hint' => 'required', 'password' => 'required'];
            if ($this->validate($rules)) {
                $obj = new AuthenticationModel;
                $email = $_POST['email'];
                $hint = $_POST['hint'];
                $password = $_POST['password'];
                $res = $obj->where('email', $email)->first();
                if ($res != null) {
                    if ($hint == $res['hint']) {
                        $update = ['pass' => $password];
                        $obj->update($res['id'], $update);
                        $s = session();
                        $s->setFlashdata('success', 'Password updated successfully');
                        return redirect()->to(base_url('authentication'));
                    } else {
                        $s = session();
                        $s->setFlashdata('danger', 'Invalid Hint');
                    }
                } else {
                    $s = session();
                    $s->setFlashdata('danger', 'Invalid E-Mail');
                }
            } else {
                $data['vresult'] = $this->validator;
            }
        }
        return view('authentication/reset', $data);
    }
    public function register()
    {
        $data = [];
        helper(['form', 'url']);
        if ($this->request->getMethod() == 'post') {
            $rules = ['email' => 'required|valid_email', 'pass' => 'required', 'hint' => 'required'];
            if ($this->validate($rules)) {
                $obj = new AuthenticationModel;
                if ($obj->save($_POST) == false) {
                    $data['error'] = $obj->errors();
                } else {
                    $s = session();
                    $s->setFlashdata("success", "Your Account is successfully created");
                    return redirect()->to(base_url('authentication'));
                }
            } else {
                $data['vresult'] = $this->validator;
            }
        }
        return view('authentication/register', $data);
    }
    public function logout()
    {
        if (session()->has('id')) {
            session()->destroy('id');
            return redirect()->to(base_url('authentication'));
        }
        return redirect()->to(base_url('authentication'));
    }
}
