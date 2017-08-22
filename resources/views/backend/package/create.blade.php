@extends('layouts.app')
@section('content')
	<div class="col-md-12 col-offset-1">
    	<div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Package Create for Product</h3>
                <hr />
            </div>
		</div>
    </div>
    <div class="col-md-12">
    	<form action="{{ route('packages.store') }}" method="POST" files="true">
			{{ csrf_field() }}
            <div class="row main">
            	<div class="col-md-9">
		            <div class="col-xs-6 col-sm-6 col-md-6">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">Date</label>
		                    <div class="cols-sm-10">
		                        <input type="date" name="date" id="date" class="form-control"  placeholder="Date..."/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-6 col-sm-6 col-md-6">
		                <div class="form-group {{ $errors->has('pakage_name') ? ' has-error' : '' }}">
		                    <label for="pakage_name" class="cols-sm-2 control-label">Package Name</label>
		                    <div class="cols-sm-10">
		                        <input type="text" name="pakage_name" id="pakage_name" class="form-control"  placeholder="Enter Package Name.." required="" />
		                      <small class="text-danger">{{ $errors->first('pakage_name') }}</small>
		                     </div>
		                </div>
		            </div>
		            {{-- <div class="col-xs-6 col-sm-6 col-md-6">
		                <div class="form-group {{ $errors->has('pac_name') ? ' has-error' : '' }}">
		                    <label for="pac_name" class="cols-sm-2 control-label">Package Category</label>
		                    <div class="cols-sm-10">
		                        <select class="form-control" name="pac_name">
		                        	<option value="0" disabled="true" selected="ture">--Select--</option>
		                        	@foreach($pacate as $pcat)
		                        		<option value="{{ $pcat->id }}">{{ $pcat->pac_name }}
		                        		</option>
		                        	@endforeach
		            		    </select> 
		                        <small class="text-danger">{{ $errors->first('supplier_name') }}</small>
		                    </div>
		                </div>
		            </div> --}}
					<div class="form-group">
		            	<label for="product" class="cols-sm-2 control-label">Add Product</label>
		                <div class="col-lg-12 col-sm-12">
					       	<table class="table table-responsive table-bordered">
					       		<thead>
					       			<th>Product Type</th>
					       			<th>Quantity</th>
					       			<input type="hidden" id="ppro" value="{{$product}}">
									<th style="text-align: center;"><a  class="btn btn-success btn-sm pacAdd"  href="javascript:void(0)" ><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></a></th>
					       		</thead>
					       		<tbody>
					       			<tr>
					       				<td style="width: 250px;">
					       					<select class="livesearch form-control"  name="pname[]" style="height: 34px;">
		                                    	<option value="0" disabled="trform-controlue" selected="ture">--Select--</option>
				                            	@foreach($product as $products)
				                            		<option value="{{ $products->id }}">{{ $products->name }}
				                            		</option>
				                            	@endforeach
		                        		    </select>
					       				</td>
					       				<td><input type="text" name="pqtn[]" class="form-control pqtn"></td>
					       				<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
					       			</tr>
					       		</tbody>
				       		</table>
			       		</div>
		       		</div>
	       		</div>
	       		<div class="col-md-3">
	       		<h5 style="text-align: center;"><b>Package Price</b></h5>
		       		<table class="table table-responsive table-bordered">
			       		<tfoot>
							{{-- <tr>
			       				<td>Total</td>
			       				<td><b class="total" id="total"></b></td>
			       			</tr>
			       			<tr>
			       				<td>Total Discount</td>
			       				<td><b class="discount"><input type="text" name="discount" class="form-control discount" id="discount_input"></b></td>
			       			</tr>
			       			<tr> --}}
			       				{{-- <td>Net Total</td> --}}
			       				<td><input type="text" name="pat_price" id="pat_price" value="" class="form-control pat_price"></td>
			       			</tr>
			       			{{-- <tr>
			       				<td>Payment</td>
			       				<td><b class="payment"><input type="text" name="payment" class="form-control" id="payment_input"></b></td>
			       			</tr>
			       			<tr>
			       				<td>Due</td>
			       				<td><input type="text" name="due" readonly="" class="form-control due"></td>
			       			</tr> --}}
			       		</tfoot>
			       	</table>
			    </div>
		    </div>
		    <div class="col-xs-6 col-sm-6 col-md-6">
            	<div class="form-group">
	                {{-- <label for="status">Please Checked Field <span class="required">*</span></label>
	                <br /> --}}
	                {{-- <input id="status" name="status" type="radio" class="" value="1"  />
	                <label for="tenant_status" class="">Product</label> --}}

	                {{-- <input id="status" name="status" type="radio" class="" value="0"  />
	                <label for="status" class="">Package</label> --}}
                </div>
            </div>
		    <div class="form-group">
				<input type="submit"  value="Submit" class="btn btn-success" style="margin-bottom: 50px;">
				<a href="{{ URL::route('packages.index') }}" class="btn btn-warning btn-responsive" style="margin-bottom: 50px;">Cancel</a>
			</div>
		</form>
	</div>
@endsection
