<?php
$saskNr = 'LT';
    
    for($i = 0; $i<18; $i++){
        $randNr = rand(0,9);
        $saskNr .= $randNr;
    }
?>
{{-- <h1 style="text-align: center; color: #9400D3;">Kliento sukurimas</h1>
<form method="POST" action="{{route('client.store')}}"  style="margin-left:calc(50% - 85px);">
Vardas:<br>
<input type="text" name="firstname" placeholder="Vardas"><br>
Pavarde: <br>
<input type="text" name="lastname" placeholder="Pavarde"><br>
Asmens kodas:<br>
<input type="text" name="asmensKodas" placeholder="Asmens kodas"><br><br>
Saskaitos numetis:<br>
<input type="text" name="saskNr" value="{{$saskNr}}"><br><br>
@csrf
<button style="border-radius: 10px; border: none; padding: 2px 8px; background-color: #ccc; color: #9400D3; width: 165px; cursor: pointer;" type="submit">ADD</button>
</form>
</body>
</html> --}}

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">CREATE</div>

               <div class="card-body">
                <form method="POST" action="{{route('client.store')}}"  style="margin-left:calc(50% - 85px);">
                    Vardas:<br>
                    <input type="text" name="firstname" placeholder="Vardas"><br>
                    Pavarde: <br>
                    <input type="text" name="lastname" placeholder="Pavarde"><br>
                    Asmens kodas:<br>
                    <input type="text" name="asmensKodas" placeholder="Asmens kodas"><br><br>
                    Saskaitos numetis:<br>
                    <input type="text" name="saskNr" readonly value="{{$saskNr}}" ><br><br>
                    @csrf
                    <button style="border-radius: 10px; border: none; padding: 2px 8px; background-color: #ccc; color: #9400D3; width: 165px; cursor: pointer;" type="submit">ADD</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
