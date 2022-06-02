@extends('Backend.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('searchmusic')}}" class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                            </form>
                            <div align="center"><img src="/img/core-img/favicon.ico" alt=""></div>
                            <a href="{{route('addmusic')}}"><div align="right"><button class="btn btn-outline-dark">Add Music</button></div></a>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            File
                                        </th>
                                        <th>
                                            Musician
                                        </th>
                                        <th>
                                            Music Name
                                        </th>
                                        <th>
                                            Music File
                                        </th>
                                        <th>
                                            Music Date
                                        </th>
                                        <th>
                                            Process
                                        </th>
                                    </tr>
                                    </thead>
                                    @foreach($posts as $key)
                                        <tbody>
                                        <tr>
                                            <td class="py-1">
                                                <img src="/public/musician_image/{{$key->musician_image}}" alt="image"/>
                                            </td>
                                            <td>
                                                {{$key->music_musician}}
                                            </td>
                                            <td>
                                                {{$key->music_name}}
                                            </td>
                                            <td class="py-1">
                                                <img src="/public/music_image/{{$key->music_file}}" alt="image"/>
                                            </td>
                                            <td>
                                                {{$key->music_date}}
                                            </td>
                                            <td>
                                                <a href="{{route('edit',['id'=>$key->id])}}"><button type="submit" class="btn btn-outline-success btn-fw">Edit</button></a>
                                                <a href="{{route('delete',['id'=>$key->id])}}"><button type="submit" class="btn btn-outline-danger btn-fw">Delete</button></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
