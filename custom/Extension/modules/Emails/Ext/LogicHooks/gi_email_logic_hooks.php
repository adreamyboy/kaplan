<?php

$hook_array['after_save'][] = Array(0, 'If email-to-lead is saved, create leads automatically', 'custom/modules/Emails/logic_hooks/logic_hooks_Emails.php','logic_hooks_Emails', 'after_save_method');

?>