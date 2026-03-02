<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class GaleriController extends Controller
{
    private function uploadToCloudinary($file) {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ]
        ]);
        $result = $cloudinary->uploadApi()->upload($file->getRealPath(), ['folder' => 'galeri']);
        return $result['secure_url'];
    }

    public function index() {
        $galeri = Galeri::orderByDesc('created_at')->paginate(12);
        return view('admin.galeri.index', compact('galeri'));
    }
    public function create() { return view('admin.galeri.create'); }
    public function store(Request $request) {
        $request->validate(['foto'=>'required|image|max:2048','keterangan'=>'nullable|string|max:255']);
        Galeri::create([
            'foto'       => $this->uploadToCloudinary($request->file('foto')),
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('admin.galeri.index')->with('success','Foto berhasil diupload.');
    }
    public function destroy($id) {
        Galeri::findOrFail($id)->delete();
        return redirect()->route('admin.galeri.index')->with('success','Foto dihapus.');
    }
}