<?php
/**
 * TechniqueFinder - technique_search.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */
?>

<?php $this->load->view('layout/portal_header.php');?>
<head><title>AGN Laboratory Finder</title></head>
<body>
        
        <div id="content" class="container">
            <div class="d-flex justify-content-end">
                <div class="p-2">
		    <button type="submit" class="btn btn-primary" onclick="window.location.assign('<?php echo base_url();?>Portal')">Back</button>
                </div>
            </div>
           
            <div class="clear"></div>
            <h1>Possible Techniques</h1>
            <h5>Search by keyword</h5>
            <hr>
	    <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url();?>Portal/techniqueSearch" method="get" name="searchForm" id="searchForm">
                        <input id="myAutocomplete" type="text" class="form-control" name="q" placeholder="Type search term here" autocomplete="off">
                        <p></p>
                        <button class="btn btn-primary" type="button" onclick="document.searchForm.submit()">Go</button>
                    </form>
                </div>
        </div>

        <p>Results for: <span class="tf-orange"><b><?php echo $searchedKeyword ?></b></span></p>

<?php if(count($searchResults) == 0){
            echo 'No matching techniques found';
        }
        else {
            foreach ($searchResults as $r) {
                $mediaForLIST = $Media_model->getMediaInfosByTechniqueIdAndSection($r->id, 'LIST');
                $media_location = 'nowhere.png';
                if (isset($mediaForLIST[0])) {
                    $media_location = $mediaForLIST[0]->location;
                }
                echo ' <h5>' . $r->name . '</h5>'
                    . '<hr>'
                    . '<table width="100%"> <tbody><tr>'
                    . '<td valign="top">'
                    . '<div class="summary">'
                    . $r->summary
                    . '</div>'
                    . '<a href="' . base_url() . 'Portal/viewTechnique/' . $r->id . '" id="Technique_' . $r->id . '">Detailed information and contact details</a></td>'
                    . '<td width="10"><img src="' . base_url() . 'images/space.gif" width="10" height="5"></td>'
                    . '<td width="140" valign="top">'
                    . '<div style="display:block;margin-left:auto;margin-right:auto;">'
                    . '<img src="' . base_url() . 'media-dir/' . $media_location . '" width="145" height="145" alt="' . $media_location . '">'
                    . '</div>'
                    . '</td>'
                    . '</tr> </tbody></table>';
            }
        }
        ?>

        <br><br>
        <div class="tf-paging">
            Page:
            <?php echo $this->pagination->create_links();?>
        </div>



        </div>            
        <div id="footer" class="container">
            <?php include 'footer.php';?> 
        </div>
        <div style="clear: both"><!-- ff --></div>

    <div id="infobox"> </div>
<script>
var datasrc = [
<?php $keyword_list = $this->Techniques_model->getKeywordList();
foreach($keyword_list as $keyword) {
    echo "{label: '".$keyword->name."', value: '".$keyword->name."'},\n";
}
?>
];
const ac = new Autocomplete(document.getElementById('myAutocomplete'), {
      data: datasrc
})
</script>

</body>

<?php $this->load->view('layout/portal_footer.php')?>

