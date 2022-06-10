<tr class="pagination" role=”presentation”>
    <td colspan='{$colCount}' align='right'>
        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <tr>
                <td align='left'><img id="loader{$dashletId}" style="display:none;" src="themes/default/images/bar_loader.gif"></td>
                <td align='right' nowrap='nowrap'>
                    {if $pageData.urls.startPage}
                        <button title='{$navStrings.start}' class='button' onclick='document.getElementById("loader{$dashletId}").style.display="inline";return SUGAR.mySugar.retrieveDashlet("{$dashletId}", "{$pageData.urls.startPage}")'>
                            {sugar_getimage name="start.png" attr='align="absmiddle" border="0" ' alt="$alt_start"}
                        </button>

                    {else}
                        <button title='{$navStrings.start}' class='button' disabled>
                            {sugar_getimage name="start_off.png" attr='align="absmiddle" border="0" '}
                        </button>

                    {/if}
                    {if $pageData.urls.prevPage}
                        <button title='{$navStrings.previous}' class='button' onclick='document.getElementById("loader{$dashletId}").style.display="inline";return SUGAR.mySugar.retrieveDashlet("{$dashletId}", "{$pageData.urls.prevPage}")'>
                            {sugar_getimage name="previous.png" attr='align="absmiddle" border="0" ' alt="$alt_prev"}
                        </button>

                    {else}
                        <button class='button' disabled title='{$navStrings.previous}'>
                            {sugar_getimage name="previous_off.png" attr='align="absmiddle" border="0" '}
                        </button>
                    {/if}
                    <span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} {$navStrings.of} {if $pageData.offsets.totalCounted}{$pageData.offsets.total}{else}{$pageData.offsets.total}{if $pageData.offsets.lastOffsetOnPage != $pageData.offsets.total}+{/if}{/if})</span>
                    {if $pageData.urls.nextPage}
                        <button title='{$navStrings.next}' class='button' onclick='document.getElementById("loader{$dashletId}").style.display="inline";return SUGAR.mySugar.retrieveDashlet("{$dashletId}", "{$pageData.urls.nextPage}")'>
                            {sugar_getimage name="next.png" attr='align="absmiddle" border="0" ' alt="$alt_next"}
                        </button>

                    {else}
                        <button class='button' title='{$navStrings.next}' disabled>
                            {sugar_getimage name="next_off.png" attr='align="absmiddle" border="0" '}
                        </button>

                    {/if}
                    {if $pageData.urls.endPage  && $pageData.offsets.total != $pageData.offsets.lastOffsetOnPage}

                        <button title='{$navStrings.end}' class='button' onclick='document.getElementById("loader{$dashletId}").style.display="inline";return SUGAR.mySugar.retrieveDashlet("{$dashletId}", "{$pageData.urls.endPage}")'>
                            {sugar_getimage name="end.png" attr='align="absmiddle" border="0" ' alt="$alt_end"}							
                        </button>

                    {elseif !$pageData.offsets.totalCounted || $pageData.offsets.total == $pageData.offsets.lastOffsetOnPage}
                        <button class='button' disabled title='{$navStrings.end}'>
                            {sugar_getimage name="end_off.png" attr='align="absmiddle" border="0" '}
                        </button>

                    {/if}
                </td>
            </tr>
        </table>
    </td>
</tr>
