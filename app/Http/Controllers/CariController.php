<?php namespace App\Http\Controllers;

class CariController extends Controller {
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		if (isset($_GET['q'])) 
			$q = '%'.$_GET['q'].'%';
		else
			$q = '';

		$desa = \App\Desa::where('nama', 'like', $q)->with('kecamatan.kabupaten.provinsi')->get();
		return view('cari', compact('desa'));
	}

	public function save()
	{
		if(Request::ajax()) {
		    $data = Input::all();
		    print_r($data);
	    }
	    exit();
		// if (isset($_POST['id_desa']) && isset($_POST['kode_pos'])) {
		// 	$id_desa = $_POST['id_desa'];
		// 	$kode_pos = $_POST['kode_pos'];

		// 	echo $id_desa."<br>";
		// 	echo $kode_pos;
		// 	exit();
		// }

		// return Response::json(array(
	 //        "status"    => "OK",
	 //        "content"   => "index"
	 //    ), 200);
	}

}
