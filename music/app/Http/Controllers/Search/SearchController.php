<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * @var Music|Model
     */

    public $music;

    public function __construct(Music $music)
    {
        $this->music = $music;
    }

    public function searchmusic(Request $request){
        $search = $request->get('search');
        $posts= DB::table('music')->where('music_musician','like',$search.'%')->get();
        $music = $this->music->get();
        return view('search.searchmusic',compact('posts','music'));
    }
}
