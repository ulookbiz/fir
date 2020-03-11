<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fir extends Model
{
    protected $fillable = array('id', 'e_word', 'r_word', 'e_phrase', 'r_phrase', 'pic_name', 'short_audio', 'long_audio', 'copyright');
    protected $table = 'fir';
}
