<?php
namespace App\Http\Controllers\Backend\Users\Infromation;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Carbon\Carbon;

class InfromationController extends Controller {

    public function index()
    {
        $information = cache()->remember('information', Carbon::now()->addDays(6), function () {
            return Information::orderBy('updated_at', 'DESC')->get();
        });
        return view('admin.user.information.index', compact('information'));
    }

}