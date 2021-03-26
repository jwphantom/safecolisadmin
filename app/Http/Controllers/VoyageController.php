<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class VoyageController extends Controller
{   
    public function wait()
    {

        $dbsafecolis = DB::connection('mysql2');
        $namepage = "Voyage en attentes";

        $waitvoyages = DB::connection('mysql2')->table('voyageur')->where('active', '=', 0)->paginate(8);
       
        return view('waitvoyage', array(
            'waitvoyages'=>$waitvoyages,
            'namepage'=>$namepage,
        )) ;
    }

    public function view($id)
    {
        $dbsafecolis = DB::connection('mysql2');

        $namepage = "Details voyage";

        $voyage = DB::connection('mysql2')->select('select * from voyageur where id = :id ', ['id' => $id]);

        foreach($voyage as $index){}

        $ext_img_just = DB::connection('mysql2')->select('select url from justification where id = :id ', ['id' => $index->justification_id]);

        $ext_img_id = DB::connection('mysql2')->select('select url from identification where id = :id ', ['id' => $index->identification_id]);


        foreach($ext_img_just as $ext_just)
        {

        }

        foreach($ext_img_id as $ext_id)
        {

        }

        $identification = "https://res.cloudinary.com/doxl9x2a0/image/upload/v1550969143/Voyageur/1/billet_avion/1.png";

        return view('voyages.view', array(
            'namepage'=>$namepage,
            'voyage'=>$voyage,
            'ext_just'=>$ext_just,
            'ext_id'=>$ext_id
        ));
    }

    public  function accept($id)
    {
        $dbsafecolis = DB::connection('mysql2');

        $voyage = DB::connection('mysql2')->select('update voyageur set active = :active where id = :id ', ['active'=>1,'id' => $id]);

        return redirect('/voyages/wait')->with('voyage_accepte', 'Voyage accepté');
    }

    public  function refuse($id)
    {
        $dbsafecolis = DB::connection('mysql2');

        $voyage = DB::connection('mysql2')->select('delete from voyageur where id = :id ', ['id' => $id]);

        return redirect('/voyages/wait')->with('voyage_supprime', 'Voyage supprimé');
    }
}
