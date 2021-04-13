<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateMemberForm;
use App\Models\Member;
use Illuminate\Http\Request;

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

    public function store(ValidateMemberForm $request)
    {
        Member::create($request->all());

        return redirect('/dashboard/members')
            ->with('success', 'Информация о новом сотруднике была успешно добавлена');
    }

    public function show(Member $member)
    {
        //
    }

    public function edit(Member $member)
    {
        return view('admin.members.edit', [
            'member' => $member,
        ]);
    }

    public function update(ValidateMemberForm $request, Member $member)
    {
        $member->name = $request->name;
        $member->photo =  $request->photo;
        $member->phone =  $request->phone;
        $member->position = $request->position;
        $member->description = $request->description;
        $member->save();

        return redirect('dashboard/members')
            ->with('success', 'Информация о новом сотруднике была успешно добавлена');
    }

    public function destroy(Member $member)
    {
       $member->delete();

        return redirect('dashboard/members')->with('success', 'Информация о сотруднике была успешно удалена');
    }
}
