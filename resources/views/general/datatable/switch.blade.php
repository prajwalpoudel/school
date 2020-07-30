<span class="m-switch m-switch--outline m-switch--success">
    <label>
        <input type="checkbox" {{ $checked ? 'checked' : null }} name="{{ $name ?? null }}" {{ $disabled ? 'disabled' : null }}>
        <span></span>
    </label>
</span>
