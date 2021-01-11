<?php

namespace App\Http\Controllers\Backend;

use App\Abstracts\Http\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CollectionRequest;
use App\Models\Cat;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InactiveUserController extends Controller
{
    public function index()
    {
        $list = User::with('shopSetting')->active()->paginate(env('DEFAULT_PAGINATE_LIMIT'));

        return view('dashboard.user.inactive-user.index', compact('list'));
    }

    public function unverify($id)
    {
        if ( auth()->user()->isAdmin() || auth()->user()->isManager()){
            $user = User::whereId($id)->first();
            $user->update(['is_account_verified'=>0]);
            flash($user->name. " User is Inactivated Successfully")->success();
        }
        else{
            flash("Only Admin or Manager can Access")->error();
        }
        return redirect()->route('inactive-customer.index');
    }

    public function show($id)
    {
        $user = User::with('shopSetting')->whereId($id)->active()->first();

        return view('dashboard.user.inactive-user.show', compact('user'));
    }


}
