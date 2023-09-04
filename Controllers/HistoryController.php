<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;

class HistoryController extends BaseController
{
    public function index()
{
    $username = session()->get('username');
    $userId = session()->get('id');

    $transaksiModel = new TransaksiModel();
    $transaksiDetailModel = new TransaksiDetailModel();

    $transaksis = $transaksiModel
        ->distinct()
        ->join('transaksi_detail', 'transaksi.id = transaksi_detail.id_transaksi')
        ->join('transaksi as t', 't.id = transaksi_detail.id_transaksi')
        ->where('t.username', $username)
        ->groupBy('transaksi.id')
        ->findAll();

    $transaksiDetails = $transaksiDetailModel
        ->join('transaksi', 'transaksi.id = transaksi_detail.id_transaksi')
        ->where('transaksi.username', $username)
        ->findAll();

    return view('v_history', [
        'transaksis' => $transaksis,
        'transaksiDetails' => $transaksiDetails
    ]);
}

}

