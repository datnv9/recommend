<center><h1>KHÔNG THỂ DỰ ĐOÁN!</h1> <h1>Độ lệch trung bình: {{$average_wrong}} </h1></center>

<form id="form-setting" class="form-horizontal" role="form" method="GET" action="/setting">
    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <label for="username" class="col-md-4 control-label">Username</label>

        <div class="col-md-6">
            <input id="username" type="text" class="form-control" name="username" value="" required autofocus>                                @if ($errors->has('email'))
            <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span> @endif
        </div>
    </div>
</form>