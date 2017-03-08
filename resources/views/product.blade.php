@extends('layouts.app')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h1 class="text-center"> {{$prod->name}}</h1>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th width="100px">Изображение</th>
                                <th width="600px">Описание</th>
                                <th width="100px">Действия</th>
                            </tr>
                            <tr>
                                <td>
                                    <img class="img-rounded" src="{{(isset($prod->picture))?'/uploads/mid/'.$prod->picture:'uploads/no_photo.jpg'}}"/>
                                </td>
                                <td > {!! $prod->body !!}</td>
                                <td>
                                    <a href="{{asset('order/'.$prod->id)}}"class="btn btn-block">
                                        Заказать
                                    </a>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection