<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class BeritaController extends Controller
{
    private function uploadToCloudinary($file) {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ]
        ]);
        $result = $cloudinary->uploadApi()->upload($file->getRealPath(), ['folder' => 'berita']);
        return $result['secure_url'];
    }

    public function index() {
        $berita = Berita::orderByDesc('tanggal')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }
    public function create() { return view('admin.berita.create'); }
    public function store(Request $request) {
        $request->validate(['judul'=>'required','isi'=>'required','gambar'=>'nullable|image|max:2048']);
        $data = ['judul'=>$request->judul,'isi'=>$request->isi,'tanggal'=>now()->toDateString()];
        if ($request->hasFile('gambar'))
            $data['gambar'] = $this->uploadToCloudinary($request->file('gambar'));
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
        if ($request->hasFile('gambar'))
            $data['gambar'] = $this->uploadToCloudinary($request->file('gambar'));
        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success','Berita berhasil diperbarui.');
    }
    public function destroy($id) {
        Berita::findOrFail($id)->delete();
        return redirect()->route('admin.berita.index')->with('success','Berita berhasil dihapus.');
    }
}