@extends('layouts.app')

@section('content')
	<div class="col-md-12">
    	<div class="panel-heading">
           <div class="panel-title text-left">
                <h3 class="title">Package</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      All Package
			      	<div class="col-md-11">
			      	@can('add_purchases')
						<a href="{{ URL::route('packages.create') }}" class="btn btn-primary btn-sm">Create Package</a>
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
					<th>Package Name</th>
					<th>Status</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($packages as $pac)
						<tr>
						<th>{{ $pac->id }}</th>
							<th>{{ $pac->name }}</th>
							<td>
							  @if($pac->actinact == 1)
                        	  <button class="btn btn-success">Active</button>
	                          @endif
	                          @if($pac->actinact == 0)
	                            <button class="btn btn-danger">Inactive</button>
	                          @endif  
							</td>
							<td>
							{{-- @can('edit_purchases') --}}
								<a href="{{ URL::route('packages.edit', $pac->id) }}" class="btn btn-info btn-responsive">
								<i class="glyphicon glyphicon-edit"></i></a>
							{{-- @endcan
							@can('delete_purchases') --}}
							{{-- {!! Form::open(['route' => ['product.destroy', $pac->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
							{!! Form::close() !!} --}}
							{{-- @endcan --}}
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection