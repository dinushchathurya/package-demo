<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Devninja\University\University;
use Dinushchathurya\Secretariat\Secretariat;
use Dinushchathurya\Council\Council;
use Dinushchathurya\Hospital\Hospital;
use Dinushchathurya\Division\Division;

class HomeController extends Controller
{

    /* Start of universities section */
    public function index()
    {
        $universities = University::getUniversities();
        return view('pages.welcome')->with([
            'universities' => $universities
        ]);
    }
    
    public function getFaculties($name)
    {
        $faculty = University::getFaculties($name);
        return response()->json($faculty);
    }

    public function getDegrees($name)
    {
        $degree = University::getDegrees($name);
        return response()->json($degree);
    }
    /* End of universities section */

    /* Start of divisional secretariats section */
    public function divisionalSecretariats()
    {   
        $provinces = Secretariat::getProvinces();
        return view('pages.divisional-secretariats')->with([
            'provinces' => $provinces
        ]);
    }

    public function getDivisionalSecretariatsDistricts($name)
    {
        $district = Secretariat::getDistricts($name);
        return response()->json($district);
    }

    public function getDivisionalSecretariatAuthority($name)
    {
        $authority = Secretariat::getAuthorities($name);
        return response()->json($authority);
    }
    /* End of divisional secretariats section */ 

    /* Start of local authorities section */
    public function localAuthorities()
    {
        $provinces = Council::getProvinces();
        return view('pages.local-authorities')->with([
            'provinces' => $provinces
        ]);
    }

    public function getLocalAuthoritiesDistricts($name)
    {
        $district = Council::getDistricts($name);
        return response()->json($district);
    }

    public function getLocalAuthoritiesAuthority($name)
    {
        $authority = Council::getAuthorities($name);
        return response()->json($authority);
    }
    /* End of local authorities section */

    /* Start of local authorities section */
    public function localHospitals()
    {
        $provinces = Hospital::getProvinces();
        return view('pages.local-hospitals')->with([
            'provinces' => $provinces
        ]);
    }

    public function getLocalHospitalsDistricts($name)
    {
        $district = Hospital::getDistricts($name);
        return response()->json($district);
    }

    public function getLocalHospitals($name)
    {
        $authority = Hospital::getHospitals($name);
        return response()->json($authority);
    }
    /* End of local authorities section */

    /* Start of local authorities section */
    public function gnDivisions()
    {
        $districts = Division::getDistricts();
        return view('pages.gn-divisions')->with([
            'districts' => $districts
        ]);
    }

    public function getDivisionalSecretariats($name)
    {
        $secretariat = Division::getDivisionalSecretariats($name);
        return response()->json($secretariat);
    }

    public function getDivisions($name)
    {
        $division = Division::getDivisions($name);
        return response()->json($division);
    }
    /* End of local authorities section */

    public function documentation()
    {
        return view('pages.documentation');
    }

}
