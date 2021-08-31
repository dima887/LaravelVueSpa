<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAdApartmentRequest;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Illuminate\Http\Response;
use function GuzzleHttp\Promise\all;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApartmentResource::collection(Apartment::query()->orderByDesc('id')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAdApartmentRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store("app/apartment");
        }

        return Apartment::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Apartment::findOrFail($id);

        return new ApartmentResource(Apartment::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddAdApartmentRequest $request, $id)
    {
        $apartment = Apartment::find($id);
        $apartment->title = $request->title;
        $apartment->description = $request->description;
        $apartment->address = $request->address;
        $apartment->price = $request->price;
        $apartment->area = $request->area;
        $apartment->metro = $request->metro;
        $apartment->appliances = $request->appliances;
        $apartment->room = $request->room;
        $apartment->image = $request->image;
        if ($request->hasFile('image')) {
            $apartment['image'] = $request->file('image')->store("app/apartment");
        }
        $apartment->save();
        return $apartment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Apartment::destroy($id);
        //return response(null, Response::HTTP_NO_CONTENT);
    }
}
