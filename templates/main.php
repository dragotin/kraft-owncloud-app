<h1>Kraft - Business Documents in the small Business</h1>

<?php echo $l->t('Kraft Document Path: ');?>: <?php echo $_['kraft_doc_path']; ?>

<?php
if(empty($_['docs'])) {
    echo('<div id="emptyfolder">'.$l->t('No Kraft documents found in your ownCloud.').'</div>');
} else {
    echo('<table class="kraftdocs" >');
    foreach($_['docs'] as $entry) {
        echo('<tr><td width="1">
              <a target="_blank" href="'.\OCP\Util::linkToAbsolute('kraft','viewdoc.php').'&file='.urlencode($entry['url']).'&name='.urlencode($entry['name']).'"><img align="left" src="'.\OCP\Util::linkToAbsolute('kraft','img/kraftdoc.png').'"/>'.urlencode($entry['name']).'</a></td></tr>');
    }
    echo('</table>');
}
?>