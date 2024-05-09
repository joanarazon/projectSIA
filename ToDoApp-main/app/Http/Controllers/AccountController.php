<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;

use  App\Models\TaskDetails;


class AccountController extends Controller

{
    public function index() {
        return view('register.index');
    }

    public function admin(){
        $accounts = Account::all();
        return view('admin.index',['accounts' => $accounts]);
    }

    public function delete($id)
    {
        $account = Account::find($id);

        if (!$account) {
            return redirect()->back()->with('error', 'Account not found.');
        }

        // Check if there are any related notes associated with the account
        $relatedNotesExist = $account->taskDetails()->exists();

        // If related notes exist, delete them first
        if ($relatedNotesExist) {
            $account->taskDetails()->delete();
        }

        // Then delete the account
        $account->delete();

        return redirect()->back()->with('success', 'Account and associated tasks deleted successfully.');
    }

    public function getAssociatedTasks($task_id)
    {
        $account = Account::find($id);

        if (!$account) {
            return response()->json(['error' => 'Account not found.'], 404);
        }

        $tasks = $account->taskDetails;

        return response()->json(['tasks' => $tasks]);
    }

    
    public function store(Request $request){
        $data = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        
        
        $newAccount = Account::create($data);

        return redirect(route('login.index'));
    }
}
