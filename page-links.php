<?php
/*
Template Name: 友情链接
author: AZIMIAO
url: http://azimiao.com
 */
?>
<?php get_header(); ?>

<div class="stickywrap-container">

	<div class="stickywrap">

		<h3 class="stickywrap-heading">
			<span class="stickywrap-heading-inside"><i class="fas fa-pencil"></i></span>
		</h3>

		<div class="stickywrap-inner">

			<?php while (have_posts()): the_post(); ?>

				<article <?php post_class(); ?>>

					<header class="entry-header group">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>

					<div class="entry themeform">
						<?php
						$bookmarks = get_bookmarks();
						if (!empty($bookmarks)) {
						?>
							<style>

								.link-content{
									display: flex;
									flex-wrap: wrap;
									gap: 5px;
								}
								.link-content .link-item {
									float: left;
									text-align: center;
									width: 100px;
									font-size: 15px;
									margin: 0 10px 10px 10px;
									background-color: #fff;
									list-style-type: none !important;
									box-sizing: border-box;
									/* padding:6px; */
									margin: 1px;
									box-shadow: 0 0 0 1px #12376914, 0 1px 1px #1237690a, 0 3px 3px #12376908, 0 6px 4px #12376905, 0 11px 4px #12376903;
									border-radius: 6px;
									transition:background,box-shadow,border 0.1s,0.1s,0.1s
								}

								body:where(.dark) .link-content .link-item{
									background: rgba(255,255,255,0.1);
									box-shadow: inset 0 1px 0 rgba(255,255,255,0.06);
								}

								.link-content .link-item img {
									width: 100% !important;
									display: block;
									margin: 0;
									border-top-right-radius: 4px !important;
									border-top-left-radius: 4px !important;
									padding: 0 !important;
								}

								.link-content .link-item .sitename {
									display: block;
									text-overflow: ellipsis;
									text-wrap:nowrap;
									overflow: hidden;
								}

								.link-content .link-item:hover {
								
									<?php
										if ( get_theme_mod('gradient-left','#1e73be') != '#1e73be' ) {
											echo 'background: '.esc_attr( get_theme_mod('gradient-left') ).' !important;';
											echo 'border: 6px solid '.esc_attr( get_theme_mod('gradient-left') ).';';
										}else{
											echo 'background: #1e73be;';
											echo 'border: 6px solid #1e73be;';
										}
									?>
								}

								.link-content .link-item a {
									display: block;
									width: 100%;
									height: 100%;
									text-decoration: none;

								}

								.link-content .link-item:hover a {
									color: white !important;
								}
							</style>
						<?php
							echo '<div class="link-content">';
							foreach ($bookmarks as $bookmark) {
								echo '<div class="link-item"><a href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '" target="_blank" >' . get_avatar($bookmark->link_notes, 128) . '<span class="sitename">' . $bookmark->link_name . '</span></a></div>';
							}
							echo '</div>';
						}
						?>
						<br>
						<?php the_content(); ?>
						<div class="clear"></div>
					</div><!--/.entry-->

					<div class="entry-footer group">
						<div class="entry-comments themeform">
							<?php comments_template(); ?>
						</div>
					</div>

				</article>

			<?php endwhile; ?>

		</div>

	</div>

</div><!--/.stickywrap-container-->

<?php get_footer(); ?>