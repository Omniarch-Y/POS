@extends('layouts.app')
@section('content')
<style>

  .card{
    padding-bottom:0px;
      width:20%;
      margin-top: 30px;
      background:#f0f0f0;
      font-family: 'Helvetica Neue',Helvetica,Arial;

  }
  .h4{
      margin-top: 20px;
  }

  #container {
  display: flex;
  justify-content: space-between;
  }

</style>
<div class="card container text">
<strong>    
            @if ($message = Session::get('error'))
            <div class="alert alert-danger center_text">
                <h4>{{ $message }}</h4>
            </div>
           @endif    
            </strong>
  <form action="{{url('/changeStatus')}}" method="POST">
    @csrf
  <h4 class="text-center h4">SHOP RECEIPT</h4>
  <div class="text-center">SUPERMARKET QEMER</div>
  <div class="text-center">WEE WE BOUGHT</div>
  <div class="text-center">Tel :0987654321</div>
  <div class="text-center mt-3">
 <input type="text" name="FS" hidden value="{{$Rno}}"> 
        RECIPT:{{$Rno}}</div>
        <input type="text" name="tin_number" hidden value="{{$tin_number}}">

  <div class="text-center">DATE :{{now()->format('d-m-Y')}}</div>
  <div class="text-center mb-1">CASHER :{{auth()->user()->name}}</div>
  <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
  @foreach ($informations as $information)
 
  <div id="container"> 
    <div class="item">{{ $information->item->name}} * {{$information->amount}}</div>
    <input type="text" name="stock_id" hidden value="{{ $information->item->id}}">
    <input type="text" name="amount" hidden value="{{ $information->amount}}">
    <div class="price">{{$information->total_price}}Br</div>
  </div>
  @endforeach
  <div class="e">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
  <div id="container"> 
 <div class="x">TAXABLE</div>
    <div class="priceView">{{$totalItemPrice}}Br</div>
  </div>
  <div id="container">
    <div class="x">VAT15%</div>
    <div class="priceView">{{$vat}}Br</div>
  </div>
  <div id="container">
    <strong class="price">TOTAL</strong>
    <strong class="priceView">{{$total}}Br</strong>
  </div>
  <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
  <div id="container"> 
    <div class="Cash">Tin number:</div>
    <div class="cashView">{{$tin_number}}</div>
  </div>
  <div id="container"> 
    <div class="Cash">CASH:</div>
    <div class="cashView">{{$total}}Br</div>
  </div>
  <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
  <div class="PaidWith">Paid with CASH</div>
  <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
  <div class="dot">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
  <div class="text-center">THANK YOU</div>
  <div class="text-center">HAVE A NICE DAY</div>
</div>
<div class="print text-center mt-3">
  <button type="Submit" class="btn btn-success text-center" onclick="printFunction()">Print</button>
</div>

</form>

@endsection