<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teste;
use Illuminate\Support\Facades\Auth;


class TesteController extends Controller
{
    public function index()
    {  
        $testes = Teste::all();

        return view('teste', compact('testes'));
    }

    public function store( Request $request )
    {
        $data = $request->all();

        if ($data['name'] == '' || $data['email'] == '') {
            return redirect()->route('teste.index');
        }

        $teste = Teste::Create($data);

        if ($teste) {
            return redirect()->route('teste.index');
        }
    }

    public function show($id)
    {
        $teste = Teste::find($id);
        return view('testeShow', compact('teste'));
    }

    public function update(Request $request)
    {
        if ($request->id == '') {
            return redirect()->route('teste.index');
        }
        $id = $request->id;
            // traz um array de dados com o ->all()
        $data = $request->all();
        $teste = Teste::find($id);

        // da para fazer assim
        /* $update = $teste->update($data); */

        if (!$teste) {
            return redirect()->route('teste.index');
        }

        $teste['name'] = $data['name'];
        $teste['email'] = $data['email'];
        
        $teste->save();

        return redirect()->route('teste.index');
    }

    public function destroy($id)
    {
        $teste = Teste::find($id);
        // assim tmb funciona  --  $destroy = $teste-:>destroy($id);
        $teste->delete();
        return redirect()->route('teste.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
