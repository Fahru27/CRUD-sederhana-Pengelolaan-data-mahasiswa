<?php

namespace App\Models;

use CodeIgniter\Model;

class mahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['nama', 'slugh', 'jurusan', 'nim', 'gambar', 'gender', 'status', 'th_awal'];

    public function getMahasiswa($slugh = false)
    {

        if ($slugh == false) {
            return $this->paginate(5, 'mahasiswa');
        }

        return $this->where(['slugh' => $slugh])->first();
    }

    public function search($keyword)
    {
        $builder = $this->table('mahasiswa');
        $builder->like('nama', $keyword);
        $builder->orLike('nim', $keyword);

        return $builder;
    }
}
