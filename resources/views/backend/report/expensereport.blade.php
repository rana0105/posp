@extends('layouts.app')

@section('content')
	<div class="col-md-12">
    	<div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Expense Report</h3>
                <hr/>
                
                	<div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">From Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="datform" id="datform" class="form-control"/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">To Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="datdto" id="datdto" class="form-control" />
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 0;">
			            <div class="form-group">
			            	<label for="date" class="cols-sm-2 control-label"></label>
		                    <div class="cols-sm-6">

							<input type="submit"  value="Submit" class="btn btn-success exsubmit" id="pur-report">
							</div>
						</div>
					</div>
					<table class="table table-striped table-responsive" >
                	<thead>
            			<th>ID</th>
            			<th>Date</th>
            			<th>Total Amount</th>
            		</thead>
                	<tbody id="exdatashow">
						 @foreach($expe as $ex)
						 	<tr class="pur-amount">
								<td>{{ $ex->id }}</td>
								<td>{{ $ex->ex_date }}</td>
								<td>{{ $ex->ex_amount }}</td>
							</tr>
						@endforeach
                	</tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection