<div wire:poll.5s> <!-- Polling setiap 5 detik -->
    <h1 class="text-2xl font-bold mb-4">Data User dari API</h1>

    @if (count($data) > 0)
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $item['id'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $item['name'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $item['email'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $item['role'] ?? 'Tidak ada role' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data ditemukan.</p>
    @endif
</div>
