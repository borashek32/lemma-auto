<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateLawForm;
use App\Models\Law;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class LawController extends Controller
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
            $laws = Law::where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(10);
        } else {
            $laws = Law::latest()->paginate(10);
            $laws->withPath('/dashboard/laws');
        }

        return view('admin.laws.index', compact('laws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.laws.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateLawForm $request)
    {
        $law = Law::create([
            'title'               => $request->title,
            'description'         => $request->description,
            'link'                => $request->link
        ]);

        return redirect('/dashboard/laws')
            ->with('success', 'Новый закнодательный акт был успешно добавлен');
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
    public function edit(Law $law)
    {
        return view('admin.laws.edit', compact('law'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateLawForm $request, Law $law)
    {
        $law->title                 =  $request->title;
        $law->description           =  $request->description;
        $law->link                  =  $request->link;
        $law->save();

        return redirect('dashboard/laws')
            ->with('success', 'Законодательный акт был успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Law $law)
    {
        $law->delete();

        return redirect('dashboard/laws')
            ->with('success', 'Законодательный акт был успешно удален');
    }
}
