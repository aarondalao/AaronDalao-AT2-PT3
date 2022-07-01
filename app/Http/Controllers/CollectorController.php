<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectorRequest;
use App\Http\Requests\UpdateCollectorRequest;
use App\Models\Collector;
use App\Models\Car;
use Illuminate\Http\Request;

class CollectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $myRequest)
    {
        if(!is_null($myRequest['search'])){
            $searchThis = $myRequest['search'];
        }else{
            $searchThis = '';
        }

        if($searchThis === ''){
            $collectors =  Collector::paginate(15);
        }else{
            $collectors = Collector::where('family_name', 'like', "%{$searchThis}%")->paginate();
        }

        return view('collectors.index', compact('collectors', 'searchThis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        // edit this later and remove the passed parameters on this method.  if else goes wrong.
        $cars = Car::all();

        return view('collectors.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCollectorRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCollectorRequest $request)
    {
        // VALIDATION FIRST!!!
        // DIR: App\Http\Requests\StoreCollectorRequest.php

        // update: get the entered data from request and store it in an  array variable with a whitespace separator.
        // update 22/05/2022: not working when using checkboxes. prolly only limited when a user types data in textbox.

//        $carArray = explode(' ', $request->cars);
        $carArray = $request->car;

        $myNewData = [
            "given_name" => $request->given_name,
            "family_name" => $request->family_name,
            "cars" => $carArray ?? [],
        ];

        Collector::create($myNewData);

        return redirect()->route('collectors.index')->with('success','a new collector is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Collector $collector)
    {
        return view('collectors.show', compact(['collector']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collector  $collector
    @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Collector $collector)
    {
        $carList = Car::all();
        return view('collectors.edit',compact(
            [
                'collector',
                'carList'
            ]
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCollectorRequest  $request
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(UpdateCollectorRequest $request, Collector $collector)
    {
        //         if( $collector->given_name != $request->given_name){
//            $collector->given_name = $request->given_name;
//        }
//        if( $collector->family_name != $request->family_name){
//            $collector->family_name = $request->family_name;
//        }
//        if( $collector->cars != $request->cars and !isEmpty($request->cars)) {
//            $collector->cars = $request->cars;
//        }else{
//            $collector->cars = [];
//        }
//        $collector->save();

        $collector->update([
            "given_name" => $request->given_name ?? $collector->given_name,
            "family_name" => $request->family_name ?? $collector->family_name,
            // $request has a "car" attribute not a "cars"
            "cars" => $request->car ?? $collector->cars,
        ]);


        return redirect()->route('collectors.index')->with('success', 'the collector is successfully updated');
    }

    /*
     *
     *  show the delete confirmation page
     * @ param \App\Models\Collector $collector
     * @return \Illuminate\Http\Response
     *
     * */
    public function delete(Collector $collector)
    {
        return view('collectors.delete', compact(['collector']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Collector $collector)
    {
        $collector->delete();
        return redirect()->route('collectors.index')->with('success','the collector is successfully destroyed');
    }
}
