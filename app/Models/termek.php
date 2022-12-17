<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class termek extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'termek';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
