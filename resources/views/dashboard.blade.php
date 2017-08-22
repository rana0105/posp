@extends('layouts.app')
{!! Charts::assets() !!}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body text-center" style="margin-top: 1em">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <span class="glyphicon glyphicon-bookmark"></span> Quick Shortcuts</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                              <a href="/dashboard" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Point Of Sale</a>
                                              <a href="{{ URL::route('psales.create') }}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> <br/>Sales</a>
                                              <a href="{{url('salereport') }}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>Reports</a>
                                              <a href="{{ URL::route('outlets.index') }}" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-file"></span> <br/>Outlet</a>
                                              <a href="{{ route('users.index') }}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Users</a>
                                              <a href="{{ URL::route('settings.index') }}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-tag"></span> <br/>System Setting</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 35px">
      <div class="col-md-6">
        <center>
            {!! $purchases->render() !!}
        </center>
      </div>
      <div class="col-md-6">
        <center>
            {!! $sales->render() !!}
        </center>
      </div>
    </div>
    <div class="row" style="margin-bottom: 35px">
      <div class="col-md-8 col-md-offset-2">
        <center>
            {!! $expense->render() !!}
        </center>
      </div>
    </div>
@endsection
