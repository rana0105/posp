<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pos System</title>
    @include('partial.style')
    {!! Html::style('css/login.css') !!}
</head>
<body>
    <div class="container">
        <div class="card card-container">
            
            {{-- <img id="profile-img" class="profile-img-card" src="{{asset('upload_file/resize_images/login.jpg')}}" /> --}}
            <p id="profile-name" class="profile-name-card">Point Of Sale</p>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <span id="reauth-email" class="reauth-email"></span>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 25px;">
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                {{-- <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> --}}
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>
        </div>
    </div>
@include('partial.javascript')
{!! Html::script('js/login.js') !!}
</body>
</html>


