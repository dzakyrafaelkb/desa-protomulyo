<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class PerangkatController extends Controller
{
    private function uploadToCloudinary($file) {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ]
        ]);
        $result = $cloudinary->uploadApi()->upload($file->getRealPath(), ['folder' => 'perangkat']);
        return $result['secure_url'];
    }

    public function index() {
        $perangkat = PerangkatDesa::orderBy('id')->paginate(12);
        return view('admin.perangkat.index', compact('perangkat'));
    }
    public function create() { return view('admin.perangkat.create'); }
    public function store(Request $request) {
        $request->validate(['nama'=>'required','jabatan'=>'required','foto'=>'nullable|image|max:2048']);
        $data = ['nama'=>$request->nama,'jabatan'=>$request->jabatan];
        if ($request->hasFile('foto'))
            $data['foto'] = $this->uploadToCloudinary($request->file('foto'));
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
        if ($request->hasFile('foto'))
            $data['foto'] = $this->uploadToCloudinary($request->file('foto'));
        $p->update($data);
        return redirect()->route('admin.perangkat.index')->with('success','Data perangkat diperbarui.');
    }
    public function destroy($id) {
        PerangkatDesa::findOrFail($id)->delete();
        return redirect()->route('admin.perangkat.index')->with('success','Data perangkat dihapus.');
    }
}