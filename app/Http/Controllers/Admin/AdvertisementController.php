<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAdvertisementForm;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $advertisements = Advertisement::where('link', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $advertisements = Advertisement::latest()->paginate(6);
            $advertisements->withPath('/dashboard/advertisements');
        }

        return view('admin.advertisements.index', compact('advertisements'));
    }

    public function create()
    {
        return view('admin.advertisements.create');
    }

    public function store(ValidateAdvertisementForm $request)
    {
        Advertisement::create($request->all());

        return redirect('/dashboard/advertisements')
            ->with('success', 'Новое объявление было успешно добавлено');
    }

    public function show(Advertisement $advertisement)
    {
        //
    }

    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisements.edit', [
            'advertisement' => $advertisement,
            ]);
    }

    public function update(ValidateAdvertisementForm $request, Advertisement $advertisement)
    {
        $advertisement->link = $request->link;
        $advertisement->banner =  $request->banner;
        $advertisement->save();

        return redirect('dashboard/advertisements')
            ->with('success', 'Объявление было успешно обновлено.');
    }

    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();

        return redirect('dashboard/advertisements')
            ->with('success', 'Объявление было успешно удалено');
    }
}
