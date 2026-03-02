<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
        $berita = Berita::orderByDesc('tanggal')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }
    public function create() { return view('admin.berita.create'); }
    public function store(Request $request) {
        $request->validate(['judul'=>'required','isi'=>'required','gambar'=>'nullable|image|max:2048']);
        $data = ['judul'=>$request->judul,'isi'=>$request->isi,'tanggal'=>now()->toDateString()];
        if ($request->hasFile('gambar')) {
            $uploaded = cloudinary()->upload($request->file('gambar')->getRealPath());
            $data['gambar'] = $uploaded->getSecurePath();
        }
        Berita::create($data);
        return redirect()->route('admin.berita.index')->with('success','Berita berhasil ditambahkan.');
    }
    public function edit($id) {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }
    public function update(Request $request, $id) {
        $berita = Berita::findOrFail($id);
        $request->validate(['judul'=>'required','isi'=>'required','gambar'=>'nullable|image|max:2048']);
        $data = ['judul'=>$request->judul,'isi'=>$request->isi];
        if ($request->hasFile('gambar')) {
            $uploaded = cloudinary()->upload($request->file('gambar')->getRealPath());
            $data['gambar'] = $uploaded->getSecurePath();
        }
        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success','Berita berhasil diperbarui.');
    }
    public function destroy($id) {
        $b = Berita::findOrFail($id);
        $b->delete();
        return redirect()->route('admin.berita.index')->with('success','Berita berhasil dihapus.');
    }
}