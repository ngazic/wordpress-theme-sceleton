<H1>this is custom template for using search form. Name searchform.php is must </H1>

<?php 
//wordpress use get method
//name "s" of input field must be as it is because of wordpress database query (this is from defaul form used after inspecting page)
// action="<?php echo home_url( '/' ); is to point to home url we use this without hard coded url
//value="<?php echo get_search_query() this is that after submiting for search term stays in the field 

//IMPORTANT: MAKE   search.php page for custom  page result page
?>
<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" />
</form>