<?php

/* 
register admin dashboard widgets 
*/
add_action( 'wp_dashboard_setup', 'register_my_dashboard_widget' );
function register_my_dashboard_widget() {
	wp_add_dashboard_widget(
		'my_dashboard_widget',
		'Handige links',
		'my_dashboard_widget_display'
	);
	wp_add_dashboard_widget(
		'Tripadvisor',
		'Tripadvisor',
		'widget'
	);
	wp_add_dashboard_widget(
		'Website statistieken rapport',
		'Website statistieken rapport',
		'my_dashboard_widget_ga_display'
	);


}

/* 
display admin dashboard widgets
*/
function my_dashboard_widget_display() {
    echo '<ul class="quick-admin-dashboard-links-list">
	<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="edit.php?post_type=menukaart">Menu kaart</a>
	</li>
<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="admin.php?page=impressie-galerij">Fotogalerij - Impressie</a>
	</li>
<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="admin.php?page=opties">Beoordelingen</a>
	</li>
<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="options-general.php?page=popup-with-fancybox&ac=edit&did=1">Popup melding</a>
	</li>
	<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="post.php?post=30969&action=edit&lang=nl">Slapen en uitgaan in Zwevegem</a>
	</li>
	</ul>';
}

function my_dashboard_widget_ga_display() {
    echo '<ul class="quick-admin-dashboard-links-list">
	<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="https://datastudio.google.com/open/0BwtzJCht3RsOVnl2MFhacXhaVDQ">Website statistieken</a>
	</li>
	</ul>';
}

function widget() {
    echo '<div id="TA_certificateOfExcellence355" class="TA_certificateOfExcellence">
<ul id="Mc9EtPT" class="TA_links OPSp8HL">
 	<li id="LrgHEJ86c5k" class="pRVbeZXA8"><a href="https://www.tripadvisor.nl/Restaurant_Review-g801351-d3396841-Reviews-Bistro_De_Bolle-Zwevegem_West_Flanders_Province.html" target="_blank" rel="noopener"><img id="CDSWIDCOELOGO" class="widCOEImg" src="https://www.tripadvisor.nl/img/cdsi/img2/awards/CoE2016_WidgetAsset-14348-2.png" alt="TripAdvisor" /></a></li>
</ul>
</div>
<script src="https://www.jscache.com/wejs?wtype=certificateOfExcellence&uniq=355&locationId=3396841&lang=nl&year=2016&display_version=2"></script>';
}
