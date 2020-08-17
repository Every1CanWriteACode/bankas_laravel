    {{-- <h1 style="text-align: center; color: #9400D3;">Lesu pridejimas</h1>
<form action="{{route('client.add',[$client->id])}}" method="GET" style="margin-left:calc(50% - 85px); font-family: Monospace, Fantasy, sans-serif; cursor: pointer;">
    {{$client->firstname}} 
    {{$client->lastname}}<br><br>
    Pridejimo suma:<br>
    <input type="text" name="amount" value="0"><br><br>
    <input type="hidden" name="id" value="{{$client->id}}">
    @csrf
    <button type="submit" style="border-radius: 10px; border: none; padding: 2px 8px; background-color: #ccc; color: #9400D3; width: 165px;">ADD</button>

</div>
</form>

<div> --}}

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Lesu pridejimas</div>

               <div class="card-body">
                <form action="{{route('client.add',[$client->id])}}" method="GET" style="margin-left:calc(50% - 85px); font-family: Monospace, Fantasy, sans-serif; cursor: pointer;">
                    <p>{{$client->firstname}} 
                        {{$client->lastname}} 
                    </p>
                    <p>Likutis:   {{$client->amount}}<br>
                        Lesu inesimo suma:<br>
                        </p> 
                    <input type="text" name="amount" value="0"><br><br>
                    <input type="hidden" name="id" value="{{$client->id}}">
                    @csrf
                    <button type="submit" style="border-radius: 10px; border: none; padding: 2px 8px; background-color: #ccc; color: #9400D3; width: 165px;">ADD</button>
                
                </div>
                </form>
                
                <a class="navbar-brand" href="{{ url('/clients') }}">Atgal</i></a>
                <div>                
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
