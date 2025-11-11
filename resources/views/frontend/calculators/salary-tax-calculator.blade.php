@php
    $page_title = 'Salary Tax Calculator - Calculate Income Tax';
    $meta_desc = 'Calculate your income tax on salary with our free online tax calculator';
    $heading = 'Salary Tax Calculator';
    $body = 'Calculate your income tax based on your salary and tax rate.';
@endphp

@extends('frontend.layouts.calculator')

@section('calculator-content')
    <h2><strong>{{ $heading }}</strong></h2>
    <p>{{ $body }}</p>
    
    <form method="post" action="{{ route('calculator.salary-tax') }}">
        @csrf
        <div class="gform_body">
            <ul>
                <li style="display: block;">
                    <label><strong>Annual Salary ($)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="salary" value="{{ old('salary', 50000) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Tax Rate (%)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="tax_rate" value="{{ old('tax_rate', 10) }}" required class="medium" step="0.01">
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
                    <td colspan="2"><strong>Tax Calculation Results</strong></td>
                </tr>
                <tr>
                    <th>Gross Salary</th>
                    <td>${{ $result['salary'] }}</td>
                </tr>
                <tr>
                    <th>Tax Rate</th>
                    <td>{{ $result['tax_rate'] }}%</td>
                </tr>
                <tr>
                    <th>Tax Amount</th>
                    <td>${{ $result['tax'] }}</td>
                </tr>
                <tr>
                    <th>Net Salary</th>
                    <td><strong>${{ $result['net_salary'] }}</strong></td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection
