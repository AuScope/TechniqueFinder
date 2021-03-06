<?php
/**
 * TechniqueFinder - index.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('layout/header.php');?>
<head><title>TF Admin | Home</title></head>
<?php $id = $this->session->userdata['id'];?>
<div class="row" style="margin-left: 1em;">
    <h5 class="tf-heading">
        AMMRF Technique Finder Admin Area
    </h5>
    <p class="tf-font tf-font-11">
        Welcome to the AMMRF Technique Finder Admin Area. This is where you can edit the technique finder contacts, locations as well as edit the description of the techniques themselves.
    </p>
</div>

<div class="row">&nbsp;&nbsp;</div>
<div class="row">&nbsp;</div>
<div class="row" style=" padding-left: 5em;">

    <div class="col-sm-2" style="display:inline-table;">
        <button onclick="window.location='<?php echo site_url("Techniques/index");?>'"  class="admin-button">Techniques</button><br>
        <button onclick="window.location='<?php echo site_url("Media/index");?>'"  class="admin-button">Images and movies</button><br>
        <button onclick="window.location='<?php echo site_url("References/index");?>'"  class="admin-button">References</button><br>
        <button onclick="window.location='<?php echo site_url("CaseStudy/index");?>'"  class="admin-button">Case studies</button><br>
        <button onclick="window.location='<?php echo site_url("Contact/index");?>'"  class="admin-button">Contacts</button><br>
        <button onclick="window.location='<?php echo site_url("Location/index");?>'"  class="admin-button">Locations</button><br>
    </div>
    <div class="col-sm-2" style="display:inline-table;">

        <button onclick="window.location='<?php echo site_url("BioOptionLeft/index");?>'"  class="admin-button">Bio options - Left</button><br>
        <button onclick="window.location='<?php echo site_url("BioOptionRight/index");?>'"  class="admin-button">Bio options - Right</button><br>
        <button onclick="window.location='<?php echo site_url("PhyOptionLeft/index");?>'"  class="admin-button">Phy options - Left</button><br>
        <button onclick="window.location='<?php echo site_url("PhyOptionRight/index");?>'"  class="admin-button">Phy options - Right</button><br>
        <button onclick="window.location='<?php echo site_url("BioOptionAssociation/select");?>'"  class="admin-button">Bio associations</button><br>
        <button onclick="window.location='<?php echo site_url("PhyOptionAssociation/select");?>'"  class="admin-button">Phys Associations</button><br>
    </div>
    <div class="col-sm-2">
        <?php
        $current_user = $this->session->userdata();
        if($current_user['isAdmin'] == 'ROLE_ADMIN') { ?>
            <button onclick="window.location='<?php echo site_url("user/index");?>'"  class="admin-button">Manage Accounts</button><br>
        <?php } ?>
        <button type="button" onclick="window.location='<?php echo site_url("user/show/"."$id")?>'" class="admin-button">Manage my Account</button><br>
        <button type="button" onclick="window.location='<?php echo site_url("staticContent/index")?>'" class="admin-button">Static content</button><br>

    </div>

    <div class="col-sm-3"></div>
    <div class="col-sm-3"></div>

</div>
<div>
    <!--TODO: Add background images for buttons-->
</div>
</div>

<?php $this->load->view('layout/footer.php')?>
