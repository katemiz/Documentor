<?php

namespace App\Http\Controllers;

use App\Models\Bina;
use App\Models\Sakin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SakinController extends Controller
{
    public function formSakin(Request $request)
    {
        $bina = Bina::find($request->id);
        $sakin = false;

        if ($bina->user_id !== Auth::id()) {
            abort('404');
        }

        if ($request->sakinid) {
            $sakin = Sakin::find($request->sakinid);
        }

        return view('sakin.sakin-form', [
            'bina' => $bina,
            'sakin' => $sakin,
        ]);
    }

    public function addSakin(Request $req)
    {
        $props['user_id'] = Auth::id();
        $props['bina_id'] = $req->id;
        $props['name'] = $req->input('isim');
        $props['lastname'] = $req->input('soyisim');
        $props['door_no'] = $req->input('door_no');
        $props['is_evsahibi'] = $req->input('sahiplik');
        $props['payratio'] = $req->input('payratio');
        $props['phone'] = $req->input('telno');
        $props['giris_tarihi'] = $req->input('giristarihi');
        $props['remarks'] = $req->input('editor_data');

        $sakin = Sakin::create($props);
        $bina = Bina::find($req->id);

        return view('sakin.sakin-view', [
            'notification' => [
                'type' => 'is-success',
                'message' => 'Bina sakini eklenmiştir',
            ],
            'bina' => $bina,
            'sakin' => $sakin,
        ]);
    }

    public function updateSakin(Request $req)
    {
        $props['user_id'] = Auth::id();
        $props['bina_id'] = $req->id;
        $props['name'] = $req->input('isim');
        $props['lastname'] = $req->input('soyisim');
        $props['door_no'] = $req->input('door_no');
        $props['is_evsahibi'] = $req->input('sahiplik');
        $props['payratio'] = $req->input('payratio');
        $props['phone'] = $req->input('telno');
        $props['giris_tarihi'] = $req->input('giristarihi');
        $props['remarks'] = $req->input('editor_data');

        Sakin::find($req->sakinid)->update($props);

        return redirect()->route('sakinview', [
            'notification' => [
                'type' => 'is-success',
                'message' => 'Bilgiler güncellenmiştir',
            ],
            'id' => $req->id,
            'sakinid' => $req->sakinid,
        ]);
    }

    public function viewSakin(Request $req)
    {
        $bina = Bina::find($req->id);

        if ($bina->user_id !== Auth::id()) {
            abort('404');
        }

        $sakin = Sakin::find($req->sakinid);

        return view('sakin.sakin-view', [
            'notification' => false,
            'bina' => $bina,
            'sakin' => $sakin,
        ]);
    }
}
