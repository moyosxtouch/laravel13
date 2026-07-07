@props(["type" =>"success", "message" =>""])

@php
$colors=[
    "success" => "border border-green-400 bg-green-100 text-green-700",
    "error" => "border border-red-400 bg-red-100 text-red-700",
];
$class = $colors[$type] ?? $colors["success"];
@endphp

@if ($message)
<p class="my-10 text-center  py-3 text-sm {{ $class }}">
    {{ $message }}
</p>
@endif
