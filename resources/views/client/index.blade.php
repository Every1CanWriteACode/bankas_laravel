{{-- @foreach ($clients as $client) --}}
{{-- <a href="{{route('client.add',[$client])}}">{{$client->firstname}} {{$client->lastname}} {{$client->amount}}</a> --}}
{{-- <a href="{{route('client.minus',[$client])}}">ATIMTIS</a> --}}
{{-- <form method="GET" action="{{route('client.minus', [$client])}}">
    @csrf
    <button type="submit">MINUS</button>
</form>
<br>
<form method="POST" action="{{route('client.destroy', [$client])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br> --}}
{{-- @endforeach --}}


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12 col-xs-12">
           <div class="card">
               <div class="card-header">MENIU</div>

               <div class="card-body">
            {{-- @foreach ($clients as $client)
            <a href="{{route('client.add',[$client])}}">{{$client->firstname}} {{$client->lastname}} {{$client->amount}}</a>
            {{-- <a href="{{route('client.minus',[$client])}}">ATIMTIS</a> --}}
            {{-- <form method="GET" action="{{route('client.minus', [$client])}}">
                @csrf
                <button type="submit">MINUS</button>
            </form>
            <br>
            <form method="POST" action="{{route('client.destroy', [$client])}}">
                @csrf
                <button type="submit">DELETE</button>
            </form>
            <br> --}}
            {{-- @endforeach --}} 
            <table class="table">
                <tr>
                <th>Vardas</th>
                <th>Pavarde</th>
                <th>Asmens kodas</th>
                <th>Saskaitos numeris</th>
                <th>Likutis</th>
                {{-- <th>Keisti valiuta</th> --}}
                <th>Pinigu pridejimas</th>
                <th>Pinigu nuskaiciavimas</th>
                <th>Paskyros panaikinimas</th>
                </tr>
                
                
                
               
                    @foreach ($clients as $client)
                        <tr>
                            
                            <td>{{$client->firstname}}</td>
                            <td>{{$client->lastname}}</td>
                            <td>{{$client->asmensKodas}}</td>
                            <td>{{$client->saskNr}}</td>
                            <td>{{$client->amount}}</td>
                            {{-- <td><a href="">Keisti valiuta</a></td> --}}
                            <td><a href="{{route('client.add',[$client])}}">Prideti pinigu</a></td>
                            <td><a href="{{route('client.minus',[$client])}}">Atimti pinigu</a></td>
                            <td><form method="POST" action="{{route('client.destroy', [$client])}}">
                                @csrf
                                <button type="submit">Trinti klienta</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach 
                
                </table>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
