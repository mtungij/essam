<?php

namespace App\Controllers;




use App\Controllers\BaseController;
use App\Models\MaintananceModel;
use App\Models\SalioModel;
use mpdf\mpdf;


class MaintananceController extends BaseController
{
    public function maintanance()
    {
      $maoni=model(MaintananceModel::class)->findAll();
      return view ('matengenezo/matengenezo',['maoni' => $maoni]);
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

    //  dd($validatedData); 

    $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);

     model(MaintananceModel::class)->insert($validatedData );

       
       return redirect()->back()->with('successcreate','Order added successfully');
}

public function matengenezoReport()
{
    $maoni=model(SalioModel::class)->findAll();
   
    // dd($maoni);

    $mpdf = new \Mpdf\Mpdf();
		$html = view('matengenezo/report',['maoni'=>$maoni]);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('matengenezo.pdf','I'); 
       
   
    
}

}