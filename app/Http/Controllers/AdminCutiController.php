<?php

 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\Cuti;
 use App\Models\User;

class AdminCutiController extends Controller
{
    public function index()
    {
        $cutiList = Cuti::with('user')->get();
        return view('admin.cuti.index', compact('cutiList'));
    }

    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('admin.cuti.edit', compact('cuti'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        $cuti->update($validatedData);

        return redirect()->route('admin.cuti.index')->with('success', 'Data cuti berhasil diperbarui');
    }


    public function destroy(Cuti $cuti)
    {
        $cuti->delete();

        return redirect()->route('admin.cuti.index')->with('success', 'Cuti berhasil dihapus.');
    }
}
