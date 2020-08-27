<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'surats';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['no_surat', 'judul_surat', 'jenis_surat_id', 'tanggal', 'instansi', 'keterangan', 'tipe', 'user_id'];

    public function jenis_surat ()
    {
        return $this->belongsTo('App\JenisSurat');
    }    

    public function user ()
    {
        return $this->belongsTo('App\User');
    }

}