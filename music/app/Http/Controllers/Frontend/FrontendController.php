<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * @var Music|Model
     */

    public $music;

    public function __construct(Music $music)
    {
        $this->music = $music;
    }

    public function home(){
        $music = $this->music->get();
        return view('Frontend.home',compact('music'));
    }
}
