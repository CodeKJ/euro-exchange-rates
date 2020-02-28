@extends('layout')

@section('content')


    <div class="row small">
        <div class="col-md-6">
            {{ $currency_date }}
        </div>
        <div class="col-md-6 text-right">
           Currency per 1 EUR
        </div>
    </div>

    <table class="table table-bordered table-sm table-hover">
        @foreach($currencies as $currency)
        <tr>
            <td style="width: 20%">
                <a href="{{ route('currency', $currency->currency) }}">
                <img style="float:left;margin-right:5px" src="/img/{{ strtolower(substr($currency->currency, 0, 2)) }}.png"> {{ $currency->currency }}
                </a>
            </td>
            <td style="width: 30%" class="text-right">
                {{ substr($currency->rate, 0, -3) }} @if($currency->previous_rate)<div class="bullet {{ $currency->previous_rate < $currency->rate ? 'up' : 'down' }}"></div>@endif
            </td>
        </tr>
        @endforeach
    </table>
    {{ $currencies->links() }}

@endsection
