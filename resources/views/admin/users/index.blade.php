<x-admin-layout>
    <x-slot name="header">
        {{ __('Admin > All Users')}}
    </x-slot>
    <div class="flex flex-col">
        @if(Session::has('admin_flash'))
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>{{ Session('admin_flash') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                    <x-admin-table-header scope="col" >#</x-admin-table-header>
                    <x-admin-table-header scope="col" >Name</x-admin-table-header>
                    <x-admin-table-header scope="col" >Email</x-admin-table-header>
                    <x-admin-table-header scope="col" >Role</x-admin-table-header>
                    <x-admin-table-header scope="col" >Active</x-admin-table-header>
                    <x-admin-table-header scope="col" >Created At</x-admin-table-header>
                    <x-admin-table-header scope="col" >Updated At</x-admin-table-header>
                    </tr>
                </thead>
                <tbody>
                    @if($users)
                        @foreach ($users as $user)
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $user->id }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->role->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->active == 1 ? 'Yes' : 'No'}}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->updated_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</x-admin-layout>
