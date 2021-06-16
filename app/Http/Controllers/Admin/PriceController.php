<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use BaconQrCode\Renderer\Color\Cmyk;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::select(['id','name'])->get();

        return view('admin.prices.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name'  =>  ['required','max:20'],
        'price' =>  ['required','integer'],
        ]);

        Price::create([
            'name'  =>  $request->name,
            'price' =>  $request->price,
        ]);

        return redirect()->route('admin.prices.index')
            ->with('success', 'New Price Added Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        return view('admin.prices.show', compact('price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        return view('admin.prices.edit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $request->validate([
            'name'  =>  ['required','max:20'],
            'price' =>  ['required','integer'],
            ]);

            $price->update([
                'name'  =>  $request->name ?? $price->name,
                'price' =>  $request->price ?? $price->price,
            ]);

            return redirect()->route('admin.prices.index')
                ->with('success', 'Price Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();

        return redirect()->route('admin.prices.index')
            ->with('success','Price Deleted Successfully !!');
    }
}
