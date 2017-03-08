@extends('layouts.app')

@section('styles')
    @parent
    <link href="{{asset("/css/home.css")}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Корзина заказов</div>

                    <div class="panel-body">
                        <form action="{{asset('order')}}" method=post>
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input name="phone" type="text" class="form-control" id="phone"
                                       placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="contacts">Больше контактов</label>
                                <textarea name="contacts" id="contacts" class="form-control" rows="3"></textarea>
                            </div>
                            <hr/>

                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th width="200px"> Изображение</th>
                                    <th> Название</th>
                                    <th> Цена</th>
                                    <th> Количество</th>
                                    <th> Сумма</th>
                                    <th width="200px"> Действие</th>
                                </tr>
                                <?php $itogo = 0 ?>
                                @foreach($tovars as $key=>$value)
                                    <?php $counts =  $tovs[$value['id']]?>
                                    <?php $summ =  $counts*$value['price']?>
                                    <?php $itogo += $summ ?>

                                    <tr>
                                        <td width="200px"> Изображение</td>
                                        <td> {{$value['name']}}</td>
                                        <td> {{$value['price']}}</td>
                                        <td>
                                            <input type="number" name = {{$value->id}} value="{{$counts}}">
                                        </td>
                                        <td> {{$summ}}</td>
                                        <td width="200px">
                                            <button type="submit" class="btn btn-block btn-danger" href="">Удалить</button>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="5" align="right" class="right">Итого: {{$itogo}}</th>
                                    <th> <button type="submit" class="btn btn-block btn-success" href="">Подтвердить</button></th>
                                </tr>

                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection