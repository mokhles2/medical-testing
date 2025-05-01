<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Hospital;
use App\Models\MedicalHistory;
use App\Models\User;
use Illuminate\Http\Request;

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
        $patientsNumber=User::where('status' , 'patient')->count();
        $historiesNumber=MedicalHistory::all()->count();
        $branchNumber=Branch::all()->count();
        $hospitalNumber = Hospital::all()->count();
        $good=MedicalHistory::where('status','Good')->count();
        $middel=MedicalHistory::where('status','Need Follow up')->count();
        $bad=MedicalHistory::where('status','Serious')->count();


        $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('doughnut')
        ->size(['width' => 340, 'height' => 200])
        ->labels(['Good' , 'Need Follow up' ,'Serious'])
        ->datasets([
            [
                'backgroundColor' => ['#28a745', '#ffc107' , '#dc3545'],
                'data' => [$good, $middel , $bad]
            ]
        ])
        ->options([]);

        $chartjs_2 = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 340, 'height' => 200])
        ->labels(['Patients Number' , 'Medical Histories Number' , 'City Number' , 'Hospitals Number' ])
        ->datasets([
            [
            "data" => [$patientsNumber, $historiesNumber, $branchNumber, $hospitalNumber],
            "backgroundColor" => [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
            ],
            "borderColor" => [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
            ],
            "borderWidth" => 1
          ]
        ])
        ->options([]);
        return view('admin.dashboard.home' , compact('patientsNumber','historiesNumber' ,'branchNumber' ,'hospitalNumber' ,'chartjs' ,'chartjs_2'));

    }
}
