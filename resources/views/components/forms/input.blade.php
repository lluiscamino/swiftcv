<div>
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="{{ $id }}">
        {{ $label }}
    </label>
    <input
            class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            wire:model.blur="form.{{ $id }}"
            type="{{ $type }}"
            placeholder="{{ $placeholder ?? '' }}"
            autoComplete="off"
    />
    @error("form.$id") <p class="input-error-msg text-red-500 text-xs italic">{{ $message }}</p> @enderror
</div>
