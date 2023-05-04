<?php

namespace Modules\SICA\Http\Controllers;

use Illuminate\Routing\Controller;

use Modules\SICA\Entities\Person;
use Modules\SICA\Entities\Apprentice;
use Modules\SICA\Entities\App;

use App\Models\User;
use Modules\SICA\Entities\Role;
use Modules\SICA\Entities\Course;
use Modules\SICA\Entities\Event;
use Modules\SICA\Entities\EventAttendance;
Use DB;
use Modules\SICA\Entities\Inventory;
use Modules\SICA\Entities\Warehouse;

class SICAController extends Controller
{

    public function index()
    {
        $warehouse = Warehouse::where('name', 'Punto de venta')->first();

        $inventories = Inventory::where('warehouse_id', $warehouse->id)
            ->where('destination', 'Producción')
            ->where('state', 'Disponible')
            ->join('elements', 'inventories.element_id', '=', 'elements.id')
            ->orderBy('elements.name', 'ASC')
            ->orderBy('inventories.production_date', 'ASC')
            ->get();
        $products = $inventories->pluck('elements.name', 'inventories.id');

        return $inventories;


        $data = ['title'=>trans('sica::menu.Home')];
        return view('sica::index',$data);
    }

    public function contact()
    {
        $data = ['title'=>trans('sica::menu.Contact')];
        return view('sica::form_contact',$data);
    }

    public function developers()
    {
        $data = ['title'=>trans('sica::menu.Developers')];
        return view('sica::developers',$data);
    }

    public function admin_dashboard()
    {
        $people = Person::count();
        $apprentices = Apprentice::count();
        $apps = App::count();
        $users = User::count();
        $roles = Role::count();
        $courses = Course::count();
        $data = ['title'=>trans('sica::menu.Dashboard'),'people'=>$people,'apprentices'=>$apprentices,'apps'=>$apps,'users'=>$users,'roles'=>$roles,'courses'=>$courses];
        return view('sica::admin.dashboard',$data);
    }

    public function attendance_dashboard()
    {
        $people = Person::count();
        $apprentices = Apprentice::count();
        $event = Event::count();
        $events = Event::get();
        $eas = $events;
        $i=0;
        foreach($events as $e){
            $attendance = EventAttendance::select('date',DB::raw('count(id) as total'))->where('event_id',$e->id)->groupBy('date')->get();
            $dis = EventAttendance::where('event_id',$e->id)->distinct()->count('person_id');
            $disp = EventAttendance::select('person_id')->where('event_id',$e->id)->distinct()->get();
            $rage=Person::select('document_type', DB::raw('count(document_type) as val'))->whereIN('id',$disp)->groupBy('document_type')->get();
            $pop=Person::select('population_groups.name', DB::raw('count(population_group_id) as val'))->whereIN('people.id',$disp)->groupBy('population_group_id')->join('population_groups', 'people.population_group_id', '=', 'population_groups.id')->get();
            $eas[$i]['attendance']=$attendance;
            $eas[$i]['total']=$dis;
            $eas[$i]['rage']=$rage;
            $eas[$i]['pop']=$pop;
            $i++;
        }
        //return $eas;
        $attendance = EventAttendance::select('date',DB::raw('count(id) as total'))->groupBy('date')->with('event')->get();
        $data = ['title'=>trans('sica::menu.Dashboard'),'event'=>$event,'eas'=>$eas,'people'=>$people,'apprentices'=>$apprentices,'attendance'=>$attendance];
        return view('sica::admin.attendance_dashboard',$data);
    }

}
