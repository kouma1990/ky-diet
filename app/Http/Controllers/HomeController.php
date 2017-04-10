<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\DietData;

use App\Http\Requests\CreateDietData;

use Carbon\Carbon;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = DietData::select(["date"])->groupBy("date")->orderBy("date")->get()->pluck("date");
        $diet_data = DietData::orderBy("date")->get();
        return view('home', compact('dates', 'diet_data'));
    }
    
    public function createDietData(CreateDietData $request)
    {
        // date, user_idで一致するものがあればupdate, なければcreate
        DietData::updateOrCreate(
            [
                "date" => $request->date,
                "user_id" => \Auth::user()->id,
            ],[
                "weight" => $request->weight,
            ]);
        return redirect()->back();
    }
}
