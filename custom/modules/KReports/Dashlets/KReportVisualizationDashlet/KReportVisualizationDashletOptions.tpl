
<div style='width: 500px'>
    <form name='configure_{$id}' action="index.php" method="post" onSubmit='return SUGAR.dashlets.postForm("configure_{$id}", SUGAR.mySugar.uncoverPage);'>
        <input type='hidden' name='id' value='{$id}'>
        <input type='hidden' name='module' value='Home'>
        <input type='hidden' name='action' value='ConfigureDashlet'>
        <input type='hidden' name='to_pdf' value='true'>
        <input type='hidden' name='configure' value='true'>
        <table width="400" cellpadding="0" cellspacing="0" border="0" class="edit view" align="center">
            <tr>
                <td valign='top' nowrap class='dataLabel'>{$reportLbl}</td>
                <td valign='top' class='dataField'>
                    <select class="text" name="report">
                        {$reports}
                    </select>
                </td>
            </tr>
            <tr>
                <td valign='top' nowrap class='dataLabel'>{$titleLbl}</td>
                <td valign='top' class='dataField'>
                    <input class="text" name="title" size='20' value='{$title}'>
                </td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <input type='submit' class='button' value='{$saveLbl}'>
                </td>
            </tr>
        </table>
    </form>
</div>