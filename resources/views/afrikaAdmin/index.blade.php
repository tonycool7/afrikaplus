@extends('layouts.admin')

@section('content')

    <div class="panel-group">
        @if(\Session::get('error'))
            <div class="alert alert-danger alert-box alert-close">{{\Session::get('error')}}</div>
        @endif
            @if(\Session::get('success'))
                <div class="alert alert-success alert-box alert-close">{{\Session::get('success')}}</div>
            @endif
        <div class="panel panel-default">
            <div class="panel-heading">Album panel</div>
            <div class="panel-body">
                <form enctype="multipart/form-data" class="form form-vertical" action="/afrika/admin/album" method="post">
                    {{ csrf_field() }}
                    <legend>Album</legend>
                    {{--<p>{{ msg }}</p>--}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Title</label><br>
                            <input type="text" class="form-control" v-model="album.title" name="title" placeholder="album title" required><br>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Artist</label><br>
                            <input type="text" class="form-control" v-model="album.artist" name="artist" placeholder="Name of artist" required><br>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Album image</label><br>
                            <input type="file" class="form-control" id="album_image" name="image_path" accept="image/*" ref="album_image" required><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="add album"/>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-condensed">
                    <thead>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach($album as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->artist}}</td>
                                <td>
                                    <form action="/album/{{$item->id}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {!! csrf_field() !!}
                                        <button><i class="fa fa-trash text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Music Panel</div>
            <div class="panel-body">
                <form enctype="multipart/form-data" class="form form-vertical" action="/music" method="post">
                    {{ csrf_field() }}
                    <legend>Music</legend>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="desc">Title</label><br>
                            <input type="text" class="form-control" name="title" v-model="music.title" placeholder="Music title" required><br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="desc">Select album</label><br>
                            <select name="album_id" :@change='albumSelect()' v-model="music.album" class="form-control">
                                @foreach($album as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4" :style="{display: showArtistInput}">
                        <div class="form-group">
                            <label for="desc">Artist</label><br>
                            <input type="text" class="form-control" name="artist" v-model="music.artist" placeholder="Music artist"><br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="desc">Music</label><br>
                            <input type="file" class="form-control" accept="audio/*" name="src" v-model="music.src" required><br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="desc">Cover Image</label><br>
                            <input type="file" class="form-control" name="image" accept="image/*" v-model="music.image"><br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="add music"/>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-condensed">
                    <thead>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach($music as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->album->artist}}</td>
                            <td>{{$item->album->title}}</td>
                            <td><form action="/music/{{$item->id}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {!! csrf_field() !!}
                                    <button><i class="fa fa-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var afrika = new Vue({
            el: '#admin',
            data(){
                return {
                    showArtistInput: 'none',
                    album: {
                        title: '',
                        artist: '',
                        image_path: ''
                    },
                    music:{
                        title: '',
                        src: '',
                        image: '',
                        artist: '',
                        album: ''
                    }
                }
            },

            methods : {
                albumSelect : function () {
                    if(this.music.album == 22){
                        this.showArtistInput = 'block';
                    }else{
                        this.showArtistInput = 'none';
                    }
                }
//                createAlbum : function(e){
//                    e.preventDefault();
//                    this.album.image_path = this.setAlbumImage();
//                    axios.post('/afrika/admin/album',this.album).then(response => {
//                        alert(response.data.result);
//                    }).catch(e => {
//                        alert(e);
//                    });
//                    return false;
//                },
//                setAlbumImage : function(){
//                    let formdata = new FormData();
//                    let path = '';
//                    formdata.append('id', '1');
//                    formdata.append('image', this.$refs.album_image.files[0]);
//                    axios.post('/afrika/admin/albumImg',formdata).then(response => {
//                        path = res.data.path;
//                    }).catch(e => {
//                        alert(e);
//                    });
//
//                    return path;
//                }
            }
        });
        </script>
@endsection