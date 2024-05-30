<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::orderByDesc('id')->get();
        return view('admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Admin();
        return view('admin.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Admin();
        $model->title = $request->title;
        $model->description = $request->description;
        $model->due_date = $request->due_date;
        $model->status = $request->status;
        $model->save();
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
    {
        $id = decrypt($encryptedId, ['limit' => 16]);
        $admin = Admin::find($id);

        if (!$admin) {
            abort(404);
        }

        $model = $admin;
        return view('admin.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Admin::find($id);

        $model->title = $request->title;
        $model->description = $request->description;
        $model->due_date = $request->due_date;
        $model->status = $request->status;
        $model->save();
        return redirect()->route('admin.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Task deleted successfully.');
    }
}
