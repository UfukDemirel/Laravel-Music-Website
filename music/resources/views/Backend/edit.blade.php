@extends('Backend.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div align="center"><h4 class="card-title">Edit Music</h4></div>
                            @foreach($edit as $key)
                            <form class="forms-sample" action="{{route('editpost',['id'=>$key->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Musician</label>
                                    <input type="text" class="form-control" name="music_musician" value="{{$key->music_musician}}" placeholder="Musician">
                                </div>
                                <div class="form-group">
                                    <label>Music Name</label>
                                    <input type="text" class="form-control" name="music_name" value="{{$key->music_name}}" placeholder="Music Name">
                                </div>
                                <div class="form-group">
                                    <label>Please Upload Music</label>
                                    <input type="file" name="music" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Please Upload Musician Photo</label>
                                    <input type="file" name="musician_image" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Please Upload Music Photo</label>
                                    <input type="file" name="music_file" required class="form-control">
                                </div>
                                <div align="center"><button type="submit" class="btn btn-outline-dark">Edit</button></div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
