<?php

namespace Modules\SIGAC\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SICA\Entities\App;
use Modules\SICA\Entities\Environment;
use Modules\SICA\Entities\Program;

class AttendanceController extends Controller
{
    /* Consultar Excusas de Aprendiz */
    public function consult_excuses()
    {
        $view = ['titlePage'=>trans('sigac::consult.Consultation'), 'titleView'=>trans('sigac::consult.Attendance Consultation')];
        $apps = App::get();
        return view('sigac::attendance.excuses', compact('apps', 'view'));
    }

    /* Consultar Asistencia de Aprendiz o Titulada */
    public function consult_attendance()
    {
        $view = ['titlePage'=>trans('sigac::consult.Consultation'), 'titleView'=>trans('sigac::consult.Attendance Consultation')];
        $apps = App::get();
        return view('sigac::attendance.index', compact('apps', 'view'));
    }

    /* Registrar asistencia de aprendiz por titulada */
    public function index()
    {
        $view = ['titlePage'=>trans('sigac::attendance.Attendance'), 'titleView'=>trans('sigac::attendance.Attendance Registration')];
        $apps = App::get();
        return view('sigac::attendance.register', compact('apps', 'view'));
    }
    

    public function reports_attendance()
    {
        $view = ['titlePage'=>trans('sigac::reports.TitlePage'), 'titleView'=>trans('sigac::reports.TitleView')];
        $apps = App::get();
        return view('sigac::reports.index', compact('apps', 'view'));
    }

}
