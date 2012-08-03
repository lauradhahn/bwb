<?php 
/* New post flag */
if (strtotime($post->post_date) > strtotime('-1 days')): ?>
  <span class="new-post-flag">New!</span>
<?php endif; ?>