@php
    $page_title = 'Personal Loan Calculator - Calculate Personal Loan EMI';
    $meta_desc = 'Calculate your personal loan monthly payment with our free online calculator';
    $heading = 'Personal Loan Calculator';
    $body = 'Calculate your monthly personal loan payment based on loan amount, interest rate, and loan term.';
@endphp

@extends('frontend.layouts.calculator')

@section('calculator-content')
    <h2><strong>{{ $heading }}</strong></h2>
    <p>{{ $body }}</p>
    
    <form method="post" action="{{ route('calculator.personal-loan') }}">
        @csrf
        <div class="gform_body">
            <ul>
                <li style="display: block;">
                    <label><strong>Loan Amount ($)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="loan_amount" value="{{ old('loan_amount', 50000) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Interest Rate (% per year)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="interest_rate" value="{{ old('interest_rate', 12) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Loan Term (months)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="loan_term" value="{{ old('loan_term', 36) }}" required class="medium">
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
                    <td colspan="2"><strong>Personal Loan Calculation Results</strong></td>
                </tr>
                <tr>
                    <th>Loan Amount</th>
                    <td>${{ $result['loan_amount'] }}</td>
                </tr>
                <tr>
                    <th>Interest Rate</th>
                    <td>{{ $result['interest_rate'] }}%</td>
                </tr>
                <tr>
                    <th>Loan Term</th>
                    <td>{{ $result['loan_term'] }} months</td>
                </tr>
                <tr>
                    <th>Monthly Payment</th>
                    <td><strong>${{ $result['monthly_payment'] }}</strong></td>
                </tr>
                <tr>
                    <th>Total Payment</th>
                    <td>${{ $result['total_payment'] }}</td>
                </tr>
                <tr>
                    <th>Total Interest</th>
                    <td>${{ $result['total_interest'] }}</td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection
