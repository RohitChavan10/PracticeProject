<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Management</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-blue-900 text-white">

    <div class="max-w-5xl mx-auto mt-10 bg-blue-600 rounded-xl shadow p-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Send Us a Message</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Record Form -->
        <form action="{{ route('records.store') }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-2 gap-4 mb-8">
            @csrf

            <input type="text" name="FullName" placeholder="Full Name" required class="border p-2 rounded">
            <input type="text" name="BusinessName" placeholder="Business Name" class="border p-2 rounded">
            <input type="email" name="Email" placeholder="Email" required class="border p-2 rounded">
            <input type="text" name="PhoneNumber" placeholder="Phone Number" class="border p-2 rounded">
            <input type="file" name="File" class="border p-2 rounded col-span-2">
            <textarea name="message" placeholder="Message" class="border p-2 rounded col-span-2"></textarea>

            <div class="col-span-2 flex justify-center">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-semibold">
                    Submit
                </button>
            </div>
        </form>

        <!-- Records Table -->
        <table class="min-w-full border">
            <thead class="bg-blue-600">
                <tr>
                    <th class="p-3 border">ID</th>
                    <th class="p-3 border">Full Name</th>
                    <th class="p-3 border">Business Name</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Phone</th>
                    <th class="p-3 border">Message</th>
                    <th class="p-3 border text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($records as $record)
                    <tr class="hover:bg-gray-50">
                        <td class="border p-2 text-center">{{ $record->id }}</td>
                        <td class="border p-2">{{ $record->FullName }}</td>
                        <td class="border p-2">{{ $record->BusinessName }}</td>
                        <td class="border p-2">{{ $record->Email }}</td>
                        <td class="border p-2">{{ $record->PhoneNumber }}</td>
                        <td class="border p-2">{{ $record->message }}</td>
                        <td class="border p-2 text-center">
                            <form action="{{ route('records.destroy', $record->id) }}" method="POST"
                                onsubmit="return confirm('Delete this record?')">
                                @csrf
                                @method('DELETE')
                                <!-- Edit button -->
                                <button type="button"
                                    onclick="openEditModal({{ $record->id }}, '{{ $record->FullName }}', '{{ $record->BusinessName }}', '{{ $record->Email }}', '{{ $record->PhoneNumber }}', '{{ $record->message }}')"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center p-4 text-gray-500">No records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-blue bg-opacity-50 hidden justify-center items-center">
    <div class="bg-blue rounded-xl p-6 w-full max-w-md relative">
        <h2 class="text-2xl font-bold mb-4">Edit Record</h2>
        
        <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-3">
            @csrf
            @method('PUT')

            <input type="hidden" id="editId">

            <div>
                <label class="block text-sm font-semibold mb-1">Full Name</label>
                <input type="text" id="editFullName" name="FullName" class="border p-2 w-full rounded">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Business Name</label>
                <input type="text" id="editBusinessName" name="BusinessName" class="border p-2 w-full rounded">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" id="editEmail" name="Email" class="border p-2 w-full rounded">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Phone Number</label>
                <input type="text" id="editPhoneNumber" name="PhoneNumber" class="border p-2 w-full rounded">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Message</label>
                <textarea id="editMessage" name="message" class="border p-2 w-full rounded"></textarea>
            </div>

            <div class="flex justify-end space-x-3 mt-4">
                <button type="button" onclick="closeEditModal()" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>
    </div>
<script>
    function openEditModal(id, fullName, businessName, email, phone, message) {
        document.getElementById('editId').value = id;
        document.getElementById('editFullName').value = fullName;
        document.getElementById('editBusinessName').value = businessName;
        document.getElementById('editEmail').value = email;
        document.getElementById('editPhoneNumber').value = phone;
        document.getElementById('editMessage').value = message;

        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }

    document.getElementById('editForm').addEventListener('submit', async function (event) {
        event.preventDefault();

        const id = document.getElementById('editId').value;
        const formData = new FormData(this);

        const response = await fetch(`/records/${id}`, {
            method: 'POST', // Laravel form spoofing (PUT)
            headers: {
                'X-CSRF-TOKEN': formData.get('_token')
            },
            body: formData
        });

        if (response.ok) {
            alert('Record updated successfully!');
            location.reload();
        } else {
            alert('Error updating record.');
        }
    });
</script>

</body>

</html>
