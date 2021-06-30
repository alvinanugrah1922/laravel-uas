<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\List_;

class SuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list()
    {
        $hasil = DB::select('select * from surat');
        return view('list-surat', ['data' => $hasil]);
    }
    public function simpan(Request $req)
    {
        DB::insert(
            'insert into surat (nomor_surat,tanggal_surat, judul_surat) values (?, ?, ?)',
            [$req->nomor_surat, $req->tanggal_surat, $req->judul_surat]
        );
        $hasil = DB::select('select * from surat');
        return view('list-surat', ['data' => $hasil]);
    }
    public function hapus($req)
    {
        Log::info('proses hapus dengan id=' . $req);
        DB::delete('delete from surat where id = ?', [$req]);

        $hasil = DB::select('select * from surat');
        return view('list-surat', ['data' => $hasil]);
    }
    public function ubah($req)
    {
        $hasil = DB::select('select * from surat where id = ?', [$req]);
        return view('form-ubah', ['data' => $hasil]);
    }
    public function rubah(Request $req)
    {
        Log::info('Hallo');
        Log::info($req);
        DB::update(
            'update surat set ' .
                'nomor_surat=?, ' .
                'tanggal_surat=?, ' .
                'judul_surat=? where id=? ',
            [
                $req->nomor_surat,
                $req->tanggal_surat,
                $req->judul_surat,
                $req->id
            ]
        );
        $hasil = DB::select('select * from surat');
        return view('list-surat', ['data' => $hasil]);
    }
}
