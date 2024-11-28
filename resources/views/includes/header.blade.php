<header class="bg-blue-600 text-white py-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">ElleConnect</a>
        <nav class="hidden md:flex space-x-6">
            <a href="/home" class="hover:text-gray-200">Home</a>
            <a href="/about" class="hover:text-gray-200">About</a>
            <a href="{{ route('dashboard') }}" class="hover:text-gray-200">Dashboard</a>
            <a href="{{ route('profile.edit') }}" class="hover:text-gray-200">Profile</a>
        </nav>
    </div>
</header>

