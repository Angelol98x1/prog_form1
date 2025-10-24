    <!DOCTYPE html>
    <html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Contacto</title>
        <!-- Enlace al archivo CSS externo -->
        <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
    </head>
    <body>
        <h1>Formulario de Contacto</h1>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contacto.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
                @error('nombre')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="5">{{ old('mensaje') }}</textarea>
                @error('mensaje')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Enviar</button>
        </form>
        
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="{{ route('contacto.listar') }}" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block;">
                Ver Contactos Enviados
            </a>
        </div>
    </body>
    </html>