<nav class="vmenu">
 <div class=aside>
  <ul class=aside <?php if(isset($p)) echo "id='".strip_tags($p)."'"; ?>>

    <li><h4>Admin</h4>
      <ul id="menu">
        <li id="Uppdatera"><a href="?p=uppdatera">Uppdatera objekt</a>
        <li id="Skapa"><a href="?p=skapa">Nytt objekt</a>
        <li id="Tabort"><a href="?p=tabort">Radera objekt</a>
      </ul>
  </ul>
      </div>
</nav>

