<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;

class StatusController extends BaseController
{
    public function index()
    {
        $role = session()->get('role');
        $userId = session()->get('id');

        $transaksiModel = new TransaksiModel();
        $transaksiDetailModel = new TransaksiDetailModel();

        if ($role === 'admin') {
            $transaksis = $transaksiModel->findAll();
            $transaksiDetails = $transaksiDetailModel->findAll();
        } 

        return view('v_transaksi', [
            'transaksis' => $transaksis,
            'transaksiDetails' => $transaksiDetails
        ]);
    }
    
    public function updateStatus($idTransaksi)
    {
        // Lakukan validasi, autentikasi, dan verifikasi jika diperlukan
        
        // Lakukan perubahan status transaksi pada database
        $transaksiModel = new TransaksiModel();
        $transaksi = $transaksiModel->find($idTransaksi);
        if ($transaksi) {
            $transaksiModel->update($idTransaksi, ['status' => 1]); // Ubah status menjadi 1 (sudah selesai)
            // Tambahkan pesan flash success jika diperlukan
            session()->setFlashData('success', 'Status transaksi berhasil diubah.');
        } else {
            // Tambahkan pesan error jika transaksi tidak ditemukan
            session()->setFlashData('error', 'Transaksi tidak ditemukan.');
        }

        // Redirect kembali ke halaman v_transaksi
        return redirect()->to('status');
    }
}