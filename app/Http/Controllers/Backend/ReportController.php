<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Purchase;
use App\Supplier;
use App\Stock;
use App\Customer;
use App\Sale;
use App\Account;
use App\Expense;
use DB;

class ReportController extends Controller
{
    public function purchaseReport()
    {
        $purchases = Purchase::all();
        $stock = Stock::all();
    	return view('backend.report.purchasereport')->withPurchases($purchases);
    }

    public function purchaseReportcall(Request $request)
    {
        if($request->ajax()){
            $output ='';
            $formdate = $request->formdate;
            $todate = $request->todate;
            $model = Purchase::whereBetween('date', array($formdate, $todate))->get();
            
            if(sizeof($model)>0){
                
                        foreach($model as $m){
                            $output .='<tr>
                                <td>'. $m->id .'</td>
                                <td>'. $m->date .'</td>
                                <td>'. $m->total_amount .'</td>
                                <td>'. $m->t_discount .'</td>
                                <td>'. $m->due .'</td>
                            </tr>';
                        }
            }else{
                $output .='No data found';
            }
            return Response($output);
        }
    }

    public function saleReport()
    {
        $sales = Sale::all();

        return view('backend.report.salereport')->withSales($sales);
    }

    public function saleReportcall(Request $request)
    {
        if($request->ajax()){
            $output ='';
            $dform = $request->dform;
            $dto = $request->dto;
            $model = Sale::whereBetween('created_at', array($dform, $dto))->get();

            if(sizeof($model)>0){
                
                        foreach($model as $m){
                            $output .='<tr>
                                <td>'. $m->id .'</td>
                                <td>'. date("Y-m-d", strtotime($m->created_at)) .'</td>
                                <td>'. $m->stotal_amount .'</td>
                                <td>'. $m->st_discount .'</td>
                                <td>'. $m->sdue .'</td>
                            </tr>';
                        }
            }else{
                $output .='No data found';
            }
            return Response($output);
        }
    }

    public function discountReport()
    {
    	return view('backend.report.discountreport');
    }

    public function expenseReport()
    {
        $expense = Expense::all();
        return view('backend.report.expensereport')->withExpe($expense);
    }

    public function expenseReportcall(Request $request)
    {
         if($request->ajax()){
            $output ='';
            $formd = $request->datform;
            $tod = $request->datdto;
            $model = Expense::whereBetween('ex_date', array($formd, $tod))->get();

            if(sizeof($model)>0){
                
                        foreach($model as $m){
                            $output .='<tr>
                                <td>'. $m->id .'</td>
                                <td>'. $m->ex_date .'</td>
                                <td>'. $m->ex_amount .'</td>
                            </tr>';
                        }
            }else{
                $output .='No data found';
            }
            return Response($output);
        }
    }
}
