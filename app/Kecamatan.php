<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model {

    protected $table = 'wilayah_kecamatan';

    public function desa()
    {
        return $this->hasMany('App\Desa');
    }

    public function kabupaten()
    {
        return $this->belongsTo('App\Kabupaten');
    }
}
