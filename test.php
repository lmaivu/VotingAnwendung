<!DOCTYPE html>
<html>


<?php
$Voting = 2; ?>

<tr>
    <?php
if(isset($Voting)){ ?>

<td class="form-group" style="width:50px;">
    <input type="submit" name="C"  value="C"/>
</td>
<td class="pollResultsBar" align="left">
    <div class="resultBar" style="padding:10px;"><div style="width:<?php echo "$Voting" ?>%" class="shaded"></div>
        <div class="label"><strong><?php echo $Voting ?></strong></div>
    </div>
</td>

<td>
    <strong> Anzahl der Gesamtstimmen: <?php echo $Voting ?> </strong>
</td>
<?php } ?>
</tr>

</html>
