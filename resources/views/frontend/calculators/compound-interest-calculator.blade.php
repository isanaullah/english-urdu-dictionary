@php
    $page_title = 'Compound Interest Calculator - Calculate Compound Interest';
    $meta_desc = 'Calculate compound interest with our free online calculator';
    $heading = 'Compound Interest Calculator';
    $body = 'Calculate compound interest on your investment based on principal, rate, time, and compounding frequency.';
@endphp

@extends('frontend.layouts.calculator')

@section('calculator-content')
    <h2><strong>{{ $heading }}</strong></h2>
    <p>{{ $body }}</p>
    
    <form method="post" action="{{ route('calculator.compound-interest') }}">
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
                    <label><strong>Compounding Frequency</strong></label>
                    <div class="ginput_container">
                        <select name="frequency" class="medium">
                            <option value="1">Annually</option>
                            <option value="2">Semi-Annually</option>
                            <option value="4">Quarterly</option>
                            <option value="12" selected>Monthly</option>
                            <option value="365">Daily</option>
                        </select>
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
                    <td colspan="2"><strong>Compound Interest Calculation Results</strong></td>
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
                    <th>Final Amount</th>
                    <td><strong>${{ $result['amount'] }}</strong></td>
                </tr>
                <tr>
                    <th>Total Interest Earned</th>
                    <td>${{ $result['interest'] }}</td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection
