<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Orden #{{ $orden->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Orden #{{ $orden->id }}</h1>

    <p><strong>Cliente:</strong> {{ $orden->cliente->nombre }}</p>
    <p><strong>Equipo:</strong> {{ $orden->equipo->marca }} - {{ $orden->equipo->modelo }}</p>
    <p><strong>Descripción:</strong> {{ $orden->descripcion }}</p>
    <p><strong>Estado:</strong> {{ $orden->estado }}</p>
    <p><strong>Fecha de creación:</strong> {{ $orden->created_at->format('d/m/Y') }}</p>
</body>
</html>
