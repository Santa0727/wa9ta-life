<x-guest-layout>
  <!-- Login 17 start -->
  <div class="login-17">
    <div class="container">
      <div class="col-md-12 pad-0">
        <div class="row login-box-6">
          <div class="logo">
            <img src="{{ asset('images/logo.png') }}" width="80" draggable="false" />
          </div>
          <div class="col-lg-5 col-md-12 col-sm-12 col-pad-0 bg-img align-self-center none-992">
            <a href="/">
              <img src="{{ asset('images/logo.png') }}" class="logo" draggable="false">
            </a>
            <p>PCR test head office department for direct communication please press support or whats up button</p>
            <a href=" https://api.whatsapp.com/send?1=pt_BR&phone=+971501212770" class="btn-outline">Support</a>
          </div>
          <div class="col-lg-7 col-md-12 col-sm-12 col-pad-0 align-self-center">
            <div class="login-inner-form">
              <div class="details">
                <h3>Log In</h3>
                @includeIf("layouts.msg")
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group">
                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="email"
                      value="{{ old('email') }}" name="email" placeholder="E-mail Address" required>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                      <p>{{ $errors->first('email') }}</p>
                    </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                      name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <p>{{ $errors->first('password') }}</p>
                    </span>
                    @endif
                  </div>
                  <div class="checkbox clearfix">
                    <div class="form-check checkbox-theme">
                      <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">
                        Remember me
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn-md btn-theme btn-block"> Log In </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login 17 end -->

</x-guest-layout>