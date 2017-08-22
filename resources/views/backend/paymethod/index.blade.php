@extends('layouts.app')

@section('content')
	<div class="col-md-10">
    	<div class="panel-heading">
           <div class="panel-title text-left">
                <h3 class="title">Pament Methods</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      Pament Methods
			      	<div class="col-md-9">
			      	@can('add_paymethods')
						<a href="{{ URL::route('paymethods.create') }}" class="btn btn-primary btn-sm">Create Pament Methods</a>
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
					<th>Payment Method Name</th>
					<th>Status</th>
					<th class="text-align-center">Action</th>
				</thead>

				<tbody>
					@foreach($pay as $m)
						<tr>
							<th>{{ $m->id  }}</th>
							<td>{{ $m->pay_name  }}</td>
							<td>
								@if($m->status == 1)
	                               <button class="btn btn-success">Active</button>
		                        @endif
		                        @if($m->status == 0)
		                            <button class="btn btn-danger">Inactive</button>
		                        @endif
							</td>
							<td>
							@can('edit_methods')
								<a href="{{ URL::route('paymethods.edit', $m->id) }}" class="btn btn-info btn-responsive">
								<i class="glyphicon glyphicon-edit"></i></a>
							@endcan
							{!! Form::open(['route' => ['paymethods.destroy', $m->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
							@can('delete_methods')
							{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
							@endcan
							{!! Form::close() !!}
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
        </div>
    </div>
@endsection