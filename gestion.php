<?php
/**
 * Plugin Name: Gestion des appartements
 */

 add_shortcode('AppartmentsManagement', 'manageAppartments');
 wp_enqueue_script('vue', 'https://unpkg.com/vue@3');
 wp_enqueue_script('axios', 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js');

 function manageAppartments(){
    echo("
    <div id='app'>
                    
            <div class='list'>
                <div class='list__infos'>
                    <h1>
                    Ajouter appartement
                    </h1>
                </div>

            

                <div class='list__content' v-if='1>0'>
                    <h1 class='list__content__title'>
                        Gestion des appartements
                    </h1> 

                        <div class='list__content__options'>
                                <button class='new'>
                                Ajouter appartement
                            </button>
                        </div>

                        <table class='table'>
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Nb de chambres</th>
                                <th>Tarif</th>
                                <th>Etat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr  v-for='appartment in appartments' :key='appartment.id' >
                                    <td data-label='Id'> {{ appartment.id }}</td>
                                    <td data-label='Nom'> {{ appartment.name }} </td>
                                    <td data-label='chambres'> {{ appartment.rooms }} </td>
                                    <td data-label='Prix'> {{ appartment.price }} </td>
                                    <td data-label='Etat'> {{ appartment.status }} </td>
                                    <td class='options'>
                                        <button class='view'>
                                            Réserver
                                        </button>

                                        <button class='edit'>
                                            Modifier
                                        </button>

                                        <button class='trash'>
                                            Supprimer
                                        </button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    ");
      wp_enqueue_script('app', plugin_dir_url(__FILE__). 'app.js');
    wp_enqueue_style('', plugin_dir_url(__FILE__). 'style.css');
  
 }
 ?>


