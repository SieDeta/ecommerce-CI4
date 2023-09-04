<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Validation\Exceptions\ValidationException;

class ProfileController extends BaseController
{
     protected $userModel;
     protected $user;
     protected $validation;

     public function __construct()
     {
          $this->validation = \Config\Services::validation();
          $this->userModel = new UserModel();
     }

     public function editProfile($id)
     {
          $userModel = new UserModel(); // Instantiate the UserModel
          $data['user'] = $userModel->get_id_user($id);
          return view('v_profile', $data);
     }

     public function updateProfile($id)
     {
          $userModel = new UserModel(); // Instantiate the UserModel


          // Retrieve the user data from the form
          $username = $this->request->getPost('username');
          $password = $this->request->getPost('password');
          $id_user = $this->request->getPost('id');

          // Validate the input data
          $this->validation->setRules([
               'username' => 'required',
               'password' => 'required'
          ]);

          if (!$this->validation->withRequest($this->request)->run()) {
               // Redirect back to the update form with validation errors
               return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
          }

          // Hash the password
          $password_md5 = md5((string)$password);
          $dataForm = [
               'username' => $username,
               'password' => $password_md5
          ];


          $this->userModel->update($id_user, $dataForm);

          // Redirect to the profile page with a success message
          return redirect()->to('login')->with('success', 'Profile updated successfully.');
     }
}