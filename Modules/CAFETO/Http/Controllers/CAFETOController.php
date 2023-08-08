<?php

namespace Modules\CAFETO\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\SICA\Entities\App;

class CAFETOController extends Controller
{

    public function index(){
        $view = ['titlePage'=>'Inicio', 'titleView'=>'Página Principal'];
        $apps = App::get();
        return view('cafeto::index', compact('apps', 'view'));
    }

    public function devs(){
        $view = ['titlePage'=>trans('cafeto::devs.Developers'), 'titleView'=>trans('cafeto::devs.Developers and credits')];
        $apps = App::get();
        return view('cafeto::developers.index', compact('apps','view'));
    }

    public function info(){
        $view = ['titlePage'=>trans('cafeto::about.About us'), 'titleView'=>trans('cafeto::about.About us')];
        $apps = App::get();
        return view('cafeto::information.index', compact('apps','view'));
    }

}
