@php
    $page_title = 'Simple Interest Calculator - Calculate Simple Interest';
    $meta_desc = 'Calculate simple interest with our free online calculator';
    $heading = 'Simple Interest Calculator';
    $body = 'Calculate simple interest on your investment based on principal, rate, and time period.';
@endphp

@extends('frontend.layouts.calculator')

@section('calculator-content')
    <h2><strong>{{ $heading }}</strong></h2>
    <p>{{ $body }}</p>
    
    <form method="post" action="{{ route('calculator.simple-interest') }}">
        @csrf
        <div class="gform_body">
            <ul>
                <li style="display: block;">
                    <label><strong>Principal Amount ($)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="principal" value="{{ old('principal', 10000) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Interest Rate (% per year)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="rate" value="{{ old('rate', 5) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Time Period (years)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="time" value="{{ old('time', 5) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <div class="ginput_container">
                        <input type="submit" class="gform_button button" value="CALCULATE" name="submit">
                    </div>
                </li>
            </ul>
        </div>
    </form>
    
    @if($result)
        <table class="calculator_table">
            <tbody>
                <tr>
                    <td colspan="2"><strong>Simple Interest Calculation Results</strong></td>
                </tr>
                <tr>
                    <th>Principal Amount</th>
                    <td>${{ $result['principal'] }}</td>
                </tr>
                <tr>
                    <th>Interest Rate</th>
                    <td>{{ $result['rate'] }}%</td>
                </tr>
                <tr>
                    <th>Time Period</th>
                    <td>{{ $result['time'] }} years</td>
                </tr>
                <tr>
                    <th>Simple Interest</th>
                    <td>${{ $result['interest'] }}</td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td><strong>${{ $result['amount'] }}</strong></td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection
