@extends('layout')

@section('content')

    <h3 class="text-center">
        <img style="margin-top:-5px;" src="/img/eu.png"> EUR
        ⟶
        <img style="margin-top:-5px;" src="/img/{{ strtolower(substr($currency, 0, 2)) }}.png"> {{ $currency }}
    </h3>

    <div><a href="/" class="btn btn-light btn-sm">⮜ Back</a></div>

    <small>{{ $currency }} currency per 1 EUR</small>

    <table class="table table-bordered table-sm table-hover">
        @foreach($exchange_rates as $exchange)
            <tr>
                <td style="width: 20%">{{ $exchange->rate }}</td>
                <td style="width: 30%">{{ $exchange->created_at->format('d.m.Y') }}</td>
            </tr>
        @endforeach
    </table>
    {{ $exchange_rates->links() }}

@endsection
