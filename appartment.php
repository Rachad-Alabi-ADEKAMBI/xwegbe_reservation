<?php
/**
 * Plugin Name: Appartement
 */

 add_shortcode('appartment', 'getAppartment');
 wp_enqueue_script('vue', 'https://unpkg.com/vue@3');
 wp_enqueue_script('axios', 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js');

 function getAppartment(){
    echo("<div id='app'>
    <div class='container'>
    <div class='appartment'>
        <div class='appartment__content'>
            <div class='appartment__content__details'>  
                <p><img src=''> Retour</p>
                  
                        <h1 class='appartment_name'>
                       {{ name }}
                        </h1>

                        <p class='appartment_extract'>
                        {{ short_description }}
                        </p>

                        <p class='appartment_description'>
                        {{ long_description }}
                        </p>
                        

                        <button class='book'>
                            <a href='reservation.php'>
                                Reserver
                            </a>
                        </button>
            </div> 
        </div>
    </div>
</div>
        </div>");
      wp_enqueue_script('app', plugin_dir_url(__FILE__). 'app.js');
    wp_enqueue_style('', plugin_dir_url(__FILE__). 'style.css');
  
 }
 ?>


