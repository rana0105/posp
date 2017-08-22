@extends('layouts.app')

@section('content')
	<div class="col-md-10">
    	<div class="panel-heading">
           <div class="panel-title text-left">
                <h3 class="title">Customer type</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      All Customer type
			      	<div class="col-md-9">
			      	@can('add_customertypes')
						<a href="{{ URL::route('customertypes.create') }}" class="btn btn-primary btn-sm">Create</a>
					@endcan
					</div>
			</header>
            <table class="table table-striped table-sm table-responsive">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
				<thead>
					<th>#</th>
					<th>Name</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($types as $type)
						<tr>
							<th>{{ $type->id  }}</th>
							<td>{{ $type->type_name }}</td>
							<td>
							@can('edit_customertypes')
							<a href="{{ URL::route('customertypes.edit', $type->id) }}" class="btn btn-info btn-responsive"><i class="glyphicon glyphicon-edit"></i></a>
							@endcan
							@can('delete_customertypes')
							{!! Form::open(['route' => ['customertypes.destroy', $type->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
							{!! Form::close() !!}
							@endcan
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection