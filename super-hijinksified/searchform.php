<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
    <p><input type="text" class="field" name="s" id="s"  value="Enter keywords..." onfocus="if (this.value == 'Enter keywords...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter keywords...';}" />
    <input type="submit" class="submit" name="submit" value="search" /></p>
</form>
