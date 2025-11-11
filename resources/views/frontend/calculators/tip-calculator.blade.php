@php
    $page_title = 'Tip Calculator - Calculate Tip Amount';
    $meta_desc = 'Calculate tip amount and split bill with our free online tip calculator';
    $heading = 'Tip Calculator';
    $body = 'Calculate tip amount and split the bill among multiple people.';
@endphp

@extends('frontend.layouts.calculator')

@section('calculator-content')
    <h2><strong>{{ $heading }}</strong></h2>
    <p>{{ $body }}</p>
    
    <form method="post" action="{{ route('calculator.tip') }}">
        @csrf
        <div class="gform_body">
            <ul>
                <li style="display: block;">
                    <label><strong>Bill Amount ($)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="bill_amount" value="{{ old('bill_amount', 100) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Tip Percentage (%)</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="tip_percentage" value="{{ old('tip_percentage', 15) }}" required class="medium" step="0.01">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Number of People</strong></label>
                    <div class="ginput_container">
                        <input type="number" name="number_of_people" value="{{ old('number_of_people', 1) }}" required class="medium" min="1">
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
                    <td colspan="2"><strong>Tip Calculation Results</strong></td>
                </tr>
                <tr>
                    <th>Bill Amount</th>
                    <td>${{ $result['bill_amount'] }}</td>
                </tr>
                <tr>
                    <th>Tip Percentage</th>
                    <td>{{ $result['tip_percentage'] }}%</td>
                </tr>
                <tr>
                    <th>Tip Amount</th>
                    <td>${{ $result['tip_amount'] }}</td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td><strong>${{ $result['total_amount'] }}</strong></td>
                </tr>
                <tr>
                    <th>Per Person ({{ $result['number_of_people'] }} people)</th>
                    <td><strong>${{ $result['per_person'] }}</strong></td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection
