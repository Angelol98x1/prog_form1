<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
    <link rel="stylesheet" href="{{ asset('css/listar.css') }}">
</head>
<body>
    <h1>Lista de Contactos Recibidos</h1>
    
    <div class="nav-buttons">
        <a href="{{ route('contacto.index') }}">← Volver al Formulario</a>
    </div>

    @if($contactos->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactos as $contacto)
                    <tr>
                        <td>{{ $contacto->id }}</td>
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->email }}</td>
                        <td class="mensaje">{{ $contacto->mensaje }}</td>
                        <td class="fecha">{{ $contacto->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            <p>No hay contactos registrados todavía.</p>
        </div>
    @endif
</body>
</html>