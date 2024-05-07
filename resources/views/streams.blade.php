<x-app-layout>
    <div class="grid grid-cols-2 grid-flow-row p-2">
        @foreach ($streamsData as $username => $streams)
            <div class="cols bg-[#f0f0f0] rounded p-2 m-2">
                @if (count($streams) > 0)
                    @foreach ($streams as $index => $stream)
                        <center>
                            <div id="twitch-embed{{ $loop->parent->index * $loop->count + $loop->iteration }}">OBSERVER
                                {{ $loop->parent->index * $loop->count + $loop->iteration }}</div>
                        </center>
                        
                        <script src="https://player.twitch.tv/js/embed/v1.js"></script>
                        <script type="text/javascript">
                            new Twitch.Player("twitch-embed{{ $loop->parent->index * $loop->count + $loop->iteration }}", {
                                channel: "{{ $stream['user_name'] }}",
                                width: 720,
                                height: 480
                            });
                        </script>
                    @endforeach
                @else
                    <center>
                        <h2 class="text-md font-semibold">ยังไม่มีการถ่ายทอดสด</h2>
                    </center>
                @endif
            </div>
            @if (($loop->index + 1) % 2 == 0)
    </div>
    <div class="grid grid-cols-2 grid-flow-row p-2">
        @endif
        @endforeach
    </div>
</x-app-layout>
