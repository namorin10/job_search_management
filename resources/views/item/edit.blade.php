@extends('adminlte::page')

@section('title', '応募中の企業の情報を変更')

@section('content_header')
    <h1>応募中の企業の情報を変更</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form action="/items/update/{{ $item->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">企業名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name}}" placeholder="企業名を変更する">
                        </div>

                        <div class="form-group">
                            <label for="type">志望度</label>
                            <input type="text" class="form-control" id="preference" name="preference" value="{{ $item->preference}}" placeholder="志望度を変更する">
                        </div>

                        <div class="form-group">
                            <label for="detail">選考の進捗</label>
                            <input type="text" class="form-control" id="progress" name="progress" value="{{ $item->progress}}" placeholder="選考の進捗を変更する">
                        </div>

                        <div class="form-group">
                            <label for="type">良い点</label>
                            <input type="text" class="form-control" id="good" name="good" value="{{ $item->good}}" placeholder="良い点を変更する">
                        </div>

                        <div class="form-group">
                            <label for="type">懸念点</label>
                            <input type="text" class="form-control" id="bad" name="bad" value="{{ $item->bad}}" placeholder="懸念点を変更する">
                        </div>

                        <div class="form-group">
                            <label for="type">メモ</label>
                            <input type="text" class="form-control" id="memo" name="memo" value="{{ $item->memo}}" placeholder="メモを変更する">
                        </div>

                        <div class="form-group">
                            <label for="type">元のサイト</label>
                            <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $item->site_name}}" placeholder="元のサイトを変更する">
                        </div>

                        <div class="form-group">
                            <label for="type">URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{ $item->url}}" placeholder="URLを変更する">
                        </div>
                    </div>
                    <div class="card-footer">  
                        <button type="submit" class="btn btn-primary me-2">更新</button>
                        <form action="/items/delete/{{$item->id}}" method="post">
                            @csrf 
                            <button type="submit" class="btn btn-danger" onclick="return confirm('削除してよろしいですか？')">削除</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
