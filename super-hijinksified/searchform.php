<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
    <input type="text" value="Enter keywords..." onfocus="if (this.value == 'Enter keywords...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter keywords...';}" />
    <input type="submit" value="search" />
</form>
