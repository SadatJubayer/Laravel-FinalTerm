<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    function index()
    {

        $users = $this->getStudentList();
        return view('home.index')->with('users', $users);
    }

    function edit($id)
    {

        $users = $this->getStudentList();

        //find one student by ID from array

        $user = ['id' => '2', 'name' => 'abc', 'email' => 'abc@aiub.com', 'password' => '456'];
        return view('home.edit')->with('user', $user);
    }

    function update($id, Request $request)
    {

        $newUser = ['id' => $id, 'name' => $request->name, 'email' => $request->email, 'password' => $request->password];

        $users = $this->getStudentList();

        foreach ($users as $key => $value) {
            if ($value['id'] === $id) {
                $users[$key] = $newUser;
            }
        }

        return view('home.index')->with('users', $users);
    }

    function delete($id)
    {

        $users = $this->getStudentList();
        //show comfirm view

        return view('home.delete')->with('users', $users);
    }

    function destroy($id, Request $request)
    {


        $users = $this->getStudentList();
        //find student by id & delete
        //updated list
        
        foreach ($users as $key => $value) {
            if ($value['id'] === $id) {
                unset($users[$key]);
            }
        }
        // var_dump($users);

        return view('home.index')->with('users', $users);
    }


    function getStudentList()
    {
        return  [
            ['id' => '1', 'name' => 'alamin', 'email' => 'abc@gmail.com', 'password' => '123'],
            ['id' => '2', 'name' => 'abc', 'email' => 'abc@aiub.com', 'password' => '456'],
            ['id' => '3', 'name' => 'xyz', 'email' => 'xyz@gmail.com', 'password' => '789']
        ];
    }
}
