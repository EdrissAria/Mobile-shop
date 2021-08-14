<?php 
    ob_start();
    /* header */
    include('header.php');
    /* !header */
?>

<?php 

    /* banner area */
    include('Templates/_banner-area.php');
    /* !banner area */

    /* top sale */
    include('Templates/_top-sale.php');
    /* !top sale */

    /* special price */
    include('Templates/_special-price.php');
    /* !special price */

    /* banner ads */
    include('Templates/_banner-ads.php');
    /* !banner ads */

    /* new phones */
    include('Templates/_new-phones.php');
    /* !new phones */

    /* blogs */
    include('Templates/_blogs.php');
    /* !blogs */
 
?>

<?php 
    /* header */
    include('footer.php');
    /* !header */
?>