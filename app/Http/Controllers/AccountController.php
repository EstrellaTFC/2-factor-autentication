<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Transaction;
use Session;
use App\Pagination;
use App\User;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newAccount()
    {
    	return view('account/new');
    }

    public function add_account(Request $request)
    {
        $x = rand();
    	$request->validate([
    		'name' => 'required',
    		'num' => 'required',
    		'email' => 'required',
    		'phone' => 'required',
    		'bvn' => 'required',
    		'dob' => 'required',
    		'type' => 'required',
    	]);
    	Account::Create([
    		'name' => $request['name'],
    		'acc_no' => $request['num'],
    		'email' => $request['email'],
    		'phone' => $request['phone'],
    		'bvn' => $request['bvn'],
    		'dob' => $request['dob'],
    		'type' => $request['type'],
            'chk' => $x,
    	]);
    	Session::flash('success', 'Account registered successfully');
    	return redirect('addaccount');
    }

    public function allaccount()
    {
    	$data = Account::paginate(10);
    	return view('account.all', compact('data'));
    }

    public function deposit()
    {
        return view('account.demo');
       // return view('account.deposit');
    }

    public function deposit_form(Request $request)
    {
        $request->validate([
            'acc_num' => 'required',
        ]);
        $data = Account::where('acc_no', $request['acc_num'])->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'account number do not exist');
            return redirect('deposit');
        }
        else{
            return view('account.addDeposit', compact('data'));
        }
    }

    public function depositNow(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);
        $bal = $request['balance'] + $request['amount'];
        Account::where('acc_no', $request['acc_num'])
        ->update(['balance' => $bal]);

        Transaction::create([
            'acc_num' => $request['acc_num'],
            'acc_name' => $request['acc_name'],
            'amount' => $request['amount'],
            'initiator' => $request['name'],
            'phone' => $request['phone'],
            'type' => 'deposit',
        ]);

        Session::flash('success', 'Deposit successfull');
        return redirect('deposit');
    }

    public function transferNow(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);
        $data = ([
            'acc_num' => $request['acc_num'],
            'acc_name' => $request['acc_name'],
            'amount' => $request['amount'],
            'initiator' => $request['name'],
            'balance' => $request['balance'],
            'phone' => $request['phone'],
            'type' => 'deposit',
        ]);
        Session::push('data', $data);
        return view('account.QR');
    }

    public function confirmQR(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);
    }

    public function confirmtransfer(Request $request)
    {
        if ($request['token'] != $request['code1']) {
            Session::flash('error', 'wrong token supplied');
            return view('account.QR');
        }
        else{
            $bal = $request['balance'] + $request['amount'];
        Account::where('acc_no', $request['acc_num'])
        ->update(['balance' => $bal]);

        Transaction::create([
            'acc_num' => $request['acc_num'],
            'acc_name' => $request['acc_name'],
            'amount' => $request['amount'],
            'initiator' => $request['name'],
            'phone' => $request['phone'],
            'type' => 'transfer',
        ]);

        Session::flash('success', 'transfer successfull');
        return redirect('transfer');
        }
    }

    public function withdraw()
    {
        return view('account.withdraw');
    }

    public function withdrawal(Request $request)
    {
        $request->validate([
            'acc_num' => 'required',
        ]);
        $data = Account::where('acc_no', $request['acc_num'])->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'account number do not exist');
            return redirect('withdraw');
        }
        else{
            return view('account.withdrawNow', compact('data'));
        }
    }

    public function withdraw_form(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);
        if ($request['amount'] > $request['balance']) {
            Session::flash('error', 'this amount cant be withdrawn');
            return redirect('withdraw');
        }
        else{
            $bal = $request['balance'] - $request['amount'];
            Account::where('acc_no', $request['acc_num'])
            ->update(['balance' => $bal]);

            Transaction::create([
                'acc_num' => $request['acc_num'],
                'acc_name' => $request['acc_name'],
                'amount' => $request['amount'],
                'initiator' => $request['name'],
                'phone' => $request['phone'],
                'type' => 'deposit',
            ]);

            Session::flash('success', 'Transaction successfull');
            return redirect('withdraw');
        }
    }

    public function confirm_form(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $data = Account::where('email', $request['email'])
        ->where('chk', $request['code'])->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'incorrect code');
            return redirect('confirm');
        }
        else{
            User::where('email', $request['email'])
            ->update([
                'active' => 2
            ]);
            return redirect('home');
        }
    }

    public function transfer()
    {
        return view('account.transfer');
    }

    public function transfer_form(Request $request)
    {
        $request->validate([
            'acc_num' => 'required',
        ]);
        $data = Account::where('acc_no', $request['acc_num'])->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'account number do not exist');
            return redirect('transfer');
        }
        else{
            return view('account.addtransfer', compact('data'));
        }
    }

}





