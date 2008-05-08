
<div class="content-view-full">
    <div class="class-folder">

<div class="page-title">
    <h1>Search results</h1>
    <img src={"h1-support2.jpg"|ezimage} alt="" height="108" width="222">
</div>

<div class="content-attribute-body">

{if $search_count|eq('0')}
							<h2>No pages mentioning '<em>{$search_text|wash}</em>'</h2>
							
						    <p>Search tips</p>
						    <ul>
						        <li>Check spelling of keywords.</li>
						        <li>Try changing some keywords eg. car instead of cars.</li>

						        <li>Try more general keywords.</li>

						        <li>Fewer keywords gives more results, try reducing keywords until you get a result.</li>
						    </ul>

							<form action={"/google/search/"|ezurl} method="get">
							<fieldset class="buttons">
								<legend>Search again?</legend>

								<label class="accessibility" for="fSearch2"></label>
								<input class="text" size="20" name="SearchText" id="fSearch2" value="{$search_text|wash}" type="text">
								<input class="button" name="SearchButton" value="Search" type="submit">
							</fieldset>
							</form>

{else}


                            <form action={"/google/search/"|ezurl} method="get">
							<fieldset class="buttons">
								<legend>Search again?</legend>

								<label class="accessibility" for="fSearch2"></label>
								<input class="text" size="20" name="SearchText" id="fSearch2" value="{$search_text|wash}" type="text" />
								<input class="button" name="SearchButton" value="Search" type="submit" />
							</fieldset>
							
							</form>
							
<h2>Pages mentioning '<em>{$search_text|wash}</em>'</h2>

{include name=Result
         uri='design:google/searchresult.tpl'
         search_result=$search_result}


{include name=navigator
         uri='design:navigator/google.tpl'
         page_uri='/google/search'
         page_uri_suffix=concat('?SearchText=',$search_text|urlencode,'&PhraseSearchText=',$phrase_search_text|urlencode,'&SearchContentClassID=',$search_contentclass_id,'&SearchContentClassAttributeID=',$search_contentclass_attribute_id,'&SearchSectionID=',$search_section_id,$search_timestamp|gt(0)|choose('',concat('&SearchTimestamp=',$search_timestamp)),$search_sub_tree|gt(0)|choose( '', concat( '&', 'SubTreeArray[]'|urlencode, '=', $search_sub_tree|implode( concat( '&', 'SubTreeArray[]'|urlencode, '=' ) ) ) ),'&SearchDate=',$search_date,'&SearchPageLimit=',$search_page_limit)
         item_count=$search_count
         view_parameters=$view_parameters
         item_limit=$page_limit}
         
{/if}



</div>
</div>
</div>