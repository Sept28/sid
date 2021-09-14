<?php

namespace App\Http\Controllers;

use App\Models\Birth;
use App\Models\Comer;
use App\Models\Death;
use App\Models\FamilyCard;
use App\Models\Mover;
use App\Models\Villager;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $villager     = Villager::where('status', 'ada');
        $family     = FamilyCard::get();
        $comer     = Comer::get();
        $mover     = Mover::get();
        $birth     = Birth::get();
        $death     = Death::get();
        $pie     = [
            'l' => Villager::where([['gender', 'L'], ['status', 'ada']])->count(),
            'p' => Villager::where([['gender', 'P'], ['status', 'ada']])->count(),
        ];

        $lcomer     = [
            'sept' => Comer::whereMonth('arrival_date', '09')->count(),
            'okt' => Comer::whereMonth('arrival_date', '10')->count(),
            'nov' => Comer::whereMonth('arrival_date', '11')->count(),
            'des' => Comer::whereMonth('arrival_date', '12')->count(),
            'jan' => Comer::whereMonth('arrival_date', '01')->count(),
            'feb' => Comer::whereMonth('arrival_date', '02')->count(),
        ];

        $lmover     = [
            'sept' => Mover::whereMonth('date', '09')->count(),
            'okt' => Mover::whereMonth('date', '10')->count(),
            'nov' => Mover::whereMonth('date', '11')->count(),
            'des' => Mover::whereMonth('date', '12')->count(),
            'jan' => Mover::whereMonth('date', '01')->count(),
            'feb' => Mover::whereMonth('date', '02')->count(),
        ];

        $barbirth   = [
            'sept' => Birth::whereMonth('birth_date', '09')->count(),
            'okt' => Birth::whereMonth('birth_date', '10')->count(),
            'nov' => Birth::whereMonth('birth_date', '11')->count(),
            'des' => Birth::whereMonth('birth_date', '12')->count(),
            'jan' => Birth::whereMonth('birth_date', '01')->count(),
            'feb' => Birth::whereMonth('birth_date', '02')->count(),
        ];

        $bardeath   = [
            'sept' => Death::whereMonth('obit', '09')->count(),
            'okt' => Death::whereMonth('obit', '10')->count(),
            'nov' => Death::whereMonth('obit', '11')->count(),
            'des' => Death::whereMonth('obit', '12')->count(),
            'jan' => Death::whereMonth('obit', '01')->count(),
            'feb' => Death::whereMonth('obit', '02')->count(),
        ];

        return view('pages.dashboard')->with([
            'villager' => $villager,
            'family' => $family,
            'comer' => $comer,
            'mover' => $mover,
            'birth' => $birth,
            'death' => $death,
            'pie' => $pie,
            'lcomer' => $lcomer,
            'lmover' => $lmover,
            'barbirth' => $barbirth,
            'bardeath' => $bardeath,
        ]);
    }
}
