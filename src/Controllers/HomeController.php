<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PKPass\PKPass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return Inertia::render('Dashboard/Home/Index');
        // $pass = new PKPass(storage_path('app/Certificates.p12'), 'Aasd123456@');

        // $data = [
        //     'description' => 'Demo pass',
        //     'formatVersion' => 1,
        //     'organizationName' => 'Flight Express',
        //     'passTypeIdentifier' => 'pass.sa.net.de', // Change this!
        //     'serialNumber' => '12345678',
        //     'teamIdentifier' => 'Z9CYHVR232', // Change this!
        //     'boardingPass' => [
        //         'primaryFields' => [
        //             [
        //                 'key' => 'origin',
        //                 'label' => 'San Francisco',
        //                 'value' => 'SFO',
        //             ],
        //             [
        //                 'key' => 'destination',
        //                 'label' => 'London',
        //                 'value' => 'LHR',
        //             ],
        //         ],
        //         'secondaryFields' => [
        //             [
        //                 'key' => 'gate',
        //                 'label' => 'Gate',
        //                 'value' => 'F12',
        //             ],
        //             [
        //                 'key' => 'date',
        //                 'label' => 'Departure date',
        //                 'value' => '07/11/2022 15:22',
        //             ],
        //         ],
        //         'backFields' => [
        //             [
        //                 'key' => 'passenger-name',
        //                 'label' => 'Passenger',
        //                 'value' => 'Badr alanizy',
        //             ],
        //         ],
        //         'transitType' => 'PKTransitTypeAir',
        //     ],
        //     'barcode' => [
        //         'format' => 'PKBarcodeFormatQR',
        //         'message' => 'Flight-GateF12-ID6643679AH7B',
        //         'messageEncoding' => 'iso-8859-1',
        //     ],
        //     'backgroundColor' => 'rgb(32,110,247)',
        //     'logoText' => 'Flight info',
        //     'relevantDate' => date('Y-m-d\TH:i:sP')
        // ];
        // $pass->setData($data);
        
        // // Add files to the pass package
        // $pass->addFile(storage_path('app/images/icon.png'));
        // $pass->addFile(storage_path('app/images/icon@2x.png'));
        // $pass->addFile(storage_path('app/images/logo.png'));
        
        // // Create and output the pass
        // if(!$pass->create(true)) {
        //     echo 'Error: ' . $pass->getError();
        // }
    }
}
