<?php

namespace App\Controllers;

use App\Models\mahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new mahasiswaModel();
    }
    public function index()
    {

        $currentPage = $this->request->getVar('page_mahasiswa') ? $this->request->getVar('page_mahasiswa') : 1;

        // d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $mahasiswa = $this->mahasiswaModel->search($keyword);
        } else {
            $mahasiswa = $this->mahasiswaModel;
        }

        $data = [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => $mahasiswa->getMahasiswa(),
            'pager' => $this->mahasiswaModel->pager,
            'currentPage' => $currentPage
        ];


        return view('mahasiswa/index', $data);
    }

    public function detail($slugh)
    {
        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa($slugh)
        ];
        if (empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($slugh .
                ' tidak ditemukan');
        }

        return view('mahasiswa/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Mahasiswa',
            'validation' => \Config\Services::validation()
        ];

        return view('mahasiswa/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required[mahasiswa.nama]',
                'errors' => [
                    'required' => '{field} mahasiswa harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Format gambar tidak valid',
                    'mime_in' => 'Format gambar tidak valid'
                ]
            ],
            'jurusan' => [
                'rules' => 'required[mahasiswa.jurusan]',
                'errors' => [
                    'required' => 'jurusan harus diisi'
                ]
            ],
            'nim' => [
                'rules' => 'required|is_unique[mahasiswa.nim]|exact_length[8]',
                'errors' => [
                    'required' => 'nim mahasiswa harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/mahasiswa/create')->withInput();
        }
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() === 4) {
            $namaFile = 'default.jpg';
        } else {
            $namaFile = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaFile);
        }
        $slugh = url_title($this->request->getVar('nama'), '-', true);
        $this->mahasiswaModel->save([
            'nama' => $this->request->getVar('nama'),
            'slugh' => $slugh,
            'jurusan' => $this->request->getVar('jurusan'),
            'nim' => $this->request->getVar('nim'),
            'gambar' => $namaFile,
            'gender' => $this->request->getVar('gender'),
            'status' => $this->request->getVar('status'),
            'th_awal' => $this->request->getVar('th_awal')
        ]);

        session()->setFlashData('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/mahasiswa');
    }

    public function delete($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        if ($mahasiswa['gambar'] != 'default.jpg') {
            unlink('img/' . $mahasiswa['gambar']);
        }

        $this->mahasiswaModel->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus');
        return redirect()->to('/mahasiswa');
    }

    public function edit($slugh)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa($slugh)
        ];
        return view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $dataLama = $this->mahasiswaModel->getMahasiswa($this->request->getVar('slugh'));
        if ($dataLama['nim'] == $this->request->getVar('nim')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[mahasiswa.nim]';
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required[nama]',
                'errors' => [
                    'required' => 'nama mahasiswa harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Format gambar tidak valid',
                    'mime_in' => 'Format gambar tidak valid'
                ]
            ],
            'jurusan' => [
                'rules' => 'required[jurusan]',
                'errors' => [
                    'required' => 'jurusan harus diisi'
                ]
            ],
            'nim' => [
                'rules' => $rule_judul . '|exact_length[8]',
                'errors' => [
                    'required' => 'nim mahasiswa harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/mahasiswa/edit/' . $this->request->getVar('slugh'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaFile = $this->request->getVar('gambarLama');
        } else {
            $namaFile = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaFile);
            if ($this->request->getVar('gambarLama') !== 'default.jpg') {
                unlink('img/' . $this->request->getVar('gambarLama'));
            }
        }
        $slugh = url_title($this->request->getVar('nama'), '-', true);
        $this->mahasiswaModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slugh' => $slugh,
            'jurusan' => $this->request->getVar('jurusan'),
            'nim' => $this->request->getVar('nim'),
            'gambar' => $namaFile,
            'gender' => $this->request->getVar('gender'),
            'status' => $this->request->getVar('status'),
            'th_awal' => $this->request->getVar('th_awal')
        ]);
        session()->setFlashData('pesan', 'Data berhasil diubah');
        return redirect()->to('/mahasiswa');
    }
}
