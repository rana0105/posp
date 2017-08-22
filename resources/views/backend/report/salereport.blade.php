@extends('layouts.app')

@section('content')
	<div class="col-md-12">
    	<div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Sales Report</h3>
                <hr/>
                
                	<div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">From Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="dform" id="dform" class="form-control"/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">To Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="dto" id="dto" class="form-control" />
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 0;">
			            <div class="form-group">
			            	<label for="date" class="cols-sm-2 control-label"></label>
		                    <div class="cols-sm-6">

							<input type="submit"  value="Submit" class="btn btn-success ssubmit" id="pur-report">
							</div>
						</div>
					</div>
					<table class="table table-striped table-responsive" >
                	<thead>
            			<th>ID</th>
            			<th>Date</th>
            			<th>Total Amount</th>
            			<th>Total Discount</th>
            			<th>Due</th>
            		</thead>
                	<tbody id="datashow">
						 @foreach($sales as $sale)
						 	<tr class="pur-amount">
								<td>{{ $sale->id }}</td>
								<td>{{ date("Y-m-d", strtotime($sale->created_at)) }}</td>
								<td>{{ $sale->stotal_amount }}</td>
								<td>{{ $sale->st_discount }}</td>
								<td>{{ $sale->sdue }}</td>
							</tr>
						@endforeach
                	</tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection