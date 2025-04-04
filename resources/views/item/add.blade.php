@extends('adminlte::page')

@section('title', '応募企業登録')

@section('content_header')
    <h1>応募企業登録</h1>
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
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">企業名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="type">志望度</label>
                            <input type="text" class="form-control" id="preference" name="preference" placeholder="志望度">
                        </div>

                        <div class="form-group">
                            <label for="detail">選考の進捗</label>
                            <input type="text" class="form-control" id="progress" name="progress" placeholder="選考の進捗">
                        </div>

                        <div class="form-group">
                            <label for="type">良い点</label>
                            <input type="text" class="form-control" id="good" name="good" placeholder="良い点">
                        </div>

                        <div class="form-group">
                            <label for="type">懸念点</label>
                            <input type="text" class="form-control" id="bad" name="bad" placeholder="懸念点">
                        </div>

                        <div class="form-group">
                            <label for="type">メモ</label>
                            <input type="text" class="form-control" id="memo" name="memo" placeholder="メモ">
                        </div>

                        <div class="form-group">
                            <label for="type">元のサイト</label>
                            <input type="text" class="form-control" id="site_name" name="site_name" placeholder="元のサイト">
                        </div>

                        <div class="form-group">
                            <label for="type">URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="URL">
                        </div>
                    </div>
                    <div class="card-footer">  
                        <button type="submit" class="btn btn-primary me-2">登録</button>
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
