<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if ($request->hasFile('gambar'))
            $data['gambar'] = $request->file('gambar')->store('berita','public');
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
            if ($berita->gambar) Storage::disk('public')->delete($berita->gambar);
            $data['gambar'] = $request->file('gambar')->store('berita','public');
        }
        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success','Berita berhasil diperbarui.');
    }
    public function destroy($id) {
        $b = Berita::findOrFail($id);
        if ($b->gambar) Storage::disk('public')->delete($b->gambar);
        $b->delete();
        return redirect()->route('admin.berita.index')->with('success','Berita berhasil dihapus.');
    }
}
