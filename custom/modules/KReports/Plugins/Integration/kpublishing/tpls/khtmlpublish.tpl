
{assign var="alt_start" value=$navStrings.start}
{assign var="alt_next" value=$navStrings.next}
{assign var="alt_prev" value=$navStrings.previous}
{assign var="alt_end" value=$navStrings.end}

<table cellpadding='0' cellspacing='0' width='100%' border='0' class='list view'>
    {if $renderTarget == 'Dashlet'}
        {include file='custom/modules/KReports/Plugins/Integration/kpublishing/tpls/khtmlpublishdashletpagination.tpl'}
    {/if}
    {if $renderTarget == 'SubPanel'}
        {include file='custom/modules/KReports/Plugins/Integration/kpublishing/tpls/khtmlpublishsubpanelpagination.tpl'}
    {/if}
    <tr height='20'>
        {foreach from=$displayColumns key=colHeader item=params}
            <th scope='col' width='{$params.width}%'>
                <div style='white-space: normal;'width='100%' align='{$params.align|default:'left'}'>
                    {if $params.sortable|default:true} 
                        <a href='#' onclick='document.getElementById("loader{$dashletId}").style.display="inline";return SUGAR.mySugar.retrieveDashlet("{$dashletId}", "{$pageData.urls.orderBy}&sort={$params.orderBy|default:$colHeader|lower}&dir={if $params.sortOrder != ''}{if $params.sortOrder == 'ASC'}DESC{else}ASC{/if}{else}ASC{/if}")' class='listViewThLinkS1' title="{$arrowAlt}">{sugar_translate label=$params.label module=$pageData.bean.moduleDir}</a>&nbsp;&nbsp;
                        {*if $params.orderBy|default:$colHeader|lower == $pageData.ordering.orderBy*}
                        {if $params.sortOrder != ''}
                            {if $params.sortOrder == 'ASC'}
                                {capture assign="imageName"}arrow_down.{$arrowExt}{/capture}
                                {capture assign="alt_sort"}{sugar_translate label='LBL_ALT_SORT_DESC'}{/capture}
                                {sugar_getimage name=$imageName width=$arrowWidth height=$arrowHeight attr='align="absmiddle" border="0" ' alt="$alt_sort"}
                            {else}
                                {capture assign="imageName"}arrow_up.{$arrowExt}{/capture}
                                {capture assign="alt_sort"}{sugar_translate label='LBL_ALT_SORT_ASC'}{/capture}
                                {sugar_getimage name=$imageName width=$arrowWidth height=$arrowHeight attr='align="absmiddle" border="0" ' alt="$alt_sort"}
                            {/if}
                        {else}
                            {capture assign="imageName"}arrow.{$arrowExt}{/capture}
                            {capture assign="alt_sort"}{sugar_translate label='LBL_ALT_SORT'}{/capture}
                            {sugar_getimage name=$imageName width=$arrowWidth height=$arrowHeight attr='align="absmiddle" border="0" ' alt="$alt_sort"}
                        {/if}
                    {else}
                        {if !isset($params.noHeader) || $params.noHeader == false}
                            {sugar_translate label=$params.label module=$pageData.bean.moduleDir}
                        {/if}
                    {/if}
                </div>
            </th>
        {/foreach}
        {if !empty($quickViewLinks)}
            <td  class='td_alt' nowrap="nowrap" width='1%'>&nbsp;</td>
        {/if}
    </tr>
</tr>
{counter start=$pageData.offsets.current print=false assign="offset" name="offset"}	
{foreach name=rowIteration from=$data key=id item=rowData}
    {counter name="offset" print=false}
    {assign var='scope_row' value=true}

    {if $smarty.foreach.rowIteration.iteration is odd}
        {assign var='_rowColor' value=$rowColor[0]}
    {else}
        {assign var='_rowColor' value=$rowColor[1]}
    {/if}
    <tr height='20' class='{$_rowColor}S1'>

        {foreach from=$displayColumns key=col item=params}
            {strip}
                <td {if $scope_row} scope='row' {/if} align='{$params.align|default:'left'}' valign="top" class="">

                    {if empty($rowData.$col) && empty($params.customCode)}&nbsp;
                    {else}
                        {$rowData.$col}
                    {/if}

                </td>
            {/strip}
            {assign var='scope_row' value=false}
        {/foreach}
    </tr>
{foreachelse}
    <tr height='20' class='{$rowColor[0]}S1'>
        <td colspan="{$colCount}">
            <em>{$APP.LBL_NO_DATA}</em>
        </td>
    </tr>
{/foreach}
</table>
