<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Industry;
use App\Models\Business;
use App\Models\Status;
use App\Models\Total;
use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Industry $industry)
    {
        return view ('companies.index')->with(['industries' => $industry->get(),]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Business $business, Industry $industry, Status $status)
    {
        return view('companies.create', ['businesses' => $business->get(),
                                         'industries' => $industry->get(),
                                         'statuses' => $status->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request, Company $company )
    {
        $input = $request['company'];
        $company->fill($input);
        $company->user_id = Auth::id();
        $company->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Industry $industry)
    {
        $companies = collect([]);
        //$companies = Company::orderBy('status_id', 'Asc')->get();
        foreach($industry->businesses as $business) {
            $sort_companies = $business->companies->sortBy('status_id');
            $companies = $companies->concat($sort_companies);
        }
        $keyword = $request->input('keyword');

        $query = Company::query();


        if(!empty($keyword)) {//$keyword　が空ではない場合、検索処理を実行します
            $query->where('name', 'LIKE', "%{$keyword}%");
            $companies = $query->get(); 
        }
        return view('companies.show')->with(['companies' => $companies, 'keyword'=>$keyword]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Business $business, Industry $industry, Status $status)
    {
        return view('companies.edit', ['company' => $company, 
                                       'businesses' => $business->get(),
                                       "industries" => $industry->get(),
                                       'statuses' => $status->get()]);
                                       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $input_company = $request['company'];
        $company->fill($input_company);
        $company->user_id = Auth::id();
        $company->save();
        return redirect('/companies/' . $company->business->industry->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
    public function delete(Company $company)
    {
        $company->delete();
        return redirect('/companies/' . $company->business->industry->id);
    }
    public function total(Company $company, Status $status)//Total $total)
    {
        
        $company_count = Company::count();
        $selection_counts = Company::select('status_id', DB::raw('count(*) as total'))->groupBy('status_id')->get()->pluck('total', 'status_id');
        return view ('totals.total')->with(["companies"=>$company,'company_count' => $company_count, "selection_counts"=>$selection_counts, "statuses"=>$status->get()]);
    }
    public function search(Company $company)
    {
        //
    }
}
