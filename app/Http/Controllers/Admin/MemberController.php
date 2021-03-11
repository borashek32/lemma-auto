<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function store(Request $request)
    {
        Member::create($request->all());

        return redirect('/dashboard/members')
            ->with('success', 'Информация о новом сотруднике была успешно добавлена!');
    }

    public function show(Member $member)
    {
        //
    }

    public function edit($id)
    {
        $member = Member::find($id);

        return view('admin.members.edit',
            ['member' => $member]
        );
    }

    public function update(Request $request)
    {
        Member::save($request->all());

        return redirect('/dashboard/members')
            ->with('success', 'Информация о новом сотруднике была успешно добавлена!');
    }

    public function destroy(Request $request)
    {
        Member::delete($request->all());

        return redirect()->route('members.index')->with('success', 'Информация о сотруднике была успешно удалена!');
    }
}
