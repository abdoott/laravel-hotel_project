<button style="background-color: #ff4a4a; color: #fff; padding: 12px; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-size: 16px; transition: background-color 0.3s; " {{ $attributes->merge(['type' => 'submit', ]) }}>
    {{ $slot }}
</button>
