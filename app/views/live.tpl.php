<section id="live">
  <!-- Add a placeholder for the Twitch embed -->
  <h2>Live de la chaîne Benjx-Motors</h2>
  <div id="twitch-embed"></div>
  <div class="live-media">
    <!-- Load the Twitch embed script -->
    <script src="https://player.twitch.tv/js/embed/v1.js"></script>

    <!-- Create a Twitch.Player object. This will render within the placeholder div -->
    <script type="text/javascript">
      new Twitch.Player("twitch-embed", {
        channel: "benjxmotors"
      });
    </script>

    <!-- <script type="text/javascript">
      var parentUrl = encodeURIComponent('http://localhost:8080');
      var iframeSrc = 'https://player.twitch.tv/?channel=benjxmotors&parent=' + parentUrl;

      var iframe = document.createElement('iframe');
      iframe.src = iframeSrc;
      iframe.frameborder = '0';
      iframe.allowfullscreen = 'true';
      iframe.scrolling = 'no';
      iframe.height = '378';
      iframe.width = '620';

      document.getElementById('live').appendChild(iframe);
    </script> -->

    <!-- <iframe src="https://player.twitch.tv/?channel=benjxmotors&parent=http%3A%2F%2Flocalhost%3A8080" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620"></iframe> -->

  </div>

</section>