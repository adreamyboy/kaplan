<p><a href='index.php?module=KReports&action=DetailView&record={$id}' target='_blank'>View full report</a></p><!-- Tawfeeq Jaafar: upgrade un-safe link to view complete report -->
<script type="text/javascript" src="custom/k/extjs4/ext-all{if $kreportDebug}-debug{/if}.js"></script>
<input type='hidden' name='jsonlanguage' id='jsonlanguage' value='{$jsonlanguage}'>
<script type='text/javascript' src='modules/KReports/js/kreportsbase1{if $kreportDebug}_debug{/if}.js'></script>

{$visualizationpluginjs}
{$visualization}
