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

class NewCustomerController extends Controller
{
    public function index()
    {
        $list = User::with('shopSetting')->inActive()->paginate(env('DEFAULT_PAGINATE_LIMIT'));

        return view('dashboard.user.new-customer.index', compact('list'));
    }

    public function verify($id)
    {
        if ( auth()->user()->isAdmin() || auth()->user()->isManager()){
            $user = User::whereId($id)->first();
            $user->update(['is_account_verified'=>1]);
            flash($user->name. " Customer is verified Successfully")->success();
        }
        else{
            flash("Only Admin or Manager Verify Customer")->error();
        }
        return redirect()->route('new-customer.index');
    }

    public function show($id)
    {
        $user = User::with('shopSetting')->whereId($id)->inActive()->first();

        return view('dashboard.user.new-customer.show', compact('user'));
    }


    public function destroy($id)
    {

        User::whereId($id)->delete();

        flash("Customer deleted Successfully")->success();

        return redirect()->route('new-customer.index');
    }
}
