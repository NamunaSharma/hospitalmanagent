<?php 

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('q');

        $patients = Patient::where('status', 'active');

        if($query) {
            $patients = $patients->where('name', 'like', '%'.$query.'%');
        }

        $patients = $patients->get();

        return view('welcome')->with(compact('patients'));
    }
}
