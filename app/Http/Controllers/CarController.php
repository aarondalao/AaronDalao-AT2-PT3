<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $myRequest)
    {

        if (!is_null($myRequest['searchbar'])){
            $searchThis = $myRequest['searchbar'];
        }else{
            $searchThis = '';
        }

        if($searchThis ===''){
            $cars = Car::paginate(15);
        }else{
            // not as effective as i thought it would be...
//            $cars = Car::where('(','code', 'like', "%{$searchThis}%", ')' ,'or',
//                '(', 'manufacturer', 'like', "%{$searchThis}%", ')','or',
//                '(', 'model', 'like' , "%{$searchThis}%", ')'
//            )->paginate();

            $cars =  Car::Where('code', 'like', "%{$searchThis}%")
                ->orWhere('manufacturer', 'like', "%{$searchThis}%")
                ->orWhere('model', 'like' , "%{$searchThis}%")
                ->paginate();
        }

//        $cars = Car::paginate(15);
        return view('cars.index', compact('cars','searchThis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCarRequest $request)
    {
        $myNewData = [
            "code" => $request->code,
            "manufacturer" => $request->manufacturer,
            "model" => $request->model,
            "price" =>$request->price,
        ];
        Car::create($myNewData);

        return redirect()->route('cars.index')->with('success', 'new car record successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Car $car)
    {
        return view('cars.show', compact(['car']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact(['car']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCarRequest $request, Car $car)
    {

        $car->update([
            "code" => $request->code ?? $car->code,
            "manufacturer" => $request->manufacturer ?? $car->manufacturer,
            "model" => $request->model ?? $car->model,
            "price" =>$request->price ?? $car->price,
        ]);

        return redirect()->route('cars.index')->with('success', 'new car record successfully updated');
    }

    /*
     *  Display the delete-specific resource
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     *
     * */
    public function delete(Car $car)
    {
        return view('cars.delete', compact(['car']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Car::find($id)->delete();
        return redirect()->route('cars.index')->with('success', 'successfully deleted this record');
    }
}
