<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index() {
        $galeri = Galeri::orderByDesc('created_at')->paginate(12);
        return view('admin.galeri.index', compact('galeri'));
    }
    public function create() { return view('admin.galeri.create'); }
    public function store(Request $request) {
        $request->validate(['foto'=>'required|image|max:2048','keterangan'=>'nullable|string|max:255']);
        $uploaded = cloudinary()->upload($request->file('foto')->getRealPath());
        Galeri::create(['foto'=>$uploaded->getSecurePath(),'keterangan'=>$request->keterangan]);
        return redirect()->route('admin.galeri.index')->with('success','Foto berhasil diupload.');
    }
    public function destroy($id) {
        $g = Galeri::findOrFail($id);
        $g->delete();
        return redirect()->route('admin.galeri.index')->with('success','Foto dihapus.');
    }
}