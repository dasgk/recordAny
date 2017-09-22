<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait AuthenticatesUsers
{
	use RedirectsUsers, ThrottlesLogins;

	public function rules(){
		return array('phone'=>'regex:/^1[34578][0-9]{9}$/');
	}


	/**
	 * Show the application's login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showLoginForm()
	{
		return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 */
	public function login(Request $request)
	{
		$msg = $this->validateLogin($request);
		if (true === $msg) {
			// If the class is using the ThrottlesLogins trait, we can automatically throttle
			// the login attempts for this application. We'll key this by the username and
			// the IP address of the client making these requests into this application.
			if ($this->hasTooManyLoginAttempts($request)) {
				$this->fireLockoutEvent($request);
				return $this->sendLockoutResponse($request);
			}
			if ($this->attemptLogin($request)) {
				return $this->sendLoginResponse($request);
			}
			// If the login attempt was unsuccessful we will increment the number of attempts
			// to login and redirect the user back to the login form. Of course, when this
			// user surpasses their maximum number of attempts they will get locked out.
			$this->incrementLoginAttempts($request);
			return $this->sendFailedLoginResponse($request);
		} else {
			//验证未通过，发送指定错误信息
			return $this->sendFailedLoginResponse($request, $msg);
		}

	}

	/**
	 * Validate the user login request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return void
	 */
	protected function validateLogin(Request $request)
	{
		$validitor = Validator::make($request->all(), [
			$this->username() => 'required|phone',
			'password' => 'required',
		]);
		if ($validitor->fails()) {
			if ($request->expectsJson()) {
				return  $validitor->errors()->first();
			}
			return false;
		}
		return true;
	}

	/**
	 * Attempt to log the user into the application.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return bool
	 */
	protected function attemptLogin(Request $request)
	{
		return $this->guard()->attempt($this->credentials($request), $request->has('remember'));
	}

	/**
	 * Get the needed authorization credentials from the request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return array
	 */
	protected function credentials(Request $request)
	{
		return $request->only($this->username(), 'password');
	}

	/**
	 * Send the response after the user was authenticated.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	protected function sendLoginResponse(Request $request)
	{
		$request->session()->regenerate();

		$this->clearLoginAttempts($request);
		//如果是ajax请求
		if ($request->expectsJson()) {
			return response()->json('success', 200);
		}
		return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath());
	}

	/**
	 * The user has been authenticated.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  mixed $user
	 * @return mixed
	 */
	protected function authenticated(Request $request, $user)
	{
		//
	}

	/**
	 * Get the failed login response instance.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	protected function sendFailedLoginResponse(Request $request, $msg = '')
	{
		$errors = trans('auth.loginfaild');
		if ($request->expectsJson()) {
			if (empty($msg)) {
				return response()->json($errors, 200);
			} else {
				return response()->json($msg, 200);
			}
		}
		return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors($errors);
	}

	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username()
	{
		return 'user_name';
	}

	/**
	 * Log the user out of the application.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function logout(Request $request)
	{
		$this->guard()->logout();
		$request->session()->flush();
		$request->session()->regenerate();
		return redirect('/');
	}

	/**
	 * Get the guard to be used during authentication.
	 *
	 * @return \Illuminate\Contracts\Auth\StatefulGuard
	 */
	protected function guard()
	{
		return Auth::guard();
	}
}
