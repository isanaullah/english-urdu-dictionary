@php
    $page_title = 'EMI Calculator - Calculate Equated Monthly Installment';
    $meta_desc = 'Calculate your EMI (Equated Monthly Installment) with our free online EMI calculator';
    $heading = 'EMI Calculator';
    $body = 'Calculate your Equated Monthly Installment (EMI) based on principal amount, interest rate, and tenure.';
@endphp

@extends('frontend.layouts.calculator')

@section('calculator-content')
    <h2><strong>{{ $heading }}</strong></h2>
    <p>{{ $body }}</p>
    
    <form method="post" action="{{ route('calculator.emi') }}">
        @csrf
        <div class="gform_body">
            <ul>
                <li style="display: block;">
                    <label><strong>Principal Amount ($)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="principal" value="{{ old('principal', 100000) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Interest Rate (% per year)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="rate" value="{{ old('rate', 10) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Tenure (months)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="tenure" value="{{ old('tenure', 60) }}" required class="medium">
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
                    <td colspan="2"><strong>EMI Calculation Results</strong></td>
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
                    <th>Tenure</th>
                    <td>{{ $result['tenure'] }} months</td>
                </tr>
                <tr>
                    <th>Monthly EMI</th>
                    <td><strong>${{ $result['emi'] }}</strong></td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td>${{ $result['total_amount'] }}</td>
                </tr>
                <tr>
                    <th>Total Interest</th>
                    <td>${{ $result['total_interest'] }}</td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection
