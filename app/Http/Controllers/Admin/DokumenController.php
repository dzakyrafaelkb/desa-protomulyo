<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index() {
        $dokumen = Dokumen::orderByDesc('created_at')->paginate(10);
        return view('admin.dokumen.index', compact('dokumen'));
    }
    public function create() { return view('admin.dokumen.create'); }
    public function store(Request $request) {
        $request->validate(['nama'=>'required','file'=>'required|mimes:pdf,doc,docx|max:5120']);
        Dokumen::create(['nama'=>$request->nama,'file'=>$request->file('file')->store('dokumen','public')]);
        return redirect()->route('admin.dokumen.index')->with('success','Dokumen berhasil ditambahkan.');
    }
    public function edit($id) {
        $dokumen = Dokumen::findOrFail($id);
        return view('admin.dokumen.edit', compact('dokumen'));
    }
    public function update(Request $request, $id) {
        $d = Dokumen::findOrFail($id);
        $data = ['nama'=>$request->nama];
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($d->file);
            $data['file'] = $request->file('file')->store('dokumen','public');
        }
        $d->update($data);
        return redirect()->route('admin.dokumen.index')->with('success','Dokumen diperbarui.');
    }
    public function destroy($id) {
        $d = Dokumen::findOrFail($id);
        Storage::disk('public')->delete($d->file);
        $d->delete();
        return redirect()->route('admin.dokumen.index')->with('success','Dokumen dihapus.');
    }
}
