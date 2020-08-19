{{-- @extends('layouts.app')

@section('content') --}}
@foreach($expenses as $expense)
{{-- <h1>{{$expense->reference}} </h1> --}}
{{-- <h1>{{$expense->reports}}</h1> --}}

@foreach($expense->reports as $report)
        <p>
            {{$report->title}}
        </p>
@endforeach
@endforeach

{{-- @endsection --}}



<div class="container">
    @foreach($reports as $report)
    {{-- <h1>{{$expense->reference}} </h1> --}}
    {{-- <h1>{{$expense->reports}}</h1> --}}

    @foreach($report->expenses as $expense)
            <p>{{$expense->amount}}</p>
    @endforeach
    </div>
    @endforeach
