<?php 
/*
Template Name: API 2
Template Post Type: post, page, event
*/
get_header();
$urlEmbed = 'https://api.giphy.com/v1/gifs/trending?api_key=pLURtkhVrUXr3KG25Gy5IvzziV5OrZGa';

    $responseEmbed = wp_remote_get( $urlEmbed, array(
        'method'      => 'GET'
        )
    );
     
    if ( is_wp_error( $responseEmbed ) ) {
        return false;
    } else {
        $rEmbed = wp_remote_retrieve_body( $responseEmbed );
        $result = json_decode($rEmbed, true);
    }
?>
<?php 

    foreach($result['data'] as $get_result){?>
        <img src="<?php echo $get_result['images']['480w_still']['url'] .'<br>' ;?>" width="30px" height="30">
    <?php }?>

<?php get_footer();?>