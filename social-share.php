<ul class="social-share-button">
  <li>
    <a class="share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>"
      onclick="window.open(this.href, 'facebook-share','width=580,height=296'); return false;" target="_blank">
      <svg id="facebook" data-name="facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.61 59.03">
        <title>facebook</title>
        <path
          d="M47.2,12.76H41.63c-4.36,0-5.18,2.09-5.18,5.11v6.71h10.4l-1.38,10.5h-9V62H25.59V35.07h-9V24.57h9V16.84c0-9,5.5-13.87,13.52-13.87a69.4,69.4,0,0,1,8.09.43Z"
          transform="translate(-16.59 -2.97)" />
      </svg>
    </a>
  </li>
  <li>
    <a class="share-twitter"
      href="https://twitter.com/intent/tweet?text=<?php echo $share_title; ?>&amp;url=<?php echo $share_url; ?>&amp;via=WPCrumbs"
      target="_blank">
      <svg id="twitter" data-name="twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58.1 47.2">
        <title>twitter</title>
        <path
          d="M54.86,20.19v1.55c0,15.74-12,33.88-33.88,33.88A33.64,33.64,0,0,1,2.74,50.27a24.55,24.55,0,0,0,2.88.15A23.84,23.84,0,0,0,20.4,45.33,11.93,11.93,0,0,1,9.27,37.07a15,15,0,0,0,2.25.18,12.58,12.58,0,0,0,3.13-.41A11.91,11.91,0,0,1,5.1,25.17V25a12,12,0,0,0,5.38,1.51A11.92,11.92,0,0,1,6.8,10.61,33.84,33.84,0,0,0,31.35,23.06a13.44,13.44,0,0,1-.29-2.73,11.92,11.92,0,0,1,20.61-8.15,23.43,23.43,0,0,0,7.56-2.87A11.87,11.87,0,0,1,54,15.88,23.87,23.87,0,0,0,60.84,14,25.59,25.59,0,0,1,54.86,20.19Z"
          transform="translate(-2.74 -8.42)" />
      </svg>
    </a>
  </li>
  <li>
    <a class="share-telegram" href="https://telegram.me/share/url?url=<?php echo $share_url; ?>/&text=
      <?php echo $share_title ?>"
      onclick="window.open(this.href, 'telegram-share','width=580,height=396'); return false;" target="_blank">
      <svg id="telegram" data-name="telegram" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <title>telegram</title>
        <path
          d="m9.417 15.181-.397 5.584c.568 0 .814-.244 1.109-.537l2.663-2.545 5.518 4.041c1.012.564 1.725.267 1.998-.931l3.622-16.972.001-.001c.321-1.496-.541-2.081-1.527-1.714l-21.29 8.151c-1.453.564-1.431 1.374-.247 1.741l5.443 1.693 12.643-7.911c.595-.394 1.136-.176.691.218z" />
      </svg>
    </a>
  </li>
  <li>
    <a class="share-pinterest"
      href="http://pinterest.com/pin/create/button/?url=<?php echo $share_url; ?>&amp;media=<?php echo $media;   ?>&amp;description=<?php echo $share_title; ?>"
      target="_blank">
      <svg id="pinterest" data-name="pinterest" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.48 61.48">
        <title>pinterest</title>
        <path
          d="M31.78,63a30.1,30.1,0,0,1-8.73-1.28,25.52,25.52,0,0,0,3.12-6.56s.36-1.36,2.16-8.45c1,2,4.16,3.84,7.48,3.84,9.89,0,16.61-9,16.61-21.09,0-9.09-7.72-17.61-19.49-17.61C18.37,11.83,11,22.32,11,31c0,5.28,2,10,6.28,11.77a1.06,1.06,0,0,0,1.52-.8c.16-.52.48-1.88.64-2.44A1.51,1.51,0,0,0,19,37.85a8.93,8.93,0,0,1-2-6C17,24,22.77,17.07,32.1,17.07c8.24,0,12.81,5,12.81,11.81,0,8.85-3.92,16.33-9.77,16.33a4.76,4.76,0,0,1-4.84-5.92C31.22,35.41,33,31.2,33,28.4c0-2.52-1.36-4.64-4.16-4.64-3.28,0-5.92,3.4-5.92,8a12.81,12.81,0,0,0,1,4.88c-3.36,14.25-4,16.73-4,16.73a26.94,26.94,0,0,0-.52,7.08A30.77,30.77,0,1,1,31.78,63Z"
          transform="translate(-1.04 -1.5)" />
      </svg>
    </a>
  </li>
</ul>