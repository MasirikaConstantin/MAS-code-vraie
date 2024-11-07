<x-mail::message>
<div style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); color: #fff; border-radius: 15px; padding: 2rem; margin: -2rem;">

{{-- Greeting --}}
@if (! empty($greeting))
<h1 style="font-size: 2.5rem; background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem;">
    {{ $greeting }}
</h1>
@else
@if ($level === 'error')
<h1 style="font-size: 2.5rem; background: linear-gradient(to right, #ff416c 0%, #ff4b2b 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem;">
    @lang('Whoops!')
</h1>
@else
<h1 style="font-size: 2.5rem; background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem;">
    @lang('Hello!')
</h1>
@endif
@endif

{{-- Intro Lines --}}
<div style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border-radius: 10px; padding: 1.5rem; margin-bottom: 2rem;">
    @foreach ($introLines as $line)
    <p style="color: #e2e8f0; line-height: 1.6; margin-bottom: 1rem;">
        {{ $line }}
    </p>
    @endforeach
</div>

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success' => 'background: linear-gradient(to right, #00b09b, #96c93d)',
        'error' => 'background: linear-gradient(to right, #ff416c, #ff4b2b)',
        default => 'background: linear-gradient(to right, #4facfe, #00f2fe)',
    };
?>
<div style="text-align: center; margin: 2rem 0;">
    <a href="{{ $actionUrl }}" 
       style="{{ $color }}; 
              color: white;
              text-decoration: none;
              padding: 1rem 2rem;
              border-radius: 50px;
              font-weight: bold;
              text-transform: uppercase;
              letter-spacing: 1px;
              box-shadow: 0 4px 15px rgba(0,0,0,0.2);
              transition: all 0.3s ease;">
        {{ $actionText }}
    </a>
</div>
@endisset

{{-- Outro Lines --}}
<div style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border-radius: 10px; padding: 1.5rem; margin-bottom: 2rem;">
    @foreach ($outroLines as $line)
    <p style="color: #e2e8f0; line-height: 1.6; margin-bottom: 1rem;">
        {{ $line }}
    </p>
    @endforeach
</div>

{{-- Salutation --}}
<div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem; margin-top: 2rem;">
    @if (! empty($salutation))
    <p style="color: #a0aec0;">{{ $salutation }}</p>
    @else
    <p style="color: #a0aec0;">
        @lang('Regards'),<br>
        <span style="background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;">
            {{ config('app.name') }}
        </span>
    </p>
    @endif
</div>

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
<div style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid rgba(255,255,255,0.1); font-size: 0.875rem; color: #718096;">
    @lang(
        "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
        'into your web browser:',
        [
            'actionText' => $actionText,
        ]
    )
    <div style="margin-top: 0.5rem;">
        <a href="{{ $actionUrl }}" style="color: #4facfe; word-break: break-all;">{{ $displayableActionUrl }}</a>
    </div>
</div>
</x-slot:subcopy>
@endisset

</div>
</x-mail::message>