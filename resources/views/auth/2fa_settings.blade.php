{{--  <div class="col-md-4 m-auto">
    <div class="card">
        <div class="card-header">{{ __('Two Factor Authentication') }}</div>
        <div class="card-body">  --}}



            @if ($data['user']->loginSecurity == null)
                {!! Form::open(['route' => 'generate2faSecret', 'method' => 'POST']) !!}

                {{ csrf_field() }}
                <div class="form-group">

                    {{ Form::submit(__('Generate Secret Key to Enable 2FA'), ['class' => 'btn btn-primary ']) }}

                </div>
                {!! Form::close() !!}



            @elseif(!$data['user']->loginSecurity->google2fa_enable)
            <div class="row">
                <div class="col-md-12">
                    <p><strong>{{ __('1. Scan this QR code with your Google Authenticator App. Alternatively, you can use the code') }}
                            {{--  <dfn>{{ __('Google Authenticator App') }}</dfn>  --}}<br/>
                            {{ __('2. Enter the pin from Google Authenticator app') }}</strong>
                    </p>
                </div>
                <div class="col-md-12">
                    <img src="{{ $data['google2fa_url'] }}" alt="">
                </div>
                <div class="col-md-12">
                    <p>{{ __('To enable 2-Factor Authentication verify QRCode') }} </p>
                </div>
                <div class="col-sm-6">
                    {!! Form::open(['route' => 'enable2fa', 'method' => 'POST']) !!}

                    {{ csrf_field() }}
                    <div class="form-group">

                        {{ Form::label('secret', __('Authenticator Code'), ['class' => 'control-label form-label']) }}
                        {{ Form::password('secret', ['class' => 'form-control', 'required','placeholder' => 'Verification code']) }}
                    </div>

                    {{ Form::submit(__('Enable 2FA'), ['class' => 'btn btn-primary ']) }}

                    {!! Form::close() !!}
                </div>
            </div>


            @elseif($data['user']->loginSecurity->google2fa_enable)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ __('2FA is currently') }} <strong>{{ __('enabled') }}</strong>
                        {{ __('on your account.') }}
                    </div>
                </div>


                <div class="col-sm-12">
                    {!! Form::open(['route' => 'disable2fa', 'method' => 'POST']) !!}

                    {{ csrf_field() }}
                    <div class="form-group">

                        {{ Form::label('current-password', __('Current Password'), ['class' => 'control-label form-label']) }}
                        {{ Form::password('current-password', ['class' => 'form-control', 'required','placeholder' => 'Current Password']) }}

                    </div>
                    {{ Form::submit(__('Disable 2FA'), ['class' => 'btn btn-primary ']) }}

                    {!! Form::close() !!}
                </div>
            </div>
                {{--  <div class="alert alert-success">
                    {{ __('2FA is currently') }} <strong>{{ __('enabled') }}</strong>
                    {{ __('on your account.') }}
                </div>

                {!! Form::open(['route' => 'disable2fa', 'method' => 'POST']) !!}

                {{ csrf_field() }}
                <div class="form-group">

                    {{ Form::label('current-password', __('Current Password'), ['class' => 'control-label']) }}
                    {{ Form::password('current-password', ['class' => 'form-control', 'required']) }}

                </div>
                {{ Form::submit(__('Disable 2FA'), ['class' => 'btn btn-primary ']) }}

                {!! Form::close() !!}  --}}

            @endif
        {{--  </div>
    </div>
</div>  --}}
