<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all()->sortBy('firstname');
        return view('client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'firstname' => ['required', 'min:3', 'max:64'],
            'lastname' => ['required', 'min:3', 'max:64'],
            'asmensKodas' => ['required', 'min:11', 'max:11'],
        ],
            [
                'firstname.min' => 'Vardas per trumpas',
                'firstname.max' => 'Vardas per ilgas',
                'lastname.min' => 'Pavarde per trumpa',
                'lastname.max' => 'Pavarde per ilga',
                'asmensKodas.min' => 'Netinkamai ivestas asmens kodas',
                'asmensKodas.max' => 'Netinkamai ivestas asmens kodas'
                ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        if (Client::where('asmensKodas',$request->asmensKodas)->first()){
            return redirect()->route('client.index')->withErrors('Bandai naudoti jau registruota asmens koda');
            }else{
                $client = new Client;
                $client->firstname = $request->firstname;
                $client->lastname = $request->lastname;
                $client->asmensKodas = $request->asmensKodas;
                $client->saskNr = $request->saskNr;
                $client->save();
                return redirect()->route('client.index')->with('success_message', 'Klientas sukurtas sekmingai');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    public function add(Request $request, Client $client)
    {
        
        
        if(isset($_GET['amount'])){
            $validator = Validator::make($request->all(),
                []
            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
            if ($request->amount < 0) {
                return redirect()->route('client.index')->withErrors('Minuso ideti negalima.');
            }
            $client->amount += $request->amount;
            $client->save();
            
            return redirect()->route('client.index')->with('success_message', 'Ivesta suma prideta sekmingai');
        } else {
            return view('client.add', ['client' => $client ]);
        }
        // return redirect()->route('client.add', ['client' => $client ]);
    }
    public function minus(Request $request, Client $client)
    {
        if(isset($_GET['amount'])){
            $validator = Validator::make($request->all(),
            []
            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
            if ($request->amount < 0) return redirect()->route('client.index')->withErrors('Neigiamu pinigu nuimti negalima');
            elseif($request->amount > $client->amount)return redirect()->route('client.index')->withErrors('Saskaitoje nepakankamas likutis');
            $client->amount-=$request->amount;
            $client->save();
            // return redirect()->route('client.index');
            return redirect()->route('client.index')->with('success_message', 'Ivesta suma nuskaiciuota sekmingai');
        }
        else{
            return view('client.minus', ['client' => $client]);
        }   
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if($client->amount != 0 || $client->amount < 0){
            return redirect()->route('client.index')->withErrors('Negalima istrinti, kadangi saskaitoje yra lesu');
        } else {
        $client->delete();
           return redirect()->route('client.index')->with('success_message', 'Sekmingai istrinta saskaita');
        }
    }
}
