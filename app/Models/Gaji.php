<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    // field yang dapat diisi
    protected $fillable = [
        'nik',
        'nama',
        'jns_klm',
        'golongan',
        'status',
        'gapok',
        'tunjangan',
        'potongan',
        'total'
    ];
    protected $primaryKey = 'NIK';
    public $timestamps = false; //by default timestamp true
    protected $table = "gaji";

    public function gaji(){
        return $this->Gaji::class;
    }
}
