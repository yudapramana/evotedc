<footer class="py-10">
    <p class="text-gray-secondary text-sm text-center">© 2022 DukungCalonmu.com</p>
    <p class="text-gray-secondary text-xs text-center">Server time: {{ date('Y-m-d H:i:s') }}</p>
    <p class="text-gray-secondary text-xs text-center">Vote Start: {{ $schedule->start_time }}</p>
    <p class="text-gray-secondary text-xs text-center">Vote End: {{ $schedule->end_time }}</p>
</footer>
