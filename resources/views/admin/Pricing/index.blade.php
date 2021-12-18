@extends('layouts.admin')

@section('title')
    Обо мне
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">сервис</h1>
            <ul>
                <li><a href="{{route('pricing.create')}}">Добавить новые данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row m-0 py-3">
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>title_1</th>
                                            <th>text_1</th>
                                            <th>text_2</th>
                                            <th>text_3</th>
                                            <th>text_4</th>
                                           
                                            <th>Image</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody class="result">
                                        @foreach($pricing as $pric)
                                            <tr>
                                              
                                                <td>{{ $pric->title_1 }}</td>
                                                <td>{{ $pric->text_1 }}</td>
                                                <td>{{ $pric->text_2 }}</td>
                                                <td>{{ $pric->text_3 }}</td>
                                                <td>{{ $pric->text_4 }}</td>
                                                <td><img src="{{ asset('storage/' . $pric->image) }}" style="width: 200px;" /></td>
                                                <td class="d-flex">
                                                    <a class="text-success mr-2" href="{{ route('pricing.edit', $pric->id) }}"><i class="nav-icon fas fa-pen font-weight-bold"></i></a>
                                                    <a data-toggle="modal" data-target="#deletesModal{{$pric->id}}" class="text-danger mr-2" href="#"><i class="nav-icon far fa-times-circle font-weight-bold"></i></a>
                                                    <div class="modal fade" id="deletesModal{{$pric->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog" role="document">  
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModal">Удалить пост?</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">
                                                                            <b>Вы действительно хотите удалить?</b>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('pricing.destroy', $pric->id) }}" method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button class="btn btn-danger mr-2 cursor-pointer">Удалить</button>
                                                                    </form>
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Закрыть</button>
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
                </div>
            </div>
        </div>
    </div>
@endsection
