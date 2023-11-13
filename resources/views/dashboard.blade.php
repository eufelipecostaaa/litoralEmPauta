<!-- resources/views/profile/index.blade.php -->

<x-app-layout>
    <!-- Adicione aqui o conteúdo da página de perfil -->
    <div>
        <h2 class="text-2xl font-semibold">Boas vindas, {{ Auth::user()->name }}</h2>
        <p class="text-gray-600">{{ Auth::user()->email }}</p>
        <p class="text-gray-600">{{ Auth::user()->name }}</p>
        <!-- Adicione mais informações conforme necessário -->
    </div>
</x-app-layout>
