<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\View\View
     * 
     */
    protected function retrieveAmount(){
        return DB::select('select sum(Amount) as TotalAmount from totalAmount');
    }
    protected function retrieveTotalOfficers(){
        return DB::table('officers')->count();
    }
    protected function retrieveTotalPatients(){
        return DB::table('patients')->count();
    }
    public function index()

    {
            $totalPatients = 0;
            $totalOfficers = 0;
            $totalAmount = 0;
       // dd($this->retrieveAmount()[0]->TotalAmount);
       if($this->retrieveTotalPatients()){
           $totalPatients = $this->retrieveTotalPatients();
       }
       if($this->retrieveTotalOfficers()){
        $totalOfficers = $this->retrieveTotalOfficers();
    }
    if($this->retrieveAmount()){
        $totalAmount = $this->retrieveAmount()[0]->TotalAmount;
    }
       
        return view('dashboard',
         ['totalPatients'=>$totalPatients,
           'totalAmount'=>$totalAmount,
           'totalOfficers'=>$totalOfficers
         ]
    );
    }
}
