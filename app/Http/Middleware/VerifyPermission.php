<?php namespace App\Http\Middleware;

use Closure;
use App\Exceptions\PermissionDeniedException;

class VerifyPermission {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$can = $this->userCanAccessTo($request);

		if ($can)
		{
			return $next($request);
		}

		throw new PermissionDeniedException;
	}

	/**
	 * Checking the permission.
	 *
	 * @param  object  $request
	 * @return boolean
	 */
	protected function userCanAccessTo($request)
	{
		return $this->hasPermission($request);
	}

	/**
	 * Asking for the permission.
	 *
	 * @param  object  $request
	 * @return boolean
	 */
	protected function hasPermission($request)
	{
		$required = $this->requiredPermission($request);

		return $request->user()->can($required);
	}

	/**
	 * Permission require from the route.
	 *
	 * @param  object $request
	 * @return array
	 */
	protected function requiredPermission($request)
	{
		$action = $request->route()->getAction();

		return isset($action['permission']) ? $action['permission'] : null;
	}

}
