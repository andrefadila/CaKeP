<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model {

	protected $table = 'wilayah_provinsi';

    public function kabupaten()
    {
        return $this->hasMany('App\Kabupaten');
    }
}
