<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class CalculatorController extends Controller
{
    public function ageCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $td = $request->input('td');
            $tm = $request->input('tm');
            $ty = $request->input('ty');
            
            $dd = $request->input('dd');
            $mm = $request->input('mm');
            $yy = $request->input('yy');
            
            $today = "$td-$tm-$ty";
            $birthdate = "$dd-$mm-$yy";
            
            $datetime1 = new DateTime($today);
            $datetime2 = new DateTime($birthdate);
            
            $difference = $datetime2->diff($datetime1);
            
            $result = [
                'your_birth_date' => 'Your age is: ' . $difference->y . ' years, ' . $difference->m . ' months, ' . $difference->d . ' days',
                'birth_in_month' => $difference->y * 12 + $difference->m . " Months " . $difference->d . " Days",
                'birth_in_days' => floor((strtotime($today) - strtotime($birthdate)) / 86400) . ' Days',
                'birth_in_weeks' => floor((strtotime($today) - strtotime($birthdate)) / 604800) . ' weeks',
                'birth_in_hour' => round((strtotime($today) - strtotime($birthdate)) / 3600, 1) . ' Hour',
                'birth_in_minutes' => round(abs(strtotime($today) - strtotime($birthdate)) / 60, 2) . " minute",
                'birth_in_seconds' => (strtotime($today) - strtotime($birthdate)) . " Seconds",
                'your_next_birthday' => $this->daysTillBirthday($birthdate) . " Days Left for Your Next Birthday",
                'day_of_my_next_birthday' => $this->getNextBirthdayDay($birthdate) . " Day of the next birthday",
                'age' => $difference->y,
                'dd' => $dd,
                'mm' => $mm,
                'yy' => $yy,
                'td' => $td,
                'tm' => $tm,
                'ty' => $ty,
            ];
        }
        
        return view('frontend.calculators.age-calculator', compact('result'));
    }
    
    private function daysTillBirthday($birthdate)
    {
        $date = new DateTime($birthdate);
        $birthday = $date->format('j F');
        
        $bts = strtotime($birthday . " " . date("y"));
        $ts = time();
        
        if ($bts < $ts) {
            $bts = strtotime($birthday . " " . date("y", strtotime("+1 year")));
        }
        
        return round(($bts - $ts) / 86400);
    }
    
    private function getNextBirthdayDay($birthdate)
    {
        $date = new DateTime($birthdate);
        $birthday = $date->format('j F');
        return date('l', strtotime($birthday));
    }

    public function loveCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $name1 = strtolower($request->input('name1'));
            $name2 = strtolower($request->input('name2'));
            
            // Simple love percentage calculation
            $percentage = (strlen($name1) + strlen($name2)) % 101;
            if ($percentage < 40) {
                $percentage += 40;
            }
            
            $result = [
                'name1' => $request->input('name1'),
                'name2' => $request->input('name2'),
                'percentage' => $percentage,
            ];
        }
        
        return view('frontend.calculators.love-calculator', compact('result'));
    }

    public function mortgageCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $loanAmount = $request->input('loan_amount');
            $interestRate = $request->input('interest_rate') / 100 / 12;
            $loanTerm = $request->input('loan_term') * 12;
            
            $monthlyPayment = $loanAmount * ($interestRate * pow(1 + $interestRate, $loanTerm)) / (pow(1 + $interestRate, $loanTerm) - 1);
            $totalPayment = $monthlyPayment * $loanTerm;
            $totalInterest = $totalPayment - $loanAmount;
            
            $result = [
                'loan_amount' => number_format($loanAmount, 2),
                'interest_rate' => $request->input('interest_rate'),
                'loan_term' => $request->input('loan_term'),
                'monthly_payment' => number_format($monthlyPayment, 2),
                'total_payment' => number_format($totalPayment, 2),
                'total_interest' => number_format($totalInterest, 2),
            ];
        }
        
        return view('frontend.calculators.mortgage-calculator', compact('result'));
    }

    public function emiCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $principal = $request->input('principal');
            $rate = $request->input('rate') / 100 / 12;
            $tenure = $request->input('tenure');
            
            $emi = $principal * $rate * pow(1 + $rate, $tenure) / (pow(1 + $rate, $tenure) - 1);
            $totalAmount = $emi * $tenure;
            $totalInterest = $totalAmount - $principal;
            
            $result = [
                'principal' => number_format($principal, 2),
                'rate' => $request->input('rate'),
                'tenure' => $tenure,
                'emi' => number_format($emi, 2),
                'total_amount' => number_format($totalAmount, 2),
                'total_interest' => number_format($totalInterest, 2),
            ];
        }
        
        return view('frontend.calculators.emi-calculator', compact('result'));
    }

    public function personalLoanCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $loanAmount = $request->input('loan_amount');
            $interestRate = $request->input('interest_rate') / 100 / 12;
            $loanTerm = $request->input('loan_term');
            
            $monthlyPayment = $loanAmount * ($interestRate * pow(1 + $interestRate, $loanTerm)) / (pow(1 + $interestRate, $loanTerm) - 1);
            $totalPayment = $monthlyPayment * $loanTerm;
            $totalInterest = $totalPayment - $loanAmount;
            
            $result = [
                'loan_amount' => number_format($loanAmount, 2),
                'interest_rate' => $request->input('interest_rate'),
                'loan_term' => $loanTerm,
                'monthly_payment' => number_format($monthlyPayment, 2),
                'total_payment' => number_format($totalPayment, 2),
                'total_interest' => number_format($totalInterest, 2),
            ];
        }
        
        return view('frontend.calculators.personal-loan-calculator', compact('result'));
    }

    public function salaryTaxCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $salary = $request->input('salary');
            $taxRate = $request->input('tax_rate', 10);
            
            $tax = $salary * ($taxRate / 100);
            $netSalary = $salary - $tax;
            
            $result = [
                'salary' => number_format($salary, 2),
                'tax_rate' => $taxRate,
                'tax' => number_format($tax, 2),
                'net_salary' => number_format($netSalary, 2),
            ];
        }
        
        return view('frontend.calculators.salary-tax-calculator', compact('result'));
    }

    public function compoundInterestCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $principal = $request->input('principal');
            $rate = $request->input('rate') / 100;
            $time = $request->input('time');
            $frequency = $request->input('frequency', 12);
            
            $amount = $principal * pow((1 + $rate / $frequency), $frequency * $time);
            $interest = $amount - $principal;
            
            $result = [
                'principal' => number_format($principal, 2),
                'rate' => $request->input('rate'),
                'time' => $time,
                'frequency' => $frequency,
                'amount' => number_format($amount, 2),
                'interest' => number_format($interest, 2),
            ];
        }
        
        return view('frontend.calculators.compound-interest-calculator', compact('result'));
    }

    public function simpleInterestCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $principal = $request->input('principal');
            $rate = $request->input('rate');
            $time = $request->input('time');
            
            $interest = ($principal * $rate * $time) / 100;
            $amount = $principal + $interest;
            
            $result = [
                'principal' => number_format($principal, 2),
                'rate' => $rate,
                'time' => $time,
                'interest' => number_format($interest, 2),
                'amount' => number_format($amount, 2),
            ];
        }
        
        return view('frontend.calculators.simple-interest-calculator', compact('result'));
    }

    public function tipCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $billAmount = $request->input('bill_amount');
            $tipPercentage = $request->input('tip_percentage', 15);
            $numberOfPeople = $request->input('number_of_people', 1);
            
            $tipAmount = $billAmount * ($tipPercentage / 100);
            $totalAmount = $billAmount + $tipAmount;
            $perPerson = $totalAmount / $numberOfPeople;
            
            $result = [
                'bill_amount' => number_format($billAmount, 2),
                'tip_percentage' => $tipPercentage,
                'number_of_people' => $numberOfPeople,
                'tip_amount' => number_format($tipAmount, 2),
                'total_amount' => number_format($totalAmount, 2),
                'per_person' => number_format($perPerson, 2),
            ];
        }
        
        return view('frontend.calculators.tip-calculator', compact('result'));
    }

    public function homeLoanCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $loanAmount = $request->input('loan_amount');
            $interestRate = $request->input('interest_rate') / 100 / 12;
            $loanTerm = $request->input('loan_term') * 12;
            
            $monthlyPayment = $loanAmount * ($interestRate * pow(1 + $interestRate, $loanTerm)) / (pow(1 + $interestRate, $loanTerm) - 1);
            $totalPayment = $monthlyPayment * $loanTerm;
            $totalInterest = $totalPayment - $loanAmount;
            
            $result = [
                'loan_amount' => number_format($loanAmount, 2),
                'interest_rate' => $request->input('interest_rate'),
                'loan_term' => $request->input('loan_term'),
                'monthly_payment' => number_format($monthlyPayment, 2),
                'total_payment' => number_format($totalPayment, 2),
                'total_interest' => number_format($totalInterest, 2),
            ];
        }
        
        return view('frontend.calculators.home-loan-calculator', compact('result'));
    }

    public function carLoanCalculator(Request $request)
    {
        $result = null;
        
        if ($request->isMethod('post')) {
            $loanAmount = $request->input('loan_amount');
            $interestRate = $request->input('interest_rate') / 100 / 12;
            $loanTerm = $request->input('loan_term');
            
            $monthlyPayment = $loanAmount * ($interestRate * pow(1 + $interestRate, $loanTerm)) / (pow(1 + $interestRate, $loanTerm) - 1);
            $totalPayment = $monthlyPayment * $loanTerm;
            $totalInterest = $totalPayment - $loanAmount;
            
            $result = [
                'loan_amount' => number_format($loanAmount, 2),
                'interest_rate' => $request->input('interest_rate'),
                'loan_term' => $loanTerm,
                'monthly_payment' => number_format($monthlyPayment, 2),
                'total_payment' => number_format($totalPayment, 2),
                'total_interest' => number_format($totalInterest, 2),
            ];
        }
        
        return view('frontend.calculators.car-loan-calculator', compact('result'));
    }
}
