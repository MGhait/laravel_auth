<!DOCTYPE html>
@section('title', 'Back Reset Password Page')
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets-back') }}/"
  data-template="vertical-menu-template-free">

 @include('back.partials.authHead')
  <body>

    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
              <div class="card-body">
                @include('back.partials.authLogo')
                <h4 class="mb-2">Rest Password 🔒</h4>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form id="formAuthentication" class="mb-3" action="{{ route('back.password.store') }}" method="POST">
                  @csrf

                  <!-- Password Reset Token -->
                  <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email" value="{{ old('email', $request->email) }}"
                        placeholder="Enter your email"

                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input
                            type="password"
                            id="password"
                            class="form-control" autofocus
                            name="password" autocomplete="new-password"
                            placeholder="Enter Your New Password"
                            />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password_confirmation">Password Confirmation</label>
                    <div class="input-group input-group-merge">
                        <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password_confirmation"
                        placeholder="Enter Your New Password Again"
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                  <button class="btn btn-primary d-grid w-100">Reset Password</button>
                </form>
                <div class="text-center">
                  <a href="{{ route('back.login') }}" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    Back to login
                  </a>
                </div>
              </div>
            </div>
            <!-- /Forgot Password -->
          </div>
        </div>
      </div>

      <!-- / Content -->
    @include('back.partials.authScripts')

  </body>
</html>
