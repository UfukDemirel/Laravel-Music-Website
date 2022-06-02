<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BackendController extends Controller
{
    /**
     * @var Music|Model
     */

    public $music;

    public function __construct(Music $music)
    {
        $this->music = $music;
    }

    public function login(){
        return view('Backend.login');
    }

    public function loginpost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                Alert::alert('Great', 'you are logged in...', 'success');
                if (Auth::user()->permission_level == 'admin') {
                    return redirect()->intended(route('dashboard'));
                }else{
                    Alert::error('Error', 'Your information is incorrect...', 'error');
                    return redirect()->route('login');
                }
            } else {
                Alert::error('Error', 'Your information is incorrect...', 'error');
                return redirect()->route('login');
            }
        }

    public function dashboard(){
        return view('Backend.dashboard');
    }

    public function music(Request $request){
        $search = $request->get('search');
        $posts= DB::table('music')->where('music_musician','like',$search.'%')->get();
        $music = $this->music->get();
        return view('Backend.music',compact('music','search','posts'));
    }

    public function addmusic(){
        return view('Backend.addmusic');
    }

    public function addmusicpost(Request $request){
        $request->validate([
            'music_musician'=>'required',
            'music_name'=>'required',
            'music'=>'required',
            'musician_image' =>'required|image|mimes:jpg,jpeg,png|max:5000',
            'music_file'=>'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        $musician_image=uniqid().'.'.$request->file('musician_image')->getClientOriginalExtension();
        $request->file('musician_image')->move(public_path('/public/musician_image/'),$musician_image);

        $music_file=uniqid().'.'.$request->file('music_file')->getClientOriginalExtension();
        $request->file('music_file')->move(public_path('/public/music_image/'),$music_file);

        $music=uniqid().'.'.$request->file('music')->getClientOriginalExtension();
        $request->file('music')->move(public_path('/public/music/'),$music);

        $add = DB::table("music")->insert([
            "music_musician"=>$request->get('music_musician'),
            "musician_image"=>$musician_image,
            "music_name"=>$request->music_name,
            "music"=>$music,
            "music_file"=>$music_file,
        ]);

        if($add){
            Alert::success('Great!', 'Recording music successfull..');
            return redirect()->route('music');
        }else{
            Alert::error('Error!', 'Ups! An error occurred..');
            return back();
        }
    }

    public function edit($id){
        $edit = $this->music->edit($id);
        return view('Backend.edit',compact('edit'));
    }

    public function editpost(Request $request,$id){
        $request->validate([
            'music_musician'=>'required',
            'music_name'=>'required',
            'music'=>'required',
            'musician_image' =>'required|image|mimes:jpg,jpeg,png|max:5000',
            'music_file'=>'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        $musician_image=uniqid().'.'.$request->file('musician_image')->getClientOriginalExtension();
        $request->file('musician_image')->move(public_path('/public/musician_image/'),$musician_image);

        $music_file=uniqid().'.'.$request->file('music_file')->getClientOriginalExtension();
        $request->file('music_file')->move(public_path('/public/music_image/'),$music_file);

        $music=uniqid().'.'.$request->file('music')->getClientOriginalExtension();
        $request->file('music')->move(public_path('/public/music/'),$music);

        $add = DB::table("music")
            ->where('id',$id)
            ->update([
            "music_musician"=>$request->get('music_musician'),
            "musician_image"=>$musician_image,
            "music_name"=>$request->music_name,
            "music"=>$music,
            "music_file"=>$music_file,
        ]);

        if($add){
            Alert::success('Great!', 'Edit music successfull..');
            return redirect()->route('music');
        }else{
            Alert::error('Error!', 'Ups! An error occurred..');
            return back();
        }
    }

    public function delete($id){
        $delete = DB::table('music')->Delete($id);
        if ($delete){
            Alert::success('Great!', 'music deleted..');
            return back();
        }else{
            Alert::error('Error!', 'Ups! An error occurred..');
            return back();
        }
    }

    public function exit(){
        Auth::logout();
        Alert::alert('Great', 'You signed out...', 'success');
        return redirect()->intended(route('login'));
    }
}
