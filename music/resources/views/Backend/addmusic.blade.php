@extends('Backend.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div align="center"><h4 class="card-title">Add Music</h4></div>
                            <form class="forms-sample" action="{{route('addmusicpost')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Musician</label>
                                    <input type="text" class="form-control" name="music_musician" value="{{old('music_musician')}}" placeholder="Musician">
                                </div>
                                <div class="form-group">
                                    <label>Music Name</label>
                                    <input type="text" class="form-control" name="music_name" value="{{old('music_name')}}" placeholder="Music Name">
                                </div>
                                <div class="form-group">
                                    <label>Please Upload Music</label>
                                    <input type="file" name="music" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Please Upload Musician Photo</label>
                                    <input type="file" name="musician_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Please Upload Music Photo</label>
                                    <input type="file" name="music_file" class="form-control">
                                </div>
                                <div align="center"><button type="submit" class="btn btn-outline-dark">Save</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
