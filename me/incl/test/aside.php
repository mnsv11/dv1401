<nav class="vmenu">

  <ul <?php if(isset($p)) echo "id='".strip_tags($p)."'"; ?>>
  
    <li><h4>Kmom03</h4>
      <ul id="menu">
        <li id="get"><a href="?p=kmom03_get">Visa <code>$_GET</code></a>
        <li id="getform"><a href="?p=kmom03_getform">Form med get</a>
        <li id="postform"><a href="?p=kmom03_postform">Form med post</a>
        <li id="server"><a href="?p=kmom03_server">Form med server</a>
        <li id="sessiondestroy"><a href="?p=kmom03_sessiondestroy">Session destroy</a>
        <li id="change"><a href="?p=kmom03_sessionchange">Session change</a>
        <li id="view"><a href="?p=kmom03_viewsession">Session view</a>
        <li id="validate"><a href="?p=kmom03_validate">Validera inkommande</a>
        <li id="validate2"><a href="?p=kmom03_validate2">Kollar användarnamn</a>
        
      </ul>
  </ul>
  
</nav>

