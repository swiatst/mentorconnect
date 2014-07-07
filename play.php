<?php


// class Listing {  (pass these 3 variables through) you can also pass in an href value
    public function get($lang_id, $category_id, $category_name){
    // $html = ' (doesn't matter what's called as long as it returns)
    <div class="listing subSection">
        <div class="img"></div>
        <div class="subInfo">
            <a href="category.php?lang_id=<?php echo $lang_id; ?>&category_id=1"Overview</a>
        </div> (changes into <a href="category.php?lang_id=' .$lang_id. '&category_id=' .$category_id. ' 
            ">' .$category_name. '</a>) you can put an $href
    </div>   
    ';

    return $html;

    }

}

?>
<!-- for controller page -->

$listing = new Listing();

while ($row = $results->fetch_assoc()) {
    echo $row['category_name'];

<!-- where did these variables come from? have to be listed above so  -->

    $html .= $listing->get($lang_id, $row['category_id'], $row['category_name']); <!-- (right) -->
    
    <!-- $listing_html->get($lang_id, $category_id, $category_name) -->
<!-- every time you call $row fetch assoc it goes from row to row -->
// use $listing_html so you can make a different object in the future
}

    $this->view->$listing_html = $listing_html;

    then php echo $listing_html; below the closed php tag 

<!-- $lang_id puts category into string -->