<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isMember');
    }

    public function index()
    {
        $data =
            [
                'title' => 'History',
            ];
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('member.history.index', compact('pesanans'), $data);
    }

    public function detail($id)
    {
        $data =
            [
                'title' => 'History',
            ];
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('member.history.detail', compact('pesanan', 'pesanan_details'), $data);
    }
}
