<?php
$title = "Min Me-sida om mig själv";
$pageId = "me";
include("incl/config.php");
// Define style thats specific for this page
$pageStyle = '
figure { 
 border-bottom-right-radius: 5px;
 border-bottom-left-radius: 5px;
 border-color:#5C0A0A;
 box-shadow: 5px 5px 5px #8A0F0F;
}
';


?>

<?php include("incl/header.php"); ?>


	<!-- Main -->
<div id="content">
<article class="justify border" style="width:100%">
    <h1>Allmänt om mig</h1>
    
    <figure class="right top">
    	<img src="bilder/mc.jpg" width=210 height=140>
    	<figcaption>
    		<p>Bild på Mattias Svedklint</p>
    	</figcaption>
    </figure>
  
    <p>Jag heter Mattias Svedklint och bor i Jämjö som ligger ca 1 mil utanför Karlskrona.
    Här bor jag i egen villa med min sambo Kamilla och 2 barn Simon och Joakim.
    Jag har jobbat på lite olika ställen så som Ericsson som blev Flextronics där jag jobbade 
    först som telefonmontör och sen som verkstadstekniker. Efter det körde jag taxi ett par år på Zon-taxi. 
    Nu är jag tjänstledig från ett företag som heter Svennes verktygsmekaniska där jag har jobbat som CNC-operatör i 5 år.
    Jag har alltid drömt lite om att få jobba med det jag tycker är intressant och kul, så när jag tröttnade på 
    att stå framför en maskin så bestämde jag mig för att söka till högskola, och här är jag nu.
    
    <p> Mina interssen är inte så många, förutom att umgås med familjen så brukar jag om kvällarna "när det finns lite tid över"
    Spela ett spel som heter Lord of the ring online, det har jag spelat i ca 4 år nu.
    Jag har hållt på med kampsport så som Karate, Judo och kickboxning i ca 15 år, efter att har haft ett uppehåll i 8 år så 
    har jag börjat igen med något som heter Savate. Älska också att kolla på hockey, ska försöka få lite tid över för att gå 
    och kolla på när Karlskrona spelar, i elitserien så är det Hv71 som gäller och i Nhl är det Detroit.
    </p>
      
    <?php include("incl/byline.php"); ?>
    <hr>
    </article>    
     </div>     
    

     
<?php include("incl/footer.php"); ?>


