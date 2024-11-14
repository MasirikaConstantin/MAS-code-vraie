<x-mail::message>
<div style="background-color: #ffffff; color: #333333; padding: 2rem; margin: -2rem;">

{{-- Greeting --}}
@if (! empty($greeting))
<h1 style="font-size: 1.8rem; color: #333333; margin-bottom: 1.5rem;">
    {{ $greeting }}
</h1>
@else
@if ($level === 'error')
<h1 style="font-size: 1.8rem; color: #dc3545; margin-bottom: 1.5rem;">
    @lang('Whoops!')
</h1>
@else
<h1 style="font-size: 1.8rem; color: #333333; margin-bottom: 1.5rem;">
    @lang('Hello!')
</h1>
@endif
@endif

{{-- Intro Lines --}}
<div style="margin-bottom: 2rem;">
    @foreach ($introLines as $line)
    <p style="color: #555555; line-height: 1.6; margin-bottom: 1rem;">
        {{ $line }}
    </p>
    @endforeach
</div>

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success' => '#28a745',
        'error' => '#dc3545',
        default => '#007bff',
    };
?>
<div style="text-align: center; margin: 2rem 0;">
    <a href="{{ $actionUrl }}" 
       style="background-color: {{ $color }}; 
              color: white;
              text-decoration: none;
              padding: 0.8rem 1.5rem;
              border-radius: 4px;
              font-weight: bold;">
        {{ $actionText }}
    </a>
</div>
@endisset

{{-- Outro Lines --}}
<div style="margin-bottom: 2rem;">
    @foreach ($outroLines as $line)
    <p style="color: #555555; line-height: 1.6; margin-bottom: 1rem;">
        {{ $line }}
    </p>
    @endforeach
</div>

{{-- Salutation --}}
<div style="border-top: 1px solid #e5e5e5; padding-top: 1.5rem; margin-top: 2rem;">
    @if (! empty($salutation))
    <p style="color: #666666;">{{ $salutation }}</p>
    @else
    <p style="color: #666666;">
        @lang('Regards'),<br>
        <strong>{{ config('app.name') }}</strong>
    </p>
    @endif
</div>

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
<div style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #e5e5e5; font-size: 0.875rem; color: #666666;">
    @lang(
        "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
        'into your web browser:',
        [
            'actionText' => $actionText,
        ]
    )
    <div style="margin-top: 0.5rem;">
        <a href="{{ $actionUrl }}" style="color: #007bff; word-break: break-all;">{{ $displayableActionUrl }}</a>
    </div>
</div>
</x-slot:subcopy>
@endisset

</div>
</x-mail::message>