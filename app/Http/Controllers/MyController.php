<?php  

namespace App\Http\Controllers;

class MyController extends Controller {

	private $storage_tiket_perjalanan = "app/documents/tiket_perjalanan/";
	private $storage_invoice_hotel = "app/documents/invoice_hotel/";
	private $storage_foto_kegiatan = "app/documents/foto_kegiatan/";
	
	protected function getDocumentPath($type="") {
		switch ($type) {
			case 'tiket_perjalanan':
				$storage = storage_path($this->storage_tiket_perjalanan);
				break;
			case 'invoice_hotel':
				$storage = storage_path($this->storage_invoice_hotel);
				break;
			case 'foto_kegiatan':
				$storage = storage_path($this->storage_foto_kegiatan);
				break;
		}

		return $storage;		
	}

	public function sweetResponse($status=false,$type="data",$options=[]) {
		
		$data = [];

		if($status) {
			
			$data["state"] = true;
			$data["title"] = "Sukses";
			$data["type"] = "success";

			if($type=="data") {
				$data["text"] = "Data telah di hapus";
			} else if($type=="file") {
				$data["text"] = "File telah di hapus";
			}

		} else {
			
			$data["state"] = false;
			$data["title"] = "Sukses";
			$data["type"] = "success";

			if($type=="data") {
				$data["text"]= "Data gagal di hapus, silahkan hubungi admin";
			} else if($type=="file") {
				$data["text"]= "File gagal di hapus, silahkan hubungi admin";
			}

		}

		if(!empty($options)) $data["options"] = $options;
		$result = $data;
		return $result;

	}


}

?>