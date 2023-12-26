<?php
    get_header();
// Récupération de l'identifiant de la photo (nom) dans l'URL
$slug = get_query_var('photographies');
// Construction des critères de recherche
$args = [
    'post_type' => 'photographies',
    'name' => $slug,
    'posts_per_page' => 1
];

// Requête auprès de la base de données wordpress pour récupére
$custom_query = new WP_Query($args);
if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
    $reference = get_field('reference');
    $type = get_field('type');
    $categories = wp_get_post_terms(get_the_ID(), 'categorie');
    $formats = wp_get_post_terms(get_the_ID(), 'formats');
?>


<div class="infoPhoto">
    <!-- Zone gauche - Informations photos -->
    <div class="...">
        <div class="zoneGauche">
            <h2><?php echo the_title();?></h2>
            <p>RÉFÉRENCE : <?php echo $reference;?></p>
            <p>CATÉGORIE :
                <?php foreach ($categories as $categorie) {
                    echo esc_html($categorie->name);
        } ?> 
        </p>
            <p>FORMAT :
                <?php foreach ($formats as $format) {
                    echo esc_html($format->name);
                }
                ?> 
            </p>
            <p>TYPE : <?php echo $type;?></p>
            <p>ANNÉE : <?php echo the_date('Y');?></p>
        </div>
    </div>
    <!-- Zone droite - La photo -->
    <div class="...">
        <div class="zoneDroite">
            <?php the_content();?>
        </div>
    </div>
</div>

<!-- Ajout du bandeau d'interactions inférieur -->
<div class="bandeauInteraction">
		<div class="bandeauContenu">
			<p>Cette photo vous intéresse ?</p>
			<button class="boutonContact">Contact</button>
		</div>
		<div class="...">
			<!-- Définition des bornes du tableau pour créer une boucle -->
			<?php 
				// Requête pour obtenir le dernier post
				$args_dernier = array(
					'post_type' => 'photographies', 
					'posts_per_page' => 1,
					'orderby' => 'date',
					'order' => 'DESC',
				);

				$last_post = new WP_Query($args_dernier);

				// Requête pour obtenir le premier post
				$args_premier = array(
					'post_type' => 'photographies', 
					'posts_per_page' => 1,
					'orderby' => 'date',
					'order' => 'ASC',
				);

				$first_post = new WP_Query($args_premier);
			?>
			<div class="blocFleches">
				<div class="...">
					<!-- Récupération du post précédent par date de publication ASC (comportement par defaut) -->
					<?php
					$previous_post = get_previous_post();
					// Si le post précédent existe, affichage du post précédent
					if (!empty($previous_post)) :
					?>
						<a href="<?php echo get_permalink($previous_post); ?>">
							<img class="..." src="<?php echo get_stylesheet_directory_uri() . '/assets/fleche-navigation-gauche.png' ?>" alt="Flèche de gauche" />
						</a>
					<!-- Si post précédent non-existant, affichage du dernier post publié -->
					<?php else :
						$last_post = $last_post->posts[0];
					?>
						<a href="<?php echo get_permalink($last_post); ?>">
							<img class="..." src="<?php echo get_stylesheet_directory_uri() . '/assets/fleche-navigation-gauche.png' ?>" alt="Flèche de gauche" />
						</a>
					<?php endif; ?>
				</div>
				<div class="...">
					<!-- Récupération du post suivant par date de publication ASC (comportement naturel) -->
					<?php
					$next_post = get_next_post();
					// Si post suivant existant, affichage du post suivant
					if (!empty($next_post)) :
					?>
						<a href="<?php echo get_permalink($next_post); ?>">
							<img class="..." src="<?php echo get_stylesheet_directory_uri() . '/assets/fleche-navigation-droite.png' ?>" alt="Flèche de droite" />
						</a>
					<!-- Si post suivant non-existant, affichage du premier post publié -->
					<?php else :
						$first_post = $first_post->posts[0]; 
					?>
						<a href="<?php echo get_permalink($first_post); ?>">
							<img class="... src="<?php echo get_stylesheet_directory_uri() . '/assets/fleche-navigation-droite.png' ?>" alt="Flèche de droite" />
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

    <?php
    endwhile;
    wp_reset_postdata();
endif;
?>

<!-- Dernière partie de page - Photos apparentées -->
<div class="photosApparentees">
	<h3>Vous aimerez aussi</h3>
	<div class="...">
		<div class="cardPhoto">
			<?php
				// Récupération de la catégorie de la photo actuelle
				$categories = wp_get_post_terms(get_the_ID(), 'categorie');

				if ($categories && !is_wp_error($categories)) {
					$ID_categories = wp_list_pluck($categories, 'term_id');

					// Récupération de deux photos de la même catégorie aléatoirement, en excluant la photo affichée au dessus
					$photos_similaires = new WP_Query(array(
						'post_type' => 'photographies',
						'posts_per_page' => 2,
						'post__not_in' => array(get_the_ID()),
						'orderby' => 'rand',
						'tax_query' => array(
							array(
								'taxonomy' => 'categorie',
								'field' => 'id',
								'terms' => $ID_categories,
							),
						),
					));

					if ($photos_similaires->have_posts()) {
						while ($photos_similaires->have_posts()) {
							$photos_similaires->the_post();
                            // Affichage de la photo similaire gérée via un template part
							get_template_part('template_part/photo-bloc');
						}
						wp_reset_postdata();
					} else {
						// Affichage d'un message si aucune photo similaire n'est trouvée dans la même catégorie
						echo "Aucune photo similaire pour le moment";
					}
				}
			?>
		</div>
		<a href="<?php echo esc_url(home_url('/')); ?>"><button class="boutonContact">Toutes les photos</button></a>
	</div>
</div>

<?php
	get_footer();
?>