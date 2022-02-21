<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateRequisiteForm;
use App\Models\User;
use App\Models\UserRequisites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RequisitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user_requisites = UserRequisites::where('user_id', $user_id)->first();

        return view('profile.requisites.index', compact('user_requisites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(ValidateRequisiteForm $request)
    {
        $path = $request->file('requisites')->getFilename();
        $extension = $request->file('requisites')->clientExtension();
//        dd($extension);
        $name_with_ext = $path . '.' . $extension;
        $request->requisites->move(public_path('users-requisites'), $name_with_ext);

        UserRequisites::create([
            'user_id' => $request->input('user_id'),
            'original_filename' => $request->file('requisites')->getClientOriginalName(),
            'path' => $name_with_ext
        ]);

        return redirect('dashboard/company-requisites')->with('success', 'Ваши реквизиты успешно добавлены');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        $user_requisites = UserRequisites::where('user_id', Auth::user()->id)->first();
        $user_requisites->delete();

        return redirect('dashboard/company-requisites')
            ->with('success', 'Реквизиты были успешно успешно удалены.');
    }
}
