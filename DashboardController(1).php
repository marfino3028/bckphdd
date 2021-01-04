<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Auth;
use App\Dashboard;
use App\Models\Invoice;
use App\Models\User;
use App\Models\InvoiceBatch;
use App\Models\InvoiceProductClient;
use App\Models\Client;
use App\Models\Product;
use App\Models\StaffTracking;
use App\Models\WorkOrder;
use App\Models\Staff;
use App\Estimates;
use DB;
// use Charts;
// declare chart traffic
use App\Charts\TrafficChart;
class DashboardController extends BaseController
{
    public function dataGet(Request $request){
        $user = $request->user();
        $user_id        = $user->id;
        $role_id        = $user->role_id;

        // get user data

        // get menu based on role_id
        $menus = Dashboard::getMenu($role_id);
        
        foreach($menus as $menu){
            if($menu->status == 3) $singles[] = $menu;
            if($menu->status == 2) $parents[] = $menu;
            if($menu->status == 1) $subs[]    = $menu;
        }
        unset($menus);
        if(isset($singles)){
			foreach($singles as $single){
            $menus[]  = [
                'parent_code' => $single->parent_code,
                'parent_icon' => $single->icon,
                'parent_name' => $single->name,
                'sub_menu'    => [],
            ];
        	}
        }
        foreach($parents as $parent){
            foreach($subs as $sub){
                if($parent->parent_code == $sub->parent_code){
                    $childs[] = [
                        'sub_code' => $sub->code,
                        'sub_icon' => $sub->icon,
                        'sub_name' => $sub->name,
                    ];
                }
            }

            $menus[]  = [
                'parent_code' => $parent->parent_code,
                'parent_icon' => $parent->icon,
                'parent_name' => $parent->name,
                'sub_menu'    => isset($childs) ? $childs : [],
            ];
            unset($childs);
        }
        
        $showStaff      = Staff::where('email', $user->username)->get();
        session(['showStaff'    => $showStaff]);
        session(['menus'        => $menus]);

        $no = 1;
        $showClient     = Client::orderBy('id', 'asc')->get();
        $showUser       = User::where('id', $user->id)->get();
		$showProduct    = Product::orderBy('id', 'asc')->get();
        $showData       = Invoice::orderBy('inv_number', 'DESC')->with('inv_batch', 'inv_product', 'client', 'product')->limit(5)->get();
        $showDue        = Invoice::orderBy('inv_number', 'DESC')->with('inv_batch', 'inv_product', 'client', 'product')->get();
      
        $calcEstimates  = Estimates::groupBy('estimates_date')->count('id');
        $disEstimates   = Estimates::orderBy('estimates_date', 'ASC')->get('estimates_date')->pluck('estimates_date');
        $calcWorkOrder  = WorkOrder::groupBy('workorder_date')->count('id');
        $disWorkOrder   = WorkOrder::orderBy('workorder_date', 'ASC')->get('workorder_date')->pluck('workorder_date');
        $calcInvoice  = Invoice::groupBy('invoice_date')->count('id');
        $disInvoice   = Invoice::orderBy('invoice_date', 'ASC')->get('invoice_date')->pluck('invoice_date');
        // dd($calcEstimates, $disEstimates, $calcWorkOrder, $disWorkOrder, $calcInvoice, $disInvoice);

        $labelData = collect([$calcInvoice, $calcEstimates, $calcInvoice]);
        // dd($labelData);
        
        $estimatesData = DB::table('x_estimates')
                        ->select('estimates_date', DB::raw('id as total'))
                        ->groupBy('estimates_date')
                        ->pluck('total', 'estimates_date')->all();

        $invoiceData = DB::table('x_new_invoice')
                        ->select('invoice_date', DB::raw('id as total'))
                        ->groupBy('invoice_date')
                        ->pluck('total', 'invoice_date')->all();

        $workOrderData = DB::table('x_work_orders')
                        ->select('workorder_date', DB::raw('id as total'))
                        ->groupBy('workorder_date')
                        ->pluck('total', 'workorder_date')->all();

        $labelData = DB::table('x_estimates AS xs')
                    ->join('x_new_invoice AS xn', 'xs.id', 'xn.id')
                    ->join('x_work_orders AS xw', 'xw.id', 'xn.id')
                    ->select('xs.estimates_date', 'xn.invoice_date', 'xw.workorder_date')
                    // ->groupBy('tanggal')
                    ->pluck('xs.estimates_date', 'xn.invoice_date', 'xw.workorder_date')->all();

        // dd($labelData);

        // $chart = new TrafficChart;
        // $chart->labels(array_keys($workOrderData));
        // $chart->labels(array_keys($invoiceData));
        // $chart->labels(array_keys($estimatesData));

        // $chart->dataset('Work Order', 'line', array_values($workOrderData))
        //     ->color("#6030A8")
        //     ->backgroundcolor("transparent");
        
        // $chart->dataset('Estimate', 'line', array_values($estimatesData))
        //     ->color("rgb(229, 103, 23)")
        //     ->backgroundcolor("transparent");

        // $chart->dataset('Invoice', 'line', array_values($invoiceData))
        //     ->color("#01796F")
        //     ->backgroundcolor("transparent");


        // dd($chart);
        
        //echo json_encode($showStaff);

        // $trafficChart = Estimates::

        // $test = new TrafficChart;
        // $test->labels(['Jan', 'Feb', 'Mar']);
        // $test->dataset('Users by trimester', 'line', [10, 25, 13]);

        // $data = DB::table('x_estimates')->select('id_clients')->groupBy('id_clients')->get();

        // dd($data);
        
        return view('pages/dashboard',[
            'showUser'      => $showUser,
			'showClient'    => $showClient,
            'showData'      => $showData,
            'showDue'       => $showDue,
			'showProduct'   => $showProduct,
            'no'            => $no,
            // 'data'         => $data,
            'labelData'     => $labelData,
            'calcEstimates' => $calcEstimates,
            'calcWorkOrder' => $calcWorkOrder,
            'calcInvoice' => $calcInvoice,
            'estimatesData' => array_values($estimatesData),
            'invoiceData' => array_values($invoiceData),
            'workOrderData' => array_values($workOrderData),
            'workorder_pending' => WorkOrder::where('status', 3)->count(),
            'workorder_ongoing' => WorkOrder::where('status', 5)->count(),
            'workorder_finished' => WorkOrder::where('status', 2)->count(),
            'workorder_draft' => WorkOrder::where('status', 1)->count(),
            'staff_tracking' => StaffTracking::count()
		]);
    }

    public function reg(){
        // dd('masuk_reg');
        $params = [
            'user' => 'satish@gmail.com',
            'pass' => 'test123',
        ];
        Auth::register($params);
        return 'ok';
        // return view('pages/dashboard');
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
}
