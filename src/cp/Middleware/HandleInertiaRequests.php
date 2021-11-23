<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Saeedsalem\Windmill\Support\Theme;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'isDark' => Theme::darkMode(),
            'style' => setting('general.style')??config('windmill.theme.mode'),
            'appName' => setting('general.appName')??config('app.name'),
            'language' => setting('general.language')??config('app.locale'),
            'user' => auth()->user()??null,
            'hasPermissions' => [
                'view_users' => auth()->user()?auth()->user()->can('view_users'):false,
                'view_roles' => auth()->user()?auth()->user()->can('view_roles'):false,
                'edit_settings' => auth()->user()?auth()->user()->can('edit_settings'):false,
            ],
            'flash' => [
                'message' => fn () => $request->session()->get('message')
            ],
        ]);
    }
}
