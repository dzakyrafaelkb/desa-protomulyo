<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index() {
        $pengaduan = Pengaduan::orderByDesc('created_at')->paginate(10);
        return view('admin.pengaduan.index', compact('pengaduan'));
    }
    public function updateStatus(Request $request, $id) {
        $request->validate(['status'=>'required|in:Pending,Diproses,Selesai']);
        Pengaduan::findOrFail($id)->update(['status'=>$request->status]);
        return redirect()->route('admin.pengaduan.index')->with('success','Status diperbarui.');
    }
    public function destroy($id) {
        $p = Pengaduan::findOrFail($id);
        if ($p->foto) Storage::disk('public')->delete($p->foto);
        $p->delete();
        return redirect()->route('admin.pengaduan.index')->with('success','Pengaduan dihapus.');
    }
}
