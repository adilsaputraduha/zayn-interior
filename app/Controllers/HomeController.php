<?php

namespace App\Controllers;

use App\Models\BahanBakuModel;
use App\Models\PelangganModel;
use App\Models\UserModel;
use App\Models\InteriorModel;
use App\Models\PembelianModel;
use App\Models\PemesananModel;

class HomeController extends BaseController
{
	public function index()
	{
		$modelUser = new UserModel();
		$modelPelanggan = new PelangganModel();
		$modelInterior = new InteriorModel();
		$modelPemesanan = new PemesananModel();
		$modelPembelian = new PembelianModel();
		$modelBahanBaku = new BahanBakuModel();

		$rowUser = $modelUser->getUser();
		$rowPelanggan = $modelPelanggan->getPelanggan();
		$rowInterior = $modelInterior->getInterior();
		$rowPemesanan = $modelPemesanan->getPemesanan();
		$rowPembelian = $modelPembelian->getPembelian();
		$rowBahanBaku = $modelBahanBaku->getBahanBaku();

		$data = [
			'user' => count($rowUser->getResult()),
			'pelanggan' => count($rowPelanggan->getResult()),
			'interior' => count($rowInterior->getResult()),
			'pemesanan' => count($rowPemesanan->getResult()),
			'pembelian' => count($rowPembelian->getResult()),
			'bahanbaku' => count($rowBahanBaku->getResult()),
		];
		return view('view_home', $data);
	}
}
