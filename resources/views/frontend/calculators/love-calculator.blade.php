@php
    $page_title = 'Love Calculator - Calculate Love Percentage';
    $meta_desc = 'Calculate love percentage between two people with our free online love calculator';
    $heading = 'Love Calculator';
    $body = 'Enter your name and your partner\'s name to calculate the love percentage between you two.';
@endphp

@extends('frontend.layouts.calculator')

@section('calculator-content')
    <h2><strong>{{ $heading }}</strong></h2>
    <p>{{ $body }}</p>
    
    <form method="post" action="{{ route('calculator.love') }}">
        @csrf
        <div class="gform_body">
            <ul>
                <li style="display: block;">
                    <label><strong>Your Name</strong></label>
                    <div class="ginput_container">
                        <input type="text" name="name1" value="{{ $result['name1'] ?? '' }}" required class="medium">
                    </div>
                </li>
                
                <li style="display: block;">
                    <label><strong>Partner's Name</strong></label>
                    <div class="ginput_container">
                        <input type="text" name="name2" value="{{ $result['name2'] ?? '' }}" required class="medium">
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
        <div class="calculator_result">
            <h3>Love Result</h3>
            <p><strong>{{ $result['name1'] }}</strong> and <strong>{{ $result['name2'] }}</strong></p>
            <p class="love-percentage">{{ $result['percentage'] }}%</p>
            <p>
                @if($result['percentage'] >= 80)
                    Perfect Match! You two are made for each other! ❤️
                @elseif($result['percentage'] >= 60)
                    Great Match! You have a strong connection! 💕
                @elseif($result['percentage'] >= 40)
                    Good Match! There's potential here! 💗
                @else
                    Needs Work! But love can grow with effort! 💝
                @endif
            </p>
        </div>
    @endif
@endsection
