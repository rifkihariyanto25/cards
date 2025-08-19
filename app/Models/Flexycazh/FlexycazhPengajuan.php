<?php

namespace App\Models\Flexycazh;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlexycazhPengajuan extends Model
{
    use HasFactory;
    
    protected $table = 'flexycazh_pengajuan';
    
    protected $fillable = [
        'nama_partner',
        'jenis_partner',
        'nama_pic',
        'nomor_hp_pic',
        'kebutuhan',
        'nominal',
        'tenor',
        'status'
    ];
    
    /**
     * Menyimpan data pengajuan baru
     *
     * @param array $data
     * @return FlexycazhPengajuan
     */
    public static function simpanPengajuan(array $data)
    {
        return self::create([
            'nama_partner' => $data['nama_partner'],
            'jenis_partner' => $data['jenis_partner'],
            'nama_pic' => $data['nama_pic'],
            'nomor_hp_pic' => $data['nomor_hp_pic'],
            'kebutuhan' => $data['kebutuhan'],
            'nominal' => $data['nominal'],
            'tenor' => $data['tenor'],
            'status' => 'pending'
        ]);
    }
}
