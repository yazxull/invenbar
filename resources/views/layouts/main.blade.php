<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $titlePage ? $titlePage . ' - ' : '' }}{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('bootstrap/font/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-vh-100 modern-body">
        @include('layouts.navigation')

        @if ($titlePage)
        <header class="modern-header">
            <div class="container py-4">
                <h2 class="modern-title mb-0">
                    {{ $titlePage }}
                </h2>
            </div>
        </header>
        @endif

        <main class="container">
            <div class="my-5">
                {{ $slot }}
            </div>
        </main>
    </div>

    <x-modal-delete />

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        const deleteModal = document.getElementById('deleteModal')

        deleteModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const url = button.getAttribute('data-url')
            const deleteForm = deleteModal.querySelector('form')
            deleteForm.setAttribute('action', url)
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Modern Body Styling */
        .modern-body {
            background-color: #f8f9fa;
        }

        /* Modern Header */
        .modern-header {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .modern-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3748;
            letter-spacing: -0.02em;
        }

        /* Smooth Transitions */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</body>

</html>