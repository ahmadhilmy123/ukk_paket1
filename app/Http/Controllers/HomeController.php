<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Pembayaran;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'user' => User::find(auth()->user()->id),
            'pembayaran' => Pembayaran::orderBy('id', 'ASC')->paginate('1000'),
        ];
      
        return view('dashboard.index', $data);
      }  
}
