@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">


                <div class="panel-body">

                    <h1 class="text-center"> {{$prod->name}}</h1>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="200px">Изображение</th>
                            <th>Описание</th>
                            <th>Действия</th>
                        </tr>

                        <tr>
                            <td width="200px">
                                <img class="img-rounded" src="{{(isset($prod->picture))?'/uploads/mid/'.$prod->picture:'uploads/no_photo.jpg'}}"/>
                            </td>
                            <td> {{$prod->body}}</td>
                            <td width="100px">
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
