
<form action=" {{ route('teste.update') }} " method="post">
    @csrf
    <input type="hidden" name="id" value=" {{ $teste->id }} ">
    <input value=" {{ $teste->name ?? 'Sem nome' }} " type="text" name="name" placeholder="Digite seu nome">
    <input value=" {{ $teste->email ?? 'Sem email' }} " type=email name="email" placeholder="Digite seu email" >
    <button type="submit">Enviar</button>
</form>