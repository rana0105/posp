@extends('layouts.app')

@section('content')
	<div class="col-md-10">
    	<div class="panel-heading">
           <div class="panel-title text-left">
                <h3 class="title">Product Category</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      All Product Category
			      	<div class="col-md-9">
			      	@can('add_procategories')
						<a href="{{ URL::route('procategoies.create') }}" class="btn btn-primary btn-sm">Create Category</a>
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
					@foreach($procates as $procate)
						<tr>
							<th>{{ $procate->id  }}</th>
							<td>{{ $procate->name }}</td>
							<td>
							@can('edit_procategories')
								<a href="{{ URL::route('procategoies.edit', $procate->id) }}" class="btn btn-info btn-responsive">
								<i class="glyphicon glyphicon-edit"></i></a>
							@endcan
							@can('delete_procategories')
							{!! Form::open(['route' => ['procategoies.destroy', $procate->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
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