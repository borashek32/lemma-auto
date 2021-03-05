<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('created_at', 'DESC')->get();

        return view('admin.members.index', [
            'members' => $members
        ]);
    }

    public function create()
    {
        return view('admin.members.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'unique', 'max:40'],
            'position' => ['required', 'string', 'max:20'],
            'phone' => ['required', 'string', 'max:16'],
            'description' => ['required', 'string', 'max:1000'],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'description' => 'required'
        ]);

        $member = new Member();
        $member->name         = $request->input('name');
        $member->position     = $request->input('position');
        $member->phone        = $request->input('phone');
        $member->description  = $request->input('description');
        $member->save();

        return redirect('/dashboard/members')->with('success', 'Информация о новом сотруднике была успешно добавлена!');
    }

    public function show(Member $member)
    {
        //
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('admin.members.edit',
            ['member' => $member]
        );
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'description' => 'required'
        ]);

//        $request->name = $member->name;
//        $request->position = $member->position;
//        $request->phone = $member->phone;
//        $request->description = $member->description;

        $member->update([
            'name' => $request->name,
            'position' => $request->position,
            'phone' => $request->phone,
            'description' =>$request->description
        ]);

        return redirect('/dashboard/members')->with('success', 'Информация о сотруднике была успешно обновлена!');
    }

    public function destroy(Member $id)
    {
        $member = Member::find($id);
//        Member::find($id)->delete();
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Информация о сотруднике была успешно удалена!');
    }
}
