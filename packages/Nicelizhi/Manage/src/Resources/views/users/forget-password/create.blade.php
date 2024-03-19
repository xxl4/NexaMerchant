<x-admin::layouts.anonymous>
    <div class="login-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <img 
                class="w-max" 
                src="{{ bagisto_asset('images/logo.svg') }}" 
                alt="Logo"
                height="60px"
            >
          </div>
          <div class="card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <form action="{{route('admin.forget_password.store')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="input-group mb-3">
                <input type="email"  name="email" id="email" class="form-control" placeholder="{{ trans('admin::app.users.forget-password.create.email') }}" label="{{ trans('admin::app.users.forget-password.create.email') }}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">@lang('admin::app.users.forget-password.create.submit-btn')</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <p class="mt-3 mb-1">
              <a href="{{ route('admin.session.create') }}">@lang('admin::app.users.forget-password.create.sign-in-link')</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
      <!-- /.login-box -->
</x-admin::layouts.anonymous>