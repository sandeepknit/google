
{if $search_result}
    <ul class="search-results">
        {foreach $search_result as $item}
            <li>
            <h3><a href="{$item.url}">{$item.name|wash()}</a></h3>
            {if $item.description}<p>{$item.description|wash()}</p>{/if}
            <p><a href="{$item.url}" class="url" title="Address of this Document">{$item.url|shorten(60,'...')}</a>{if $item.date} - <span class="date-pub" title="Date Published">{$item.date|wash()}</span>{/if}{* - <span class="filesize" title="Filesize">11k</span>*}</p>
            </li>
        {/foreach}
    </ul>
{/if}