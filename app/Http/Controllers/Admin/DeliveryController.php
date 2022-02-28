<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateDeliveryForm;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $deliveries = Delivery::where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(10);
        } else {
            $deliveries = Delivery::latest()->paginate(10);
            $deliveries->withPath('/dashboard/deliveries');
        }

        return view('admin.deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deliveries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateDeliveryForm $request)
    {
        $deliveries = Delivery::create([
            'title'               => $request->title,
            'description'         => $request->description
        ]);

        return redirect('/dashboard/deliveries')
            ->with('success', 'Новый вариант доставки был успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        return view('admin.deliveries.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateDeliveryForm $request, Delivery $delivery)
    {
        $delivery->title                 =  $request->title;
        $delivery->description           =  $request->description;
        $delivery->save();

        return redirect('dashboard/deliveries')
            ->with('success', 'Вариант доставки был успешно обновлен.');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();

        return redirect('dashboard/deliveries')
            ->with('success', 'Вариант доставки был успешно удален');
    }
}
