<!-- Footer -->

  
    
    <div id="footer">
        <a href="http://validator.w3.org/check/referer">HTML5</a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
         <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">CSS3</a>
        <a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
        <a href="http://qa-dev.w3.org/i18n-checker/index?async=false&amp;docAddr=<?php echo getCurrentUrl(); ?>">i18n</a>
        <a href="http://validator.w3.org/checklink?uri=<?php echo getCurrentUrl(); ?>">Links</a>
        <a href="source.php">Källkod</a>
    
        <div id="time">
        <?php if(isset($pageTimeGeneration)) : ?>
        <p style="margin-top: 0px"> Page generated in <?php echo round(microtime(true)-$pageTimeGeneration, 5); ?> seconds</p>
        <?php endif; ?>
  	</div>  
        
    </div>	
    </div>
</body>
    
</html>
