<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('build/assets/css/chat.css') }}">
    <title>Chat</title>
</head>
<body>
    <section class="msger">
        <header class="msger-header">
          <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i>
            <span class="chatWith"></span>
            <span class="typing" style="display: none">Esta escribiendo...</span>
          </div>
          <div class="msger-header-options">
            <span class="chatStatus offline"><i class="fas fa-globe"></i></span>
          </div>
        </header>
      
        <div class="msger-chat"></div>

        <a href="{{ route('dashboard') }}">
          <button id="button">Volver</button>
        </a>

        <form class="msger-inputarea">
          <input type="text" class="msger-input" placeholder="Escribe tu mensaje...">
          <button type="submit" id="button">Enviar</button>
        </form>
      </section>
      <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
     
</body>
</html>




