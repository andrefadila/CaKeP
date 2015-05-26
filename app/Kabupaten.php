<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model {

    protected $table = 'wilayah_kabupaten';

    public function kecamatan()
    {
        return $this->hasMany('App\Kecamatan');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi');
    }
}
