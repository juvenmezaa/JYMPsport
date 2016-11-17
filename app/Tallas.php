<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tallas extends Model {
	use TallasProdTrait;
    protected $table = 'tallas';

}
