<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatController extends Controller
{
    public function index() {
        $perangkat = PerangkatDesa::orderBy('id')->paginate(12);
        return view('admin.perangkat.index', compact('perangkat'));
    }
    public function create() { return view('admin.perangkat.create'); }
    public function store(Request $request) {
        $request->validate(['nama'=>'required','jabatan'=>'required','foto'=>'nullable|image|max:2048']);
        $data = ['nama'=>$request->nama,'jabatan'=>$request->jabatan];
        if ($request->hasFile('foto')) $data['foto'] = $request->file('foto')->store('perangkat','public');
        PerangkatDesa::create($data);
        return redirect()->route('admin.perangkat.index')->with('success','Data perangkat berhasil ditambahkan.');
    }
    public function edit($id) {
        $perangkat = PerangkatDesa::findOrFail($id);
        return view('admin.perangkat.edit', compact('perangkat'));
    }
    public function update(Request $request, $id) {
        $p = PerangkatDesa::findOrFail($id);
        $data = ['nama'=>$request->nama,'jabatan'=>$request->jabatan];
        if ($request->hasFile('foto')) {
            if ($p->foto) Storage::disk('public')->delete($p->foto);
            $data['foto'] = $request->file('foto')->store('perangkat','public');
        }
        $p->update($data);
        return redirect()->route('admin.perangkat.index')->with('success','Data perangkat diperbarui.');
    }
    public function destroy($id) {
        $p = PerangkatDesa::findOrFail($id);
        if ($p->foto) Storage::disk('public')->delete($p->foto);
        $p->delete();
        return redirect()->route('admin.perangkat.index')->with('success','Data perangkat dihapus.');
    }
}
