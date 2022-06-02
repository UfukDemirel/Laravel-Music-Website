<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = "music";

    public function get()
    {
        return $this->select('*')->orderBy('id','desc')->get();
    }

    public function edit($id)
    {
        return $this->select('*')->where('id',$id)->get();
    }
}
