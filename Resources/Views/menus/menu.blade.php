@extends('app')
@section('content')

<div class="container">
	<div class="col-sm-9">

    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if (Session::has('message'))
    <div class="alert alert-success">
      <ul>
        <li>{{ Session::get('message') }}</li>
      </ul>
    </div>
    @endif

    <div class="container">
      <div class="col-sm-9">
        <a class="btn btn-default" href="{{ url('admin/menus/create') }}" role="button">Add new menu</a>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>is_Active</th>
              <th>Description</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($menus as $menu)
            <tr>
              <th scope="row">{{$menu->id}}</th>
              <td>{{$menu->title}}</td>
              <td>{{$menu->is_active}}</td>
              <td>{{$menu->description}}</td>
              <td>
                @if(\CMS::permissions()->can('edit', 'Menus'))
                  <a class="btn btn-default" href='{{ url("admin/menus/edit/$menu->id") }}' role="button">Edit</a>
                @endif

                @if(\CMS::permissions()->can('delete', 'Menus'))
                  <a class="btn btn-default" href='{{ url("admin/menus/delete/$menu->id") }}' role="button">Delete</a>
                @endif

                @if(\CMS::permissions()->can('edit', 'Menus'))
                  @if($menu->is_active == 0)
                    <a class="btn btn-default" href='{{ url("admin/menus/activate/$menu->id") }}' role="button">Activate</a>
                  @else
                    <a class="btn btn-default active" href='{{ url("admin/menus/deactivate/$menu->id") }}'  role="button">Deactivate</a>
                  @endif
                @endif

                @if(\CMS::permissions()->can('show', 'MenuItems'))
                  <a class="btn btn-default" href='{{ url("admin/menus/menuitem/show/$menu->menu_slug") }}' role="button">Menu items</a>
                @endif
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

