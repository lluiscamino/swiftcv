<div class="mr-6 mt-4">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="{{ $id }}">
        {{ $label }}
    </label>
    <textarea
            class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            rows="3"
            wire:model="form.{{ $id }}"
            type="{{ $type }}"
            placeholder="{{ $placeholder ?? '' }}"
            autoComplete="off"
    >
    </textarea>
    @error("form.$id") <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
</div>