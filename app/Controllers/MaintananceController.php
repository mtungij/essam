<?php

namespace App\Controllers;




use App\Controllers\BaseController;
use App\Models\MaintananceModel;
use App\Models\SalioModel;
use mpdf\mpdf;


class MaintananceController extends BaseController
{
    private function createMpdf(): \Mpdf\Mpdf
    {
        $tempDir = WRITEPATH . 'mpdf';
        if (!is_dir($tempDir)) {
            mkdir($tempDir, 0777, true);
        }

        return new \Mpdf\Mpdf([
            'tempDir' => $tempDir,
        ]);
    }

    public function maintanance()
    {
        $branch = $this->getBranch();
        $maoni  = model(MaintananceModel::class)->getByBranch($branch);
        return view('matengenezo/matengenezo', ['maoni' => $maoni]);
    }

    private function getBranch(): ?string
    {
        if (session('position') === 'Admin') {
            return null;
        }
        $branch = session('branch');
        return ($branch !== null && $branch !== '') ? $branch : '__none__';
    }

    public function store()
    {
        if( ! $this->validate([
            'expenses' => 'required',
            'amount' => 'required',
            'suggestion' => 'required',

        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }

     $validatedData = $this->validator->getValidated();

     $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
     $validatedData['amount']   = str_replace(',', '', $validatedData['amount']);
     $validatedData['branch']   = session('branch');

     model(MaintananceModel::class)->insert($validatedData);

     return redirect()->back()->with('successcreate', 'Record added successfully');
}

public function matengenezoReport()
{
    $branch = $this->getBranch();
    $maoni  = model(MaintananceModel::class)->getByBranch($branch);
   
    // dd($maoni);

    $mpdf = $this->createMpdf();
		$html = view('matengenezo/report',['maoni'=>$maoni]);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('matengenezo.pdf','I'); 
       
   
    
}

}