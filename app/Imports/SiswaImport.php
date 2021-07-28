<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return [$siswa = new User([
            'id' => $row[1],
            'username' => $row[1],
            'password' => Hash::make("12345678"),
        ]),
        $siswa->assignRole('Siswa'),
        $ortu = new User([
            'id' => $row[5],
            'username' => $row[5],
            'password' => Hash::make("12345678"),
        ]),
        $ortu->assignRole('Ortu'),
        new Siswa([
            'nis' => $row[1],
            'kelas_id' => $row[2],
            'nama' => $row[3],
            'jk' => $row[4],
            'user_ortu' => $row[5],
            'ortu' => $row[6],
            'kontak' => $row[7],
            'rayon' => $row[8],
        ]),
        ];
    }
}
