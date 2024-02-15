<x-app-layout>
    @foreach($streams as $stream)
            <li>{{ $stream['title'] }} - {{ $stream['user_name'] }}</li>
        @endforeach
<!-- Add a placeholder for the Twitch embed -->
<center><div id="twitch-embed">LIVE STEAMMING</div></center>

<!-- Load the Twitch embed script -->
<script src="https://player.twitch.tv/js/embed/v1.js"></script>

<!-- Create a Twitch.Player object. This will render within the placeholder div -->
<script type="text/javascript">
  new Twitch.Player("twitch-embed", {
    channel: "peetchie",
    width: 1280,
    height: 720
  });
</script>
</x-app-layout>