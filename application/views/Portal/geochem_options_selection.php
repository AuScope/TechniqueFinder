<?php $this->load->view('layout/portal_header.php');?>
<head>
    <title>AGN Laboratory Finder</title>
</head>
<body>
        
        <div id="content" class="container">
	    <div class="d-flex justify-content-end">
                <div class="p-2">
		    <button type="submit" class="btn btn-primary" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back</button>
                </div>
            </div>
           
            <div class="alert alert-primary">
<?php echo $staticData['tf.geochemChoices.quickGuide']; ?>
            </div>

            <div class="row">
                <!-- LHS COLUMN -->
                <div class="col-5">
                    <div class="row">
                        <!-- STEP 1 -->
                        <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step1.title']);?> </h3>
                        <div class="btn-group" role="group">
                            <?php
                              foreach($step1_list as $r){
                                     echo '<input _id="'.$r->id.'" _type="step1Option"  type="radio" class="btn-check" name="btnradio-1" id="btnradio-'.$r->id.'" autocomplete="off" onclick="onClick(this)">';
                                     echo '<label class="btn btn-primary" for="btnradio-'.$r->id.'">'.$r->name.'</label>';
                              }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <!-- THEN -->
                        <img src="<?php echo base_url().'assets/images/space.gif'?>" width="20" height="5" />
                        <span style="text-align:center;"><h1 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.comparison.title']);?> </h1></span>
                    </div>
                    <div class="row">
                        <!-- STEP 2 -->
                        <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step2.title']);?> </h3>
                        <div class="btn-group" role="group">
                            <?php
                            foreach($step2_list as $r){
                                echo '<input _id="'.$r->id.'" _type="step2Option" type="radio" class="btn-check" name="btnradio-2" id="btnradio-'.$r->id.'" autocomplete="off" disabled="disabled" onclick="onClick(this);">';
                                echo '<label class="btn btn-primary disabled" for="btnradio-'.$r->id.'">'.$r->name.'</label>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <!-- THEN -->
                        <img src="<?php echo base_url().'assets/images/space.gif'?>" width="20" height="5" />
                        <span style="text-align:center;"><h1 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.comparison.title']);?> </h1></span>
                    </div>
                    <div class="row">
                        <!-- STEP 3 -->
                        <h3 class="tf-heading"><?php echo strip_tags($staticData['tf.geochemChoices.step3.title']);?> </h3>
                        <input id="step3" _type="step3Option" class="form-control" style="font-size: 12px; max-width: 32rem" type="text" placeholder="Type here element interested in" onchange="elementClick(this)" autocomplete="off" disabled="disabled"></input>
                    </div>
                </div> <!-- END LHS COLUMN -->

                <!-- RHS COLUMN -->
	        <div class="col-7">
                    <div class="row">
                        <span id="display-area"></span>
                    </div>
		</div> <!-- END RHS COLUMN -->

            </div> <!-- END class="row" -->

            <br>
            <br>

      </div>            



    <div id="footer" class="container">
        <?php include 'footer.php';?>
    </div>
    <div style="clear: both"><!-- ff --></div>

    <div id="infobox"> </div>
    <div class="container">
        <?php $this->load->view('layout/portal_footer.php')?>
    </div>

    

<script type="text/javascript">
/*
 * This updates the cards on the right hand side as the user makes choices
 */
function onClick(e){
    var element = $(e);
    // Update RHS display
    if (element.attr('type') == 'radio') {
        if (element.attr('_type') == 'step1Option') {
            // User clicked on "Step1" button
            step1_id = element.attr('_id');
	    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("display-area").innerHTML = this.responseText;
                }
            };
	    xmlhttp.open("GET", "<?php echo base_url().'Portal/getTechniqueChoices/';?>"+step1_id+"/0/Notspecified", true);
            xmlhttp.send();
            // Enable step 2 radio buttons
            $('input[name="btnradio-2"]').removeAttr('disabled');
            $(".btn-group label").removeClass('disabled');

            // Reset step 2 radio buttons
            $('input[name="btnradio-2"]').prop('checked', false);
            // Reset step 3 input
            $('#step3').attr('disabled', 'disabled');

        } else if (element.attr('_type') == 'step2Option') {
            // User clicked on "Step2" button
            step2_id = element.attr('_id');
	    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("display-area").innerHTML = this.responseText;
                }
            };
	    var step1_id = $('input[name="btnradio-1"]:checked').attr('_id');
	    xmlhttp.open("GET", "<?php echo base_url().'Portal/getTechniqueChoices/';?>"+step1_id+"/"+step2_id+"/Notspecified", true);
            xmlhttp.send();
            // Set up autocomplete keywords for step 3
            autoKeywordUpdate(step1_id, step2_id);
        }
    }
}

/* Called when user selects an element  in Step 3 */
function elementClick(e) {
    var step1_id = $('input[name="btnradio-1"]:checked').attr('_id');
    var step2_id = $('input[name="btnradio-2"]:checked').attr('_id');
    var step3_val = $('#step3').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("display-area").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "<?php echo base_url().'Portal/getTechniqueChoices/';?>"+step1_id+"/"+step2_id+"/"+step3_val, true);
    xmlhttp.send();
}

/* This updates the set of autocomplete keywords in Step 3 */
function autoKeywordUpdate(step1_id, step2_id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const jsonResp = JSON.parse(this.responseText);
            if (jsonResp.length === 0) {
                $('#step3').attr('disabled', 'disabled');            
            } else {
                $('#step3').removeAttr('disabled');            
                const ac = new Autocomplete(document.getElementById('step3'), { data: jsonResp });
            }
        }
    };
    xmlhttp.open("GET", "<?php echo base_url().'Portal/getTechniqueKeywords/';?>"+step1_id+"/"+step2_id, true);
    xmlhttp.send();
}
</script>

</body>

