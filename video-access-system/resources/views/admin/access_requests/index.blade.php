<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Access Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg overflow-hidden">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Video</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Access Time</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($requests as $request)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $request->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $request->video->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $request->status === 'approved' ? 'bg-green-100 text-green-800' : ($request->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ ucfirst($request->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if($request->status === 'approved')
                                                {{ $request->access_start_time->format('d M H:i') }} - {{ $request->access_end_time->format('H:i') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @if($request->status === 'pending')
                                                <form action="{{ route('admin.access-requests.update', $request) }}" method="POST" class="inline-flex items-center">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="approved">
                                                    <input type="number" name="duration" placeholder="Hrs" class="w-16 text-sm border-gray-300 rounded-md shadow-sm mr-2 focus:ring-indigo-500 focus:border-indigo-500" required min="1">
                                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-xs transition duration-150 ease-in-out">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.access-requests.update', $request) }}" method="POST" class="inline ml-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs transition duration-150 ease-in-out" onclick="return confirm('Reject this request?')">Reject</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
