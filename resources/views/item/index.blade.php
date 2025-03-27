@extends('adminlte::page')

@section('title', '応募企業一覧')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@stop

@section('content_header')
    <h1>応募企業一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">応募企業一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">企業登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>企業名</th>
                                <th>志望度</th>
                                <th>選考の進捗</th>
                                <th>企業詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                        @csrf 
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->preference }}</td>
                                    <td>{{ $item->progress }}</td>
                                    <td>
                                        <div class="col-3">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}">企業詳細</button>
                                                    <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" area-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h2 class="modal-title">企業の詳細</h2>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body fs-3">
                                                                    <div class="row">
                                                                        <div class="col-4">企業名</div>
                                                                        <div class="col-8">{{ $item->name }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">志望度</div>
                                                                        <div class="col-8">{{ $item->preference }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">選考の進捗</div>
                                                                        <div class="col-8">{{ $item->progress }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">良いところ</div>
                                                                        <div class="col-8">{{ $item->good }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">懸念点</div>
                                                                        <div class="col-8">{{ $item->bad }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">メモ</div>
                                                                        <div class="col-8">{{ $item->memo }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">元のサイト</div>
                                                                        <div class="col-8">{{ $item->site_name }}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">URL</div>
                                                                        <div class="col-8">
                                                                            <a href="{{ $item->url }}">{{ $item->url }}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer fs-4">
                                                                    <a href="/edit/{{ $item->id }}" class="btn btn-primary">編集</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@stop
