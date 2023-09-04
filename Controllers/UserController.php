<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        // Ambil data pengguna dari model
        $userModel = new UserModel();
        $data['user'] = $userModel->findAll();

        // Tampilkan view v_user.php dengan data pengguna
        return view('v_user', $data);
    }

    public function create()
{
    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'username' => 'required',
        'password' => 'required',
        'role' => 'required'
    ]);
    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Enkripsi password menggunakan MD5
    $encryptedPassword = md5($this->request->getPost('password'));

    // Simpan data pengguna ke dalam database
    $userModel = new UserModel();
    $userModel->save([
        'username' => $this->request->getPost('username'),
        'password' => $encryptedPassword,
        'role' => $this->request->getPost('role')
    ]);

    return redirect()->to('user')->with('message', 'Data pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Enkripsi password menggunakan MD5
        $encryptedPassword = md5($this->request->getPost('password'));

        // Update data pengguna dalam database
        $userModel = new UserModel();
        $userModel->update($id, [
            'username' => $this->request->getPost('username'),
            'password' => $encryptedPassword,
            'role' => $this->request->getPost('role')
        ]);

        return redirect()->to('user')->with('message', 'Data pengguna berhasil diubah.');
    }

    public function delete($id)
    {
        // Hapus data pengguna dari database
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('user')->with('message', 'Data pengguna berhasil dihapus.');
    }
}
