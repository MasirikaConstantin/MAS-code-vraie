<div class="messenger-icon-container ">
<div class="messenger-icon flex flex-col items-center cursor-pointer bg-red-900">
    <a href="{{ route('login') }}">
        <svg class="w-[27px] h-[27px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.7" d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z"/>
        </svg> 
    
        @if(!$isAuthenticated) 
            <p class="text-xs text-red-500 dark:text-red-400 mt-1 font-bold">Login</p>
        @endif
    
    </a>
    
</div>
</div>
