@extends('layouts.app')

@section('content')
	<div class="col-md-10">
    	<div class="panel-heading">
           <div class="panel-title text-left">
                <h3 class="title">Outlet Name</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      Outlet Name
			      	<div class="col-md-9">
			      	{{-- @can('add_excategories') --}}
						<a href="{{ URL::route('outlets.create') }}" class="btn btn-primary btn-sm">Create</a>
					{{-- @endcan --}}
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
					<th>Outlet Name</th>
					<th>Contact Number</th>
					<th>Address</th>
					<th>Status</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($out as $om)
						<tr>
							<th>{{ $om->id  }}</th>
							<td>{{ $om->out_name }}</td>
							<th>{{ $om->out_contact  }}</th>
							<td>{{ $om->out_address }}</td>
							<td>
								@if($om->status == 1)
	                               <button class="btn btn-success">Active</button>
		                        @endif
		                        @if($om->status == 0)
		                            <button class="btn btn-danger">Inactive</button>
		                        @endif
							</td>
							<td>
							{{-- @can('edit_excategories') --}}
							<a href="{{ URL::route('outlets.edit', $om->id) }}" class="btn btn-info btn-responsive"><i class="glyphicon glyphicon-edit"></i></a>
							{{-- @endcan
							@can('delete_excategories') --}}
							{!! Form::open(['route' => ['outlets.destroy', $om->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
							{!! Form::close() !!}
							{{-- @endcan --}}
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection