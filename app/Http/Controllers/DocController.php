<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Doctree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocController extends Controller
{
    public $notification = false;
    public $bina = false;
    public $bedel = false;

    public $tur_secenek = [
        'SABIT' => 'Sabit Bedelli Ödeme',
        'SAYAC' => 'Okumaya Dayalı Ödeme (Sayaçlı)',
    ];

    public $units = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            //$this->bina = Bina::find($request->id);

            // if ($this->bina->user_id !== Auth::id()) {
            //     abort('403');
            // }

            // $this->units = [
            //     $this->bina->pbirimi => $this->bina->pbirimi,
            //     'kalori' => $this->bina->pbirimi . '/Kalori',
            //     'kWh' => 'Kilowatt-saat',
            //     'm3' => $this->bina->pbirimi . '/m<sup>3</sup>',
            // ];
            return $next($request);
        });
    }
    




    public function new(Request $request)
    {
        // if ($request->bedelid) {
        //     $this->bedel = Bedel::find($request->bedelid);
        // }

        return view('doc.new', [
            // 'bina' => $this->bina,
            // 'bedel' => $this->bedel,
            // 'tur_secenek' => $this->tur_secenek,
            // 'units' => $this->units,
        ]);
    }





    public function view(Request $request)
    {
        // if ($request->bedelid) {
        //     $this->bedel = Bedel::find($request->bedelid);
        // }


        //$this->bina = Doc::find($request->id);


        return view('doc.view', [
            'doc' => Doc::find($request->id),
            // 'bedel' => $this->bedel,
            // 'tur_secenek' => $this->tur_secenek,
            // 'units' => $this->units,
        ]);
    }

    public function form(Request $request)
    {
        return view('doc.form',[
            "doc" => false,
        ]);
    }













    public function add(Request $req)
    {
        $props = $this->readFormValues($req);
        $doc = Doc::create($props);


        $propsTree["user_id"] = $props["user_id"];
        $propsTree["doc_id"] = $doc->id;
        $propsTree["tree"] = json_encode([]);
        $doctree = Doctree::create($propsTree);


        return redirect()->route('viewdoc', [
            'id' => $doc->id,
        ]);
    }

    public function upd(Request $req)
    {
        $props = $this->readFormValues($req);
        Bedel::find($req->bedelid)->update($props);

        return redirect()->route('bedeller', [
            'id' => $req->id,
        ]);
    }

    public function readFormValues($req)
    {
        //dd($req);

        $props['user_id'] = Auth::id();
        $props['DocNo'] = '1000';
        $props['Revision'] = '1';
        $props['RevisionStatus'] = 'Verbatim';

        $props['Title'] = $req->input('title');
        $props['Purpose'] = $req->input('purpose');
        $props['Scope'] = $req->input('scope');

        //dd($props);

        return $props;
    }
}
