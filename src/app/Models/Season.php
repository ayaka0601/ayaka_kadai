<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'name' => 'required',
    );

    public function getTitle()
    {
        return 'ID' . $this->id . ':' . $this->title;
    }
}
