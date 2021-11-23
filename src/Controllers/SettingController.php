<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class SettingController extends Controller
{
    public function index()
    {
        abort_if(!auth()->user()->can('edit_settings'), 403);
        $roles = Role::all();
        return Inertia::render('Dashboard/Settings/Index', ['roles' => $roles]);
    }
    public function general(Request $request)
    {
        abort_if(!auth()->user()->can('edit_settings'), 403);
        setting(['general' => [
            'appName' => $request->input('appName'),
            'language' => $request->input('language'),
            'style' => $request->input('style')
        ]])->save();
        return redirect()->route('settings.index')->with('message', 'Settings saved successfully.');
    }
}
