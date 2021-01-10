<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    protected $table = 'mall';
    protected $fillable = ['nama', 'alamat', 'kontak', 'lat', 'lng', 'kelurahan_id', 'jadwal', 'jumlah'];
    protected $primaryKey = 'id'; // or null

    public function kelurahan()
    {
    	return $this->belongsTo('App\Kelurahan', 'kelurahan_id', 'id');
    }

}
