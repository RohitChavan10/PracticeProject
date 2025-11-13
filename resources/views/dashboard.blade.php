<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-gray-200">
                {{ config('app.name', 'Laravel') }}
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="#" class="block py-2 px-3 rounded-lg hover:bg-gray-100 font-medium">🏠 Dashboard</a>
                <a href="#" class="block py-2 px-3 rounded-lg hover:bg-gray-100 font-medium">📄 Reports</a>
                <a href="#" class="block py-2 px-3 rounded-lg hover:bg-gray-100 font-medium">👥 Users</a>
                <a href="#" class="block py-2 px-3 rounded-lg hover:bg-gray-100 font-medium">⚙️ Settings</a>
            </nav>
            <div class="p-4 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left py-2 px-3 rounded-lg bg-red-500 hover:bg-red-600 text-white font-semibold">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Top bar -->
            <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Hello, {{ Auth::user()->name ?? 'Guest' }} 👋</span>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}" 
                         class="w-8 h-8 rounded-full" alt="User Avatar">
                </div>
            </header>

            <!-- Content -->
            <main class="p-6 flex-1 overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Example stat cards -->
                    <div class="bg-white p-6 rounded-2xl shadow">
                        <h2 class="text-gray-500 text-sm">Users</h2>
                        <p class="text-3xl font-bold mt-2">1,240</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow">
                        <h2 class="text-gray-500 text-sm">Revenue</h2>
                        <p class="text-3xl font-bold mt-2">$8,540</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow">
                        <h2 class="text-gray-500 text-sm">Orders</h2>
                        <p class="text-3xl font-bold mt-2">320</p>
                    </div>
                </div>

                <!-- Example table -->
                <div class="mt-8 bg-white rounded-2xl shadow overflow-hidden">
                    <table class="min-w-full text-left text-sm">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 font-semibold text-gray-700">#</th>
                                <th class="px-6 py-3 font-semibold text-gray-700">Name</th>
                                <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                                <th class="px-6 py-3 font-semibold text-gray-700">Role</th>
                                <th class="px-6 py-3 font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users ?? [] as $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3">{{ $user->name }}</td>
                                    <td class="px-6 py-3">{{ $user->email }}</td>
                                    <td class="px-6 py-3">{{ ucfirst($user->role ?? 'user') }}</td>
                                    <td class="px-6 py-3">
                                        <a href="#" class="text-blue-500 hover:underline">Edit</a> |
                                        <a href="#" class="text-red-500 hover:underline">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (empty($users))
                        <div class="p-6 text-center text-gray-500">No data available</div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</body>
</html>
