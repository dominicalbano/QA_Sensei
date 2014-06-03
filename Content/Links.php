<?php
class links{
    
    function generate($groupcode, $newlink)
    {
        
 ?>
           
            <li class="pull-left" ><a target="_blank" id="linker-<?php echo $groupcode; ?>" href="<?php echo $newlink; ?>"><?php echo $newlink; ?></a></li>
            </br>
<?php
    }
}
?>
