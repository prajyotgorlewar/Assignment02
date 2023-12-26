<x-admin-layout>
    <x-slot name="header">
        {{ __('Admin > Edit Category')}}
    </x-slot>

    <form method="POST" action="{{ route('admin-categories-edit', $category->id) }}" class="p-3">
        @csrf
        @method('PATCH')

        <!-- Name -->
        <div class="p-2">
            <label for="name">{{ __('Name') }}</label>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$category->name" required autofocus autocomplete="name" />
        </div>

        <x-form-errors />

        <div class="block">
            <x-primary-button type="submit">Update</x-primary-button>
        </div>
    </form>

    <!-- Delete Form -->
    <form method="POST" action="{{ route('admin-categories-destroy', $category->id) }}" onsubmit="return confirm('Are you sure you want to delete this category?')">
        @csrf
        @method('DELETE')
        <div class="block p-2">
            <button type="submit" class="text-red-500">Delete Category</button>
        </div>
    </form>
</x-admin-layout>

