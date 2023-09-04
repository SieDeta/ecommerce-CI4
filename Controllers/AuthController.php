<?php

		namespace App\Controllers;

		use App\Models\userModel;

		class AuthController extends BaseController
		{
		    protected $user;

		    function __construct()
		    {
		        helper('form');
		        $this->user = new userModel();
		    }

		    public function login()
		    {
		        if ($this->request->getPost()) {
		            $username = $this->request->getVar('username');
		            $password = $this->request->getVar('password');

		            $dataUser = $this->user->where(['username' => $username])->first();
		            if ($dataUser) {
		                if (md5($password) == $dataUser['password']) {
		                    session()->set([
		                        'username' => $dataUser['username'],
		                        'role' => $dataUser['role'],
		                        'isLoggedIn' => TRUE,
								'id' => $dataUser['id']
		                    ]);

		                    return redirect()->to(base_url('/'));
		                } else {
		                    session()->setFlashdata('failed', 'Username & Password Salah');
		                    return redirect()->back();
		                }
		            } else {
		                session()->setFlashdata('failed', 'Username Tidak Ditemukan');
		                return redirect()->back();
		            }
		        } else {
		            return view('v_login');
		        }
		    }

		    public function logout()
		    {
		        session()->destroy();
		        return redirect()->to('login');
		    }

			public function register()
			{
				helper(['form']);

				if ($this->request->getPost()) {
					$rules = [
						'username' => 'required|is_unique[user.username]',
						'password' => 'required'
					];

					if ($this->validate($rules)) {
						$userModel = new UserModel();

						$username = $this->request->getPost('username');
						$password = md5((string)$this->request->getPost('password'));

						$data = [
							'username' => $username,
							'password' => $password,
							'role' => 'guest'
						];

						$userModel->insert($data);

						session()->setFlashData('success', 'Registration successful. You can now log in.');

						return redirect()->to('login');
					} else {
						session()->setFlashData('error', $this->validator->listErrors());
					}
				}

				return view('v_register');
			}

			/*
			public function profile()
			{
				// Load the view 'my_profile.php' in the 'Profile' folder
				return view('profile');
			}
			*/
		}
		