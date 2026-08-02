<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .modal {
            position: fixed;
            inset: 0;
            display: none;
            justify-content: center;
            align-items: center;
            background: rgba(0,0,0,.5);
            z-index: 9999;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 0 20px rgba(0,0,0,.3);
        }
    </style>
</head>
<body>
    <h1>Teste</h1>

    <form action=" {{ route('teste.store') }} " method="post">
        @csrf
        <input type="text" name="name" placeholder="Digite seu nome">
        <input type=email name="email" placeholder="Digite seu email" >
        <button type="submit">Enviar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $testes as $teste )
                <tr>
                    <td> {{ $teste->id ?? "Sem id" }} </td>
                    <td> {{ $teste->name ?? "Sem nome" }} </td>
                    <td> {{ $teste->email ?? "Sem email" }} </td>
                    <td>
                        <a href=" {{ route('teste.show', $teste->id) }} " target="_blank" >Editar</a>
                        <a href="#" onclick="confirmDelete()" target="_self">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div id="delete" class="modal"
    >
        <div class="modal-content">
            <h2>Tem certeza que quer excluir?</h2>

            <form action=" {{ route('teste.destroy', $teste->id) }} " method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Sim</button>
            </form>

            <button onclick="fecharModal()">Não</button>
        </div>
    </div>

    <script>
        function confirmDelete() {
            document.getElementById("delete").classList.add("show");
        }

        function fecharModal() {
            document.getElementById("delete").classList.remove("show");
        }
    </script>

</body>
</html>