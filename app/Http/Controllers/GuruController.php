<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;
use Illuminate\Support\Facades\DB;


class GuruController extends Controller
{
    public function __construct()
    {
        $this-> GuruModel = new GuruModel();

    }

    public function index()
    {
        $data = ['guru' => $this->GuruModel->allData(), ];
        return view('v_guru', $data);
    }

    public function detail($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
            
        }
        $data = ['guru' => $this->GuruModel->detailData($id_guru), ];
        return view('v_detailguru', $data);
    }

    public function add()
    {
        return view('v_addguru');
    }

    public function insert()
    {
        Request()->validate([
            'nip' => 'required|unique:tbl_guru|min:4|max:5',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'required|mimes:jpeg,jpg,png|max:1024'
        ],[
            'nip.required' => 'Wajib Di isi',
            'nip.unique' => 'NIP sudah ada',
            'nip.min' => 'Minimal panjang NIP 4 Karakter',
            'nip.max' => 'Max panjang NIP 5 Karakter',
            'nama_guru.required' => 'Wajib Di isi',
            'mapel.required' => 'Wajib Di isi',
            'foto_guru.required' => 'Wajib Di isi',
        ]);

        //jika validasi tidak ada maka melakukan insert
        //upload gambar
        $file = Request()->foto_guru;
        $filename = Request()->nip . '.' . $file ->extension();
        $file ->move(public_path('foto_guru'),$filename);
        
        $data = [
            'nip' => Request()->nip,
            'nama_guru' => Request()->nama_guru,
            'mapel' => Request()->mapel,
            'foto_guru' => $filename
        ];

        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan','Data Berhasil Ditambahkan !!!');
    }

    public function edit($id_guru)
    {   
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
            
        }

        $data = [
            'guru' => $this->GuruModel->detailData($id_guru), 
        ];
        return view('v_editguru',$data);
    }

    public function update($id_guru)
    {
        Request()->validate([
            'nip' => 'required|min:4|max:5',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'required|mimes:jpeg,jpg,png|max:1024'
        ],[
            'nip.required' => 'Wajib Di isi',
            'nip.unique' => 'NIP sudah ada',
            'nip.min' => 'Minimal panjang NIP 4 Karakter',
            'nip.max' => 'Max panjang NIP 5 Karakter',
            'nama_guru.required' => 'Wajib Di isi',
            'mapel.required' => 'Wajib Di isi',
            'foto_guru.required' => 'Wajib Di isi',
        ]);

        //jika validasi tidak ada maka melakukan insert
        //upload gambar
        $file = Request()->foto_guru;
        $filename = Request()->nip . '.' . $file ->extension();
        $file ->move(public_path('foto_guru'),$filename);
        
        $data = [
            'nip' => Request()->nip,
            'nama_guru' => Request()->nama_guru,
            'mapel' => Request()->mapel,
            'foto_guru' => $filename
        ];

            $this->GuruModel->editData($id_guru, $data);
            return redirect()->route('guru')->with('pesan','Data Berhasil Diupdate !!!');
    }

    public function delete($id_guru)
    {
        //hapus foto
        $guru = $this->GuruModel->detailData($id_guru);
        if ($guru->foto_guru <> ""){
            unlink(public_path('foto_guru') . '/'. $guru->foto_guru);
        }

        $this->GuruModel->deleteData($id_guru);
        return redirect()->route('guru')->with('pesan','Data Berhasil Dihapus !!!');

    }
}
