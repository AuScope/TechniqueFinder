<?php
/**
 * TechniqueFinder - view.php
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
<head><title>TF Admin | Show Contact</title></head>

<div class="nav tf-navbar">
    <button class="btn" onclick="">
        <span class="home-icon">&nbsp;</span>
        <a style="text-decoration: none;" href="<?php echo base_url();?>TechniqueFinder/index">Home</a>
    </button>
    <button class="btn" onclick="">
        <span class="home-icon">&nbsp;</span>
        <a style="text-decoration: none;" href="<?php echo base_url();?>Contact/index">Contact List</a>
    </button>
    <button class="btn" onclick="window.location='<?php echo base_url();?>Contact/add'">
        <span class="tf-database-add">&nbsp;</span>
        <a class="tf-font-orange" style="text-decoration: none;">New Contact</a>
    </button>
</div>
<div class="row" style="margin-left: 1em; ">
    <h1 class="tf-heading"> Show Contact</h1>
</div>

<div class="row" style="margin-left: 1em; ">
    <?php
    if($prev_location==0){
        echo '<a href="'.base_url().'Contact/view/'.$next_location.'">next &gt;</a>';
    }
    else if ($next_location == 0){
        echo '<a href="'.base_url().'Contact/view/'.$prev_location.'">&lt;  prev </a>';
    }
    else {
        echo '<a href="'.base_url().'Contact/view/'.$prev_location.'">&lt; previous </a> |
               <a href="'.base_url().'Contact/view/'.$next_location.'">next &gt;</a>';
    }

    ?>
</div>





<?php
if ($this->session->flashdata('error-warning-message')){
    echo '<div id="error-warning-message" class=" tf-font tf-font-size error-warning-message">';
    echo $this->session ->flashdata('error-warning-message');
    echo '</div>';
}

?>


<div class="tf-box" style="width: 950px;">
    <table style="text-align: left;display: block; clear: both;" >
        <tr style="width:50em;">
            <td class="tf-font-orange">Title</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <?php
                if(isset($data['title'])){
                    echo $data['title'];
                }
                ?>
            </td>
            </td>

        </tr>

        <tr><td>&nbsp;</td></tr>
        <tr style="width:50em;">
            <td class="tf-font-orange">Name</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <?php
                if(isset($data['name'])){
                    echo $data['name'];
                }
                ?>

            </td>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr style="width:50em;">
            <td class="tf-font-orange">Position</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <?php
                if(isset($data['contact_position'])){
                    echo $data['contact_position'];
                }
                ?>

            </td>
            </td>
        </tr>

        <tr><td>&nbsp;</td></tr>


        <tr style="width:50em;">
            <td class="tf-font-orange">Telephone</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <?php
                if(isset($data['telephone'])){
                    echo $data['telephone'];
                }
                ?>
            </td>
            </td>

        </tr>

        <tr><td>&nbsp;</td></tr>


        <tr style="width:50em;">
            <td class="tf-font-orange">Email</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <?php
                if(isset($data['email'])){
                    echo $data['email'];
                }
                ?>
            </td>
            </td>

        </tr>

        <tr><td>&nbsp;</td></tr>


        <tr style="width:50em;">
            <td class="tf-font-orange">Technique Contact</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <?php
                if(isset($technique_contact)){
                    echo $technique_contact;
                }
                ?>
            </td>
            </td>

        </tr>

        <tr><td>&nbsp;</td></tr>


        <tr style="width:50em;">
            <td class="tf-font-orange">Location</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <?php
                if(isset($location)){
                    echo $location;
                }
                ?>
            </td>
            </td>

        </tr>

        <tr><td>&nbsp;</td></tr>

        <tr style="width:50em;vertical-align: text-top;">
            <td class="tf-font-orange">Associated Techniques</td>
            <td>&nbsp;&nbsp;</td>
            <td class="tf-font tf-font-size">
                <?php if(isset($data['associatedTechniques'])) {
                    foreach ($data['associatedTechniques'] as $row) {
                        echo $row;
                        echo "<br/>";
                    }
                }
                ?>
            </td>
            </td>

        </tr>

    </table>
</div>

<button id="update" class="tf-button"  onclick="window.location='<?php echo site_url("Contact/edit/").$data['id'];?>'" >
    <span class="tf-save">&nbsp;&nbsp;&nbsp;</span>
    <span class="tf-button-label">Edit</span>
</button>
<button id="update" type="button" class="tf-button" type="submit"  onclick="window.location='<?php echo site_url("Contact/index");?>'">
    <span class="tf-cancel">&nbsp;&nbsp;&nbsp;</span>
    <span class="tf-button-label">Cancel</span>
</button>


<?php echo form_close();?>


