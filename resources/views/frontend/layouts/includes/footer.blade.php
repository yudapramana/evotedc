<style>
    footer {
        clear: both;
        position: relative;
        height: 200px;
        margin-top: -200px;
    }
</style>

<footer class="py-10 center" style="background:brown; justify-content:center">

    {{-- <ul class="list-reset lg:flex justify-center flex-1 items-center font-light pb-5">
        <li class="mt-2 sm:mt-2 md:mt-2 lg:mt-0 xl:mt-0">
            <a href="@if (request()->segment(1) == 'vote') {{ route('home') }} @else  {{ route('home.vote') }} @endif"
                class="link-button {{ url()->current() == route('home.vote') || url()->current() == route('home.vote.detail') ? 'active' : '' }}">
                @if (request()->segment(1) == 'vote')
                Home
                @else
                Vote
                @endif
            </a>
        </li>
    </ul> --}}

    <p class="text-white text-sm text-center">© 2023 DukungCalonmu.com</p>
    <p class="text-white text-xs text-center">Server time: {{ date('Y-m-d H:i:s') }}</p>
    {{-- <p class="text-white text-xs text-center">Vote Start: {{ $schedule->start_time }}</p>
    <p class="text-white text-xs text-center">Vote End: {{ $schedule->end_time }}</p> --}}
</footer>