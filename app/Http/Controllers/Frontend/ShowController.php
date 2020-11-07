<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function show($type, $item)
    {
        $user = Auth::guard('web')->user();
        switch ($user->account_type) {
            case 'camera':
                $item = Contract::with('items')->findOrFail($item);
                return view('frontend.camera.show', compact('type', 'item'));
                break;
            case 'safety':
                return "safety";
                break;
            default:
                $item = Structure::findOrFail($item);
                return view('frontend.consultation.show', compact('type', 'item'));
                break;
        }
    }
}
