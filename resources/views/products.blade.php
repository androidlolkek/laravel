@extends('layouts.app')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">{{(isset($cat->name))?$cat->name:'Новые товары'}}</div>

                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th width="200px">Изображение</th>
                                <th>Название</th>
                                <th>Действия</th>
                            </tr>
                            @foreach($products as $one)
                                <tr>
                                    <td width="200px">
                                        <img class="img-rounded" src="{{(isset($one->picture))?'/uploads/mid/'.$one->picture:'uploads/no_photo.jpg'}}"/>
                                    </td>
                                    <td> {{$one->name}}</td>
                                    <td width="200px">
                                        <a id="good-{{$one->id}}-{{$one->price}}" href="#" class="btn btn-block btn-default addCart">В корзину ({{$one->price}})</a>
                                        <a href="{{asset('order/'.$one->id)}}"class="btn btn-block btn-default">
                                            Заказать
                                        </a>
                                        <a href="{{asset('product/'.$one->id)}}"class="btn btn-block btn-default">
                                            Открыть
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection