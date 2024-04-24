<x-app-layout>
    <div class="grid grid-cols-2 grid-flow-row p-2">
        @foreach ($yt_streams as $index => $stream)
            <div class="cols bg-[#f0f0f0] rounded p-2 m-2">
                <center>
                    <h1>Observer {{$index+1}}</h1>
                    <div id="player-{{ $index }}"></div>
                </center>
                <script>
                    var apiKey = '{{ $stream->api_key }}';
                    var channelId = '{{ $stream->channel_id }}';

                    function fetchLiveStream{{ $index }}() {
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET',
                                `https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=${channelId}&eventType=live&type=video&key=${apiKey}`,
                            true);
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                var data = JSON.parse(xhr.responseText);
                                if (data.items.length > 0) {
                                    var videoId = data.items[0].id.videoId;
                                    loadPlayer{{ $index }}(videoId);
                                    console.log('Live stream found:', videoId);
                                } else {
                                    console.log('No active live stream found.');
                                }
                            } else {
                                console.error('Error fetching live stream data:', xhr.status);
                            }
                        };
                        xhr.onerror = function() {
                            console.error('Error fetching live stream data:', xhr.status);
                        };
                        xhr.send();
                    }

                    function loadPlayer{{ $index }}(videoId) {
                        var tag = document.createElement('script');
                        tag.src = 'https://www.youtube.com/iframe_api';
                        var firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                        var player;
                        window.onYouTubeIframeAPIReady = function() {
                            player = new YT.Player(`player-{{ $index }}`, {
                                height: '390',
                                width: '640',
                                videoId: videoId,
                                playerVars: {
                                    'autoplay': 1,
                                    'modestbranding': 1
                                },
                                events: {
                                    'onReady': onPlayerReady,
                                    'onStateChange': onPlayerStateChange
                                }
                            });
                        };
                    }

                    function onPlayerReady(event) {
                        event.target.playVideo();
                    }

                    function onPlayerStateChange(event) {
                        // Add any additional logic here if needed
                    }

                    fetchLiveStream{{ $index }}();
                </script>
            </div>
            @if (($index + 1) % 2 == 0)
    </div>
    <div class="grid grid-cols-2 grid-flow-row p-2">
        @endif
        @endforeach
    </div>
</x-app-layout>
