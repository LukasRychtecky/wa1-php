{extends file='app/templates/layout.tpl'}

{block name=body}
<ul>
	{foreach from=$records item=record}
	<li>{$record->getAuthor()}</li>
	{/foreach}
</ul>
{/block}
