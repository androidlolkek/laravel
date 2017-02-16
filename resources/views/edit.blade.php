@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form  action="{{asset('edit/'.$product->id)}}"
					method= post>
					{{ csrf_field() }}
					
  <div class="form-group">
    <label for="name">Наименование</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$product->name}}">
  </div>
  <div class="form-group">
    <label for="body">Описание</label>
    <textarea id=body name="body" class="form-control" rows="3">{{$product->body}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="form-group">
  <label for="cat_id"></label>
    <select name="cat_id" class="form-control">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
	</select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
